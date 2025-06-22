<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\WithPagination;

class RevisorController extends Controller
{
    public function index() {
        $article_to_review = Article::where('is_accepted', null)->first();
        $rejectedArticles = Article::where('is_accepted', false)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();

        return view('revisor.index', compact(['acceptedArticles', 'rejectedArticles','article_to_review']));
    }

    public function changeStatus() {
        $articles = Article::all();
        return view('revisor.change-status', compact('articles'));
    }
    public function accept(Article $article) {
        $article->setAccepted(true);
        return redirect()->back()->with([
            'message' => 'L\'annuncio è stato accettato!',
            'color' => '#8fffd2'
        ]);
    }


    public function reject(Article $article) {
        $article->setAccepted(false);
        return redirect()->back()->with([
            'message' => 'L\'annuncio è stato rifiutato',
            'color' => '#FF0072'
        ]);
    }

    public function becomeRevisor(Request $request) {
        if(Auth::user() != null && !Auth::user()->is_revisor) {
            Mail::to('admin@xpressogames.it')->send(new BecomeRevisor(Auth::user(), $request->userMessage));
        return redirect()->back()->with([
            'message' => 'Richiesta inviata',
            'color' => '#8fffd2'
        ]);
        } 
        
        if(Auth::user() == null) {
            return redirect()->back()->with([
                'message' => 'Non sei loggato!',
                'color' => '#FF0072'
            ]);
        }

        if(Auth::user()->is_revisor) {
            return redirect()->back()->with([
                'message' => 'Sei già revisore!',
                'color' => '#FF0072'
            ]);
        }
        
    }
    public function makeRevisor(User $user) {
       Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return to_route('homepage');
    }
}
