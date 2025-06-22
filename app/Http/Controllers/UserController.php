<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public User $user;
    public function dashboard(){
        
        $this->user = Auth::user();
        $articles = Article::where('user_id', $this->user->id)->get();
        $likedArticle_ids = DB::table('likes')->where('user_id', $this->user->id)->pluck('article_id');
        $likedArticles = Article::whereIn('id', $likedArticle_ids)->get();
        return view('auth.dashboard', compact('articles','likedArticles'));
    }
}
