<?php

use App\Http\Controllers\Band\AlbumController;
use App\Http\Controllers\Band\BandController;
use App\Http\Controllers\Band\GenreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\{Route,Auth};


Auth::routes();

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->group(function(){
    Route::get('dasboard', DashboardController::class)->name('dashboard');

    Route::prefix('bands')->group(function(){
        Route::get('create',[BandController::class,'create'])->name('bands.create');
        Route::post('create',[BandController::class,'store']);
        Route::get('table',[BandController::class,'table'])->name('bands.table');
        Route::get('{band:slug}/edit',[BandController::class,'edit'])->name('bands.edit');
        Route::put('{band:slug}/edit',[BandController::class,'update']);
        Route::delete('{band:slug}/delete',[BandController::class,'destroy'])->name('bands.delete');
    });

    Route::prefix('albums')->group(function(){
        Route::get('create',[AlbumController::class,'create'])->name('albums.create');
        Route::post('create',[AlbumController::class,'store']);
        Route::get('table',[AlbumController::class,'table'])->name('albums.table');
        Route::get('{album:slug}/edit',[AlbumController::class,'edit'])->name('albums.edit');
        Route::put('{album:slug}/edit',[AlbumController::class,'update']);
        Route::delete('{album:slug}/delete',[AlbumController::class,'destroy'])->name('albums.delete');
    });

    Route::prefix('genres')->group(function(){
        Route::get('create',[GenreController::class,'create'])->name('genres.create');
        Route::post('create',[GenreController::class,'store']);
        Route::get('table',[GenreController::class,'table'])->name('genres.table');
    });
});