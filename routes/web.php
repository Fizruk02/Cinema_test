<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FilmsController;
use \App\Http\Controllers\FilmController;
use \App\Http\Controllers\SessionController;
use \App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::prefix('films')->group(function () {
        Route::get('/create', [FilmController::class, 'create']);
        Route::post('/store/{film}', [FilmController::class, 'store'])->name('store_films');
        Route::get('/edit/{film}', [FilmController::class, 'edit'])->name('edit_film');
        Route::put('/edit/', [FilmController::class, 'update'])->name('update_film');
    });

    Route::prefix('session')->group(function () {
        Route::get('/create', [SessionController::class, 'create']);
        Route::post('/store/{session}', [SessionController::class, 'store'])->name('store_session');
    });
});

Route::get('/films', [FilmsController::class, "show"])->name("films");
/*Route::get('/films/{id}', [FilmsController::class, "showById"])->name("film");*/

Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();
