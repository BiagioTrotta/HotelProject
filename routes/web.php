<?php

use App\Http\Livewire\CreateUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MonthsController;

Route::get('/', [PageController::class, 'index'])->name('homepage');
Route::get('/admin/create_user', [AdminController::class, 'index'])->name('admin.create-user')->middleware('is_admin');
Route::get('/admin/create_category', [AdminController::class, 'category'])->name('admin.create-category')->middleware('is_admin');
Route::get('/admin/listArticle', [AdminController::class, 'listArticle'])->name('admin.list-article');
Route::get('/tablerooms', [RoomsController::class, 'index'])->name('tablerooms');
Route::get('/on_of/{id}/{id2}', [RoomsController::class, 'on_of'])->name('on_of');
Route::post('/aggiornaGiorni', [RoomsController::class, 'aggiornaGiorni'])->name('aggiornaGiorni');
Route::post('/aggiornaGiorni1', [RoomsController::class, 'aggiornaGiorni1'])->name('aggiornaGiorni1');
Route::post('/associare-utente-a-giorno', [RoomsController::class, 'associareUtenteAGiorno'])->name('associareUtenteAGiorno');





Route::resource('articles', ArticleController::class);

Route::get('/accept/{id}', [ArticleController::class, 'acceptArticle'])->name('accept');

Route::get('/august-days', [MonthsController::class, 'index'])->name('august-days.index');
Route::put('/august-days/{id}', [MonthsController::class, 'update'])->name('august-days.update');
Route::put('/january-days/{id}', [MonthsController::class, 'update1'])->name('january-days.update');
Route::put('/september-days/{id}', [MonthsController::class, 'update2'])->name('september-days.update');
Route::post('/gestisciIntervalli', [MonthsController::class, 'gestisciIntervalli'])->name('gestisci-intervalli');


Route::get('/january', [MonthsController::class, 'index1'])->name('months.january');
Route::get('/february', [MonthsController::class, 'index2'])->name('months.february');
Route::get('/march', [MonthsController::class, 'index3'])->name('months.march');
Route::get('/april', [MonthsController::class, 'index4'])->name('months.april');
Route::get('/may', [MonthsController::class, 'index5'])->name('months.may');
Route::get('/august', [MonthsController::class, 'index8'])->name('months.august');
Route::get('/september', [MonthsController::class, 'index9'])->name('months.september');
Route::get('/allmonths', [MonthsController::class, 'indexAll'])->name('months');

Route::get('/august-days', [MonthsController::class, 'index'])->name('august-days.index');

Route::put('/january-days/{id}', [MonthsController::class, 'update1'])->name('january-days.update');
Route::put('/february-days/{id}', [MonthsController::class, 'update2'])->name('february-days.update');
Route::put('/march-days/{id}', [MonthsController::class, 'update3'])->name('march-days.update');
Route::put('/april-days/{id}', [MonthsController::class, 'update4'])->name('april-days.update');
Route::put('/may-days/{id}', [MonthsController::class, 'update5'])->name('may-days.update');
Route::put('/august-days/{id}', [MonthsController::class, 'update8'])->name('august-days.update');
Route::put('/september-days/{id}', [MonthsController::class, 'update9'])->name('september-days.update');

Route::get('/admin/create_client', [AdminController::class, 'index1'])->name('admin.create-client');

