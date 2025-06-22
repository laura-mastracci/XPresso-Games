<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
       $articles = $category->articles()->where('is_accepted', true)->latest()->paginate(10);
        return view('categories.show', compact('articles', 'category'));
    }
}
