<?php

use Illuminate\Support\Facades\Auth;
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
    Route::prefix('film')->group(function () {
        Route::get('/create', [FilmController::class, 'create'])->name('film.create');
        Route::post('/store', [FilmController::class, 'store'])->name('film.store');
        Route::get('/edit/{film}', [FilmController::class, 'edit'])->name('film.edit');
        Route::post('/edit', [FilmController::class, 'update'])->name('film.update');
        Route::get('/delete/{film}', [FilmController::class, 'delete'])->name('film.delete');
            Route::prefix('session')->group(function () {
                Route::get('/create', [SessionController::class, 'create'])->name('session.create');
                Route::post('/store', [SessionController::class, 'store'])->name('session.store');
        });
    });
});

Route::get('/films', [FilmsController::class, "show"])->name("films");
/*Route::get('/films/{id}', [FilmsController::class, "showById"])->name("film");*/

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();
