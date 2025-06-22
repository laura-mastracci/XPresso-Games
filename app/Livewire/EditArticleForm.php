<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditArticleForm extends Component
{

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

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->description = $article->description;
        $this->price = $article->price;
        $this->link = $article->link;
        $this->category = $article->category_id;
    }
    public function update(Article $article) {
        
        $this->validate();
        $this->article = Article::where('id', $article->id)->first();

        $this->article->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'link' => $this->link
        ]);
        $this->reset(['title', 'description', 'price', 'category', 'link']);
        $this->dispatch('articleUpdated', message: 'Articolo modificato con successo!', color: '#8fffd2');
    }
    public function render()
    {
        return view('livewire.edit-article-form');
    }
}
