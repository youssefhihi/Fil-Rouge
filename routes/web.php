<?php

use App\Models\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GoogleAuthController;

Route::middleware('guest')->group(function () {
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
});

Route::post('logout', [LoginController::class, 'destroy'])->name('logout');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('/auth/google/callback-url',[GoogleAuthController::class,'callbackGoogle']);
Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard/genres', GenreController::class);
    Route::resource('/dashboard/books', BookController::class);
    Route::get('/dashboard/users', [AdminController::class,'index']);
    Route::patch('/dashboard/users/{user}/block', [AdminController::class,'block'])->name('users.block');
    Route::patch('/dashboard/users/{user}', [AdminController::class,'canPost'])->name('users.canPost');
    Route::resource('/dashboard/authors', AuthorController::class);
    Route::resource('/home', PostController::class);
    Route::get('/profile', [ProfileController::class,'index'])->name('profile.index');
    Route::get('/books', [ClientController::class,'index'])->name('books.index');
    Route::get('/books/sort/{genre}', [ClientController::class,'sortGenre'])->name('sortGenre');
    Route::get('/books/ss{author}', [ClientController::class,'sortAuthor'])->name('sortAuthor');
    Route::get('/books/{book}', [ClientController::class,'show'])->name('book.details');


    Route::get('/editProfile', function () {
        return view('client.editProfile');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/bookPage', function () {
        return view('client.bookPage');
    });

    Route::get('/dashboard/emprunts', function () {
        return view('admin.emprunts');
    });
    Route::get('/dashboard/reservation', function () {
        return view('admin.reservations');
    });
    Route::get('/dashboard/messages', function () {
        return view('admin.messages');
    });
    Route::get('/books/book-sort', function () {
        return view('client.booksSort');
    });
});

