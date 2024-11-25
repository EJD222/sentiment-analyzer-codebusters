<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SentimentController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/sentiment', function () {
    return view('sentiment');
})->name('sentiment');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/sentiment/analyze', [SentimentController::class, 'analyze'])->name('sentiment.analyze');