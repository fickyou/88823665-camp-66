<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;

Route::get('/login',
[LoginController::class, 'index']);
Route::get('/register',
[LoginController::class, 'index']);
Route::get('/home',
[LoginController::class, 'index']);
Route:: get ('/mycontroller',
    [MyController::class, 'myfunction']);
Route:: post ('/mycontroller',
    [MyController::class, 'myfunction']);
Route:: get ('/',function() {
    return view('home');
});
Route::get('/hello/{id}', function ($val="") {
    return "<h1>Hello world! $val</h1>";
});

