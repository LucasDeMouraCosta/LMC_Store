<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


//LOGIN AND REGISTER

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_action'])->name('register_action');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login_action'])->name('login_action');

Route::get('/forgot_password', function(){
    return view('auth.forgot_password');
})->name('forgot_password');


//PAGES

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/select_state', function(){
    return view('auth.select-state');
})->name('select-state');

Route::post('/state_action', [AuthController::class, 'state_action'])->name('state_action');


//DASHBOARD

Route::get('/dashboard/my-account', [DashboardController::class, 'my_account'])->name('my_account');
Route::post('/dashboard/my-account', [DashboardController::class, 'my_account_action'])->name('my_account_action');