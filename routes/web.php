<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FilmsController;
use \App\Http\Controllers\CreateFilmController;
use \App\Http\Controllers\CreateSessionController;
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

Route::get('/films', [FilmsController::class, "show"])->name("films");
Route::get('/films/{id}', [FilmsController::class, "showById"])->name("film");

Route::get('/admin/films/create', [CreateFilmController::class, 'create']);
Route::post('/admin/films/store/{film}', [CreateFilmController::class, 'store'])->name('store_films');

Route::get('/admin/session/create', [CreateSessionController::class, 'create']);
Route::post('/admin/session/create/{session}', [CreateSessionController::class, 'store'])->name('create_session');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();


