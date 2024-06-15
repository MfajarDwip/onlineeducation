<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/project', function () {
    return view('project');
})->name('project');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/about',[AboutController::class, 'index'])->name('about');
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/masuk', [LoginController::class, 'login'])->name('masuk');
Route::post('/daftar',[LoginController::class, 'register'])->name('daftar');
Route::get('/dashboard',[UserController::class, 'index'])->name('dashboard');
