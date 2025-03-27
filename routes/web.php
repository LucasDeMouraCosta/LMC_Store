<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_action'])->name('register_action');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login_action'])->name('login_action');

Route::get('/forgot_password', function(){
    return view('auth.forgot_password');
})->name('forgot_password');

Route::get('/select_state', function(){
    return view('auth.select-state');
})->name('select-state');

Route::post('/state_action', [AuthController::class, 'state_action'])->name('state_action');
