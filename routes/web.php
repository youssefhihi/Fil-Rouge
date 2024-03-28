<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GenreController;

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
    Route::get('/dashboard/users', function () {
        return view('admin.users');
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

