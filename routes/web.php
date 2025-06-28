<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/single', function () {
    return view('single');
});

Route::get('/blog-home', function () {
    return view('blog-home');
});

Route::get('/blog-single', function () {
    return view('blog-single');
});

Route::get('/contact', function () {
    return view('contact');
});
