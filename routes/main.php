<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreateMessageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index')->name('home');

Route::middleware('guest')->group(function (){
    Route::get('createMessage', [CreateMessageController::class, 'create'])->name('createMessage');
    Route::get('showMessage', [CreateMessageController::class, 'show'])->name('showMessage.show');
    Route::post('createMessage', [CreateMessageController::class, 'store'])->name('createMessage.store');
    Route::get('showComment', [CreateMessageController::class, 'showComment'])->name('showComment.show');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});
