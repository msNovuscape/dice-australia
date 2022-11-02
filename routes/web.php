<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/referral', function(){
    return view('referral');
});

Route::get('/gallery', function(){
    return view('gallery');
});

Route::get('/service-detail', function(){
    return view('services.service-detail');
});

Route::get('/ndis', function(){
    return view('ndis');
});