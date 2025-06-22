<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage() {
        $articles = Article::where ('is_accepted', true)->latest()->take(6)->get();
        $hotarticles = Article::where( 'is_accepted', true)->where('hot', true)->latest()->take(3)->get();
        $categories = Category::all();
        return view('homepage', compact('articles', 'categories', 'hotarticles'));
    }
    public function searchArticles(Request $request) {
        $query = $request->input('query'); 
        $articles = Article::search($query) ->where ('is_accepted', true)->paginate(10);
        return view('articles.search',['articles' => $articles, 'query' => $query]);
    }

    public function setLanguage(Request $request){
        $availableLocales = ['it', 'en', 'es'];
        $lang = $request->input('locale'); 
    if (!in_array($lang, $availableLocales)) {
        abort(400, 'Lingua non supportata.');
    }
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function aboutUs(){
        return view('aboutus');
    }
    public function careers() {
        return view('careers');
    }
}
