<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripePaymentController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('auth.dashboard')->middleware('auth','verified');

Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create')->middleware('auth');
Route::get('/articles/index', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/show/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::patch('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update')->middleware('auth');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy')->middleware('auth');

Route::get('/categories/show/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::middleware('auth')->group(function () {

    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
    });

Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index')->middleware('isRevisor');
Route::get('/revisor/change-status', [RevisorController::class, 'changeStatus'])->name('revisor.change-status')->middleware('isRevisor');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept')->middleware('isRevisor');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject')->middleware('isRevisor');

Route::get('/careers', [PublicController::class, 'careers'])->name('careers');

Route::post('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor'); 

Route::get('/checkout/{payment}', [StripePaymentController::class, 'checkout'])->name('stripe.checkout');
Route::post('/checkout/{payment}', [StripePaymentController::class, 'processPayment'])->name('stripe.process');
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('articles.search');

Route::post('/lingua', [PublicController::class, 'setLanguage'])->name('setLocale');
Route::get('/articles/cart', [ArticleController::class, 'showCart'])->name('articles.cart')->middleware('auth');
Route::get('/aboutus', [PublicController::class, 'aboutUs'])->name('aboutus');