<?php

use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\Advertise;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('home');})->name('home');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware(['guest'])->group(function () {
    
    //LOGIN AND REGISTER
    
    Route::get('/register', function(){return view('auth.register');})->name('register');
    Route::post('/register', [AuthController::class, 'register_action'])->name('register_action');

    Route::get('/forgot_password', function(){ return view('auth.forgot_password');})->name('forgot_password');

    Route::get('/login', function(){return view('auth.login');})->name('login');
    Route::post('/login', [AuthController::class, 'login_action'])->name('login_action');

});


Route::middleware(['auth'])->group(function () {

    //PAGES

    Route::get('/select_state', function(){return view('auth.select-state');})->name('select-state');
    Route::post('/state_action', [AuthController::class, 'state_action'])->name('state_action');

    //DASHBOARD

    Route::get('/dashboard/my-account', [DashboardController::class, 'my_account'])->name('my_account');
    Route::post('/dashboard/my-account', [DashboardController::class, 'my_account_action'])->name('my_account_action');
    
    Route::get('/dashboard/my-ads', [DashboardController::class, 'my_ads'])->name('my_ads');

    Route::get('/dashboard/my-contacts', [DashboardController::class, 'my_contacts'])->name('my_contacts');

    //ADVERTISE

    Route::get('/dashboard/advertise/create', [AdvertiseController::class, 'create'])->name('advertise.create');

    Route::get('/dashboard/advertise/delete/{id}', [AdvertiseController::class, 'delete'])->name('advertise.delete');
    
});


//ADVERTISE

Route::get('/advertise/show/{slug}', [AdvertiseController::class, 'show'])->name('advertise.show');
Route::get('/advertise/search', [AdvertiseController::class, 'search'])->name('advertise.search');



