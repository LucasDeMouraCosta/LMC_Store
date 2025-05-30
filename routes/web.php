<?php

use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('home');})->name('home');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware(['guest'])->group(function () {
    
    //LOGIN AND REGISTER
    
    Route::get('/register', function(){return view('auth.register');})->name('register');
    Route::post('/register', [AuthController::class, 'register_action'])->name('register_action');

    Route::get('/forgot_password', function(){ return view('auth.forgot-password');})->name('forgot_password');
    Route::post('/forgot_password', [AuthController::class, 'forgot_password_action'])->name('forgot_password_action');

    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

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
    
    Route::get('/dashboard/change-password', [DashboardController::class, 'change_password'])->name('change_password');
    Route::post('/dashboard/change-password', [DashboardController::class, 'change_password_action'])->name('change_password_action');

    Route::get('/dashboard/my-ads', [DashboardController::class, 'my_ads'])->name('my_ads');

    Route::get('/dashboard/my-contacts', [DashboardController::class, 'my_contacts'])->name('my_contacts');

    //ADVERTISE

    Route::get('/dashboard/advertise/create', [AdvertiseController::class, 'create'])->name('advertise.create');
    Route::get('/dashboard/advertise/edit/{slug}', [AdvertiseController::class, 'edit'])->name('advertise.edit');

    Route::post('/dashboard/advertise/delete/{id}', [AdvertiseController::class, 'delete'])->name('advertise.delete');
    
});


//ADVERTISE

Route::get('/advertise/show/{slug}', [AdvertiseController::class, 'show'])->name('advertise.show');
Route::get('/advertise/search', [AdvertiseController::class, 'search'])->name('advertise.search');



