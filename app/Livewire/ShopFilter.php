<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShopFilter extends Component
{
    use WithPagination;
    public $search = '';
    public $priceMin = 0;
    public $priceMax = 1000;
    public $category = '';
    public $orderby;
    public $hot = false;
    

    public function mount(){
        $this->filterArticles();
    }

    public function updated(){
        $this->filterArticles();
    }

    public function filterArticles(){
        $query = Article::where( 'is_accepted', true);

        if($this->priceMin){
            $query->where('price', '>=', $this->priceMin);
        }
        if($this->priceMax){
            $query->where('price', '<=', $this->priceMax);
        }
        if($this->search){
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if(!empty($this->category)){
            $query->where('category_id', $this->category);
        }

        if($this->orderby){
            if($this->orderby == 'latest'){
                $query->orderBy('created_at', 'desc');
            }
            if($this->orderby == 'oldest'){
                $query->orderBy('created_at', 'asc');
            }
            if($this->orderby == 'desc'){
                $query->orderBy('price', 'desc');
            }
            if($this->orderby == 'asc'){
                $query->orderBy('price', 'asc');
            }
            if($this->orderby == 'a-z'){
                $query->orderBy('title', 'asc');
            }
            if($this->orderby == 'z-a'){
                $query->orderBy('title', 'desc');
            }
        }
        if($this->hot){
            $query->where('hot', 1);
        }
        return $query->paginate(10);
    }

    public function resetFilter(){
        $this->reset();
        $this->filterArticles();
    }

    public function toggleHot(){
        $this->hot = !$this->hot;
        $this->filterArticles();

    }

    public function render()
    {   
        $articles = $this->filterArticles();
    
        return view('livewire.shop-filter', compact('articles'));

    }
}
