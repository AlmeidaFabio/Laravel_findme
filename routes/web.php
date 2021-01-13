<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/admin')->group(function() {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'loginAction']);

    Route::get('/logout', [AdminController::class, 'logout']);

    Route::get('/register', [AdminController::class, 'register']);
    Route::post('/register', [AdminController::class, 'registerAction']);

    Route::get('/', [AdminController::class, 'index']);

    Route::get('/{slug}/links', [AdminController::class, 'links']);
    Route::get('/{slug}/design', [AdminController::class, 'design']);
    Route::get('/{slug}/stats', [AdminController::class, 'stats']);

    Route::get('/linkorder/{linkid}/{pos}', [AdminController::class, 'linkorder']);

    Route::get('/{slug}/newlink', [AdminController::class, 'newLink']);
    Route::post('/{slug}/newlink', [AdminController::class, 'newLinkAction']);

    Route::get('/{id}', [PageController::class, 'newPage']);
    Route::post('/{id}', [PageController::class, 'newPageAction']);

    Route::get('/{slug}/editlink/{linkid}', [AdminController::class, 'editLink']);
    Route::post('/{slug}/editlink/{linkid}', [AdminController::class, 'editLinkAction']);

    Route::get('/{slug}/deletelink/{linkid}', [AdminController::class, 'deleteLink']);
});

Route::get('/{slug}', [PageController::class, 'index']);