<?php

use App\Http\Controllers\ComicsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/comics', [ComicsController::class, 'index'])->name('comics.index');

Route::get('/comics/show', [ComicsController::class, 'show'])->name('comics.show');

Route::get('/comics/create', [ComicsController::class, 'create'])->name('comics.create');

Route::get('/comics', [ComicsController::class, 'store'])->name('comics.store');

