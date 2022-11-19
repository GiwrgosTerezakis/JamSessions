<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    if(Auth::check() && Auth::user()->type == 'user'){
        return redirect()->action([HomeController::class, 'index']);
    }

    if(Auth::check() && Auth::user()->type == 'admin'){
        return redirect()->action([HomeController::class, 'adminHome']);
    }

    return view('homepage');
});

Auth::routes();


Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});


Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

