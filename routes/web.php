<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AddBookController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AllBooksController;
use App\Http\Controllers\BookLikeController;
use App\Http\Controllers\ModerateController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\BookDislikeController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\AuthorsPanelController;
use App\Http\Controllers\ChaptersPanelController;
use App\Http\Controllers\FinishedBooksController;
use App\Http\Controllers\SitemapController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/add-book', [AddBookController::class, 'index']);
Route::post('/add-book', [AddBookController::class, 'store']);
Route::get('/book/{slug}', [DescriptionController::class, 'index']);
Route::post('/add-post/{slug}', [DescriptionController::class, 'store']);
Route::get('/edit-book/{slug}', [BookController::class, 'edit']);
Route::put('/edit-book/{slug}', [BookController::class, 'update']);
Route::get('/moderate-panel', [ModerateController::class, 'index']);
Route::get('/moderate/accept/{id}', [ModerateController::class, 'accept']);
Route::get('/moderate/delete/{id}', [ModerateController::class, 'delete']);
Route::get('/authors-panel', [AuthorsPanelController::class, 'index']);
Route::get('/add-chapter/{slug}', [ChapterController::class, 'index']);
Route::post('/add-chapter/{slug}', [ChapterController::class, 'store']);
Route::get('/add-chapters/{slug}', [ChapterController::class, 'multiIndex']);
Route::post('/add-chapters/{slug}', [ChapterController::class, 'multiStore']);
Route::get('/reader/{slug}/{chapter_slug}', [ReaderController::class, 'index']);
Route::get('/admin-panel', [AdminPanelController::class, 'index']);
Route::get('/chapters-panel/{slug}', [ChaptersPanelController::class, 'index']);
Route::get('/edit-chapter/{id}', [ChapterController::class, 'edit']);
Route::put('/edit-chapter/{id}', [ChapterController::class, 'update']);
Route::get('/delete-chapter/{id}', [ChapterController::class, 'destroy']);
Route::get('/book-delete/{slug}', [BookController::class, 'destroy']);
Route::post('/add-genre', [AdminPanelController::class, 'store']);
Route::post('/book/{book}/likes', [BookLikeController::class, 'like'])->name('book.likes');
Route::post('/book/{book}/dislikes', [BookLikeController::class, 'dislike'])->name('book.dislikes');
Route::get('/all-books', [AllBooksController::class, 'index']);
Route::get('/finished-books', [FinishedBooksController::class, 'index']);
Route::get('/search', [SearchController::class, 'index']);
Route::post('/search', [SearchController::class, 'search']);

// Sitemap
Route::get('/stm/sitemap.xml', [SitemapController::class, 'index']); 
Route::get('/stm/sitemap/books.xml', [SitemapController::class, 'books']); 
Route::get('/stm/sitemap/chapters.xml', [SitemapController::class, 'chapters']); 
