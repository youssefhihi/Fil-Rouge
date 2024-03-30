<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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


Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard/genres', GenreController::class);
    Route::resource('/dashboard/books', BookController::class);
    Route::get('/dashboard/users', [AdminController::class,'index']);
    Route::patch('/dashboard/users/{user}/block', [AdminController::class,'block'])->name('users.block');
    Route::patch('/dashboard/users/{user}', [AdminController::class,'canPost'])->name('users.canPost');
        Route::resource('/dashboard/authors', AuthorController::class);



    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/dashboard/add-book', function () {
        return view('admin.createBook');
    });

    Route::get('/dashboard/books', function () {
        return view('admin.books');
    });
    Route::get('/feed', function () {
        return view('client.home');
    });
    Route::get('/profile', function () {
        return view('client.profile');
    });
    Route::get('/books', function () {
        return view('client.books');
    });
    Route::get('/bookPage', function () {
        return view('client.bookPage');
    });
    Route::get('/dashboard/edit-book', function () {
        return view('admin.editBook');
    });
    Route::get('/dashboard/book-page', function () {
        return view('admin.bookPage');
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

