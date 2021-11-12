<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('index');
});
Route::get('contact', [PostController::class, 'index']);
Route::post('contact', [PostController::class, 'create']);
Route::get('confirm', [PostController::class, 'show']);
Route::post('confirm', [PostController::class, 'post']);

Route::get('admin', [ContactController::class, 'index']);
Route::get('admin.search', [ContactController::class, 'search'])->name('admin.search');
Route::get('admin', [ContactController::class, 'reset'])->name('admin.reset');
Route::delete('admin.destroy/{contact}', [ContactController::class, 'destroy'])->name('admin.destroy');
