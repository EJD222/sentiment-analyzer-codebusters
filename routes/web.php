<?php

use Illuminate\Support\Facades\Route;
use Web64\LaravelNlp\NlpClient;
use Illuminate\Support\Facades\Http;

Route::get('/test-sentiment', function () {
    $text = "Laravel is amazing!";
    $response = Http::asForm()->post('https://api.meaningcloud.com/sentiment-2.1', [
        'key' => env('MEANINGCLOUD_API_KEY'),
        'txt' => $text,
        'lang' => 'en',
    ]);
    return $response->json();
});

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
