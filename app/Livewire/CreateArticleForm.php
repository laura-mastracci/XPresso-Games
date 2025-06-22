<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreateArticleForm extends Component
{
    use WithFileUploads;

    public $images = [];
    public $temporary_images;

    #[Validate('required', message: 'Il titolo è obbligatorio')]
    #[Validate('min:5', message: 'Il titolo deve avere almeno 5 caratteri')]
    public $title;
    
    #[Validate('required', message: 'La descrizione é obbligatoria')]
    #[Validate('min:5', message: 'La descrizione deve avere almeno 5 caratteri')]
    public $description;

    #[Validate('required', message: 'Il prezzo é obbligatorio')]
    #[Validate('numeric', message: 'Il prezzo deve essere un numero')]
    public $price;

    #[Validate('required', message: 'La categoria é obbligatoria')]
    
    public $category;

    public $link;

    public $article;

    public function store(){
        
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'link' => $this->link,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);
        if (count($this->images) > 0) {

        foreach ($this->images as $image) {

                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
                
                // dispatch(new ResizeImage($newImage->path, 300, 300));
                // dispatch( new GoogleVisionSafeSearch($newImage->id));
                // dispatch( new GoogleVisionLabelImage($newImage->id));
                
                Bus::chain([
                new RemoveFaces($newImage->id),
                new ResizeImage($newImage->path, 300, 300),
                new GoogleVisionSafeSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id)
            ])->dispatch($newImage->id);
            }
            
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        $this->reset();
        $this->dispatch('articleCreated', message: 'Articolo creato con successo', color: '#8fffd2');
    }

        public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024',
            'temporary_images'=>'max:6'
        ])){
            foreach($this->temporary_images as $image){
                $this->images[]=$image;
            }
        }
       } 

    protected function cleanForm(){
        $this->title = '';
        $this->description = '';
        $this->category = '';
        $this->price = '';
        $this->images = [];
    }



    public function removeImage($key){
        if(in_array($key,array_keys($this->images))){
            unset($this->images[$key]);
        }
    }


    public function render()
    {
        return view('livewire.create-article-form');
    }

}