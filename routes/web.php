<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/items', [ItemController::class, 'index'])->name('items.index');

Route::post('/items', [ItemController::class, 'store'])->name('items.store')->middleware('auth');

Route::get('/items/create', [ItemController::class, 'create'])->name('items.create')->middleware('auth');

Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');

Route::get('/authors/{author}', [AuthorController::class, 'show'])->name('authors.show');

Route::get('/register', [AuthorController::class, 'create'])->name('authors.create');

Route::get('/login', [AuthorController::class, 'login'])->name('authors.login')->middleware('guest');

Route::post('/authors/login', [AuthorController::class, 'authenticate'])->name('authors.authenticate')->middleware('guest');

Route::get('/logout', [AuthorController::class, 'logout'])->name('authors.logout')->middleware('auth');

Route::get('/reset_password', [AuthorController::class, 'forgot'])->name('authors.forgot')->middleware('guest');

Route::post('/reset_password', [AuthorController::class, 'reset'])->name('authors.reset')->middleware('guest');

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
