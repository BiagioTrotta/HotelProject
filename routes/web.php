<?php

use App\Http\Livewire\CreateUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AugustDayController;
use App\Http\Controllers\MonthlyDayController;



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

Route::get('/august-days', [AugustDayController::class, 'index'])->name('august-days.index');
Route::put('/august-days/{id}', [AugustDayController::class, 'update'])->name('august-days.update');
Route::put('/january-days/{id}', [AugustDayController::class, 'update1'])->name('january-days.update');
Route::put('/september-days/{id}', [AugustDayController::class, 'update2'])->name('september-days.update');
Route::post('/gestisciIntervalli', [AugustDayController::class, 'gestisciIntervalli'])->name('gestisci-intervalli');
Route::get('/january', [AugustDayController::class, 'index1'])->name('months.january');
Route::get('/august', [AugustDayController::class, 'index2'])->name('months.august');
Route::get('/september', [AugustDayController::class, 'index3'])->name('months.september');

Route::resource('monthly_days', MonthlyDayController::class);
