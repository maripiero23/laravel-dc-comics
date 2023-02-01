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

Route::get('/', [ComicsController::class, 'index']);


Route::get('/comics', [ComicsController::class, 'index'])->name('comics.index');


Route::get('/comics/create', [ComicsController::class, 'create'])->name('comics.create');

Route::post('/comics', [ComicsController::class, 'store'])->name('comics.store');

Route::get('/comics/{comic}/edit', [ComicsController::class, 'edit'])->name('comics.edit');

Route::get('/comics/{comic}', [ComicsController::class, 'show'])->name('comics.show');

//Update - Rotta che riceve i dati dal form edit e li usa per aggiornare l'elemento corrispondente all'id
Route::put('/comics/{comic}', [ComicsController::class, 'update'])->name('comics.update');

//Destroy - Rotta che riceve tramite parametro dinamico id della risorda da cancellare e la cancella
Route::delete('/comics/{comic}', [ComicsController::class, 'destroy'])->name('comics.destroy');




