<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddBookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorsPanelController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ReaderController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/add-book', [AddBookController::class, 'index']);
Route::post('/add-book', [AddBookController::class, 'store']);
Route::get('/book/{slug}', [BookController::class, 'index']);
Route::get('/authors-panel', [AuthorsPanelController::class, 'index']);
Route::get('/add-chapter/{slug}', [ChapterController::class, 'index']);
Route::post('/add-chapter/{slug}', [ChapterController::class, 'store']);
Route::get('/{slug}/{chapter_slug}', [ReaderController::class, 'index']);