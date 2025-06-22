<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('articles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $relatedArticles = Article::where('is_accepted', true)
            ->where('id', '!=', $article->id)
            ->where('category_id', $article->category_id)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back()->with([
            'message' => 'Prodotto eliminato con successo!',
            'color' => '#8fffd2'
        ]);
    }
    public function showCart()
    {
        return view('articles.cart',);
    }
}
