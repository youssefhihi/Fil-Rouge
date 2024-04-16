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
use App\Http\Controllers\EmpruntsController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'data']);

Route::middleware('guest')->group(function () {
Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('/auth/google/callback-url',[GoogleAuthController::class,'callbackGoogle']);
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
});
Route::middleware(['auth'])->group(function () {
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
Route::middleware(['auth','role:client','isbanned'])->group(function () {
Route::get('/home', [PostController::class,'index'])->name('home.index');
Route::get('/books/search', [ClientController::class,'search'])->name('search');
Route::post('/home/post', [PostController::class,'store'])->name('post.store');
Route::delete('/profile/{post}/delete', [PostController::class,'destroy'])->name('post.destroy');
Route::get('/profile/{post}/edit', [PostController::class,'edit'])->name('post.edit');
Route::put('/profile/{post}/update', [PostController::class,'update'])->name('post.update');
Route::resource('/book-review', ReviewController::class);
Route::resource('/rating', RatingController::class);
Route::resource('/reservation', ReservationController::class);
Route::get('/profile', [ProfileController::class,'index'])->name('profile.index');
Route::get('/books', [ClientController::class,'index'])->name('books.index');
Route::get('/books/sort/{genre}', [ClientController::class,'sortGenre'])->name('sortGenre');
Route::get('/books/ss{author}', [ClientController::class,'sortAuthor'])->name('sortAuthor');
Route::get('/books/{book}', [ClientController::class,'show'])->name('book.details');
Route::patch('/edit-profile', [ProfileController::class,'update'])->name('profile.update');
Route::patch('/edit-password', [ProfileController::class,'password'])->name('password');
Route::patch('/edit-profile-inf', [ProfileController::class,'updateInf'])->name('profile.updateInf');
Route::patch('/edit-socialMedia-Links', [ProfileController::class,'socialeMedia'])->name('socialeMedia');
Route::post('/edit-ImageProfile', [ProfileController::class,'uploadImage'])->name('uploadImage');
Route::put('/edit-ImageProfile', [ProfileController::class,'updateImage'])->name('updateImage');
Route::delete('/edit-DeleteImage', [ProfileController::class,'deleteImage'])->name('deleteImage');
Route::get('/edit-profile', [ProfileController::class,'show']);


Route::get('/test', function () {
    return view('client.test');
});
});


























Route::middleware(['auth','role:admin'])->group(function () {
    Route::resource('/dashboard/genres', GenreController::class);
    Route::resource('/dashboard/books', BookController::class);
    Route::get('/dashboard/users', [AdminController::class,'index']);
    Route::patch('/dashboard/users/{user}/block', [AdminController::class,'block'])->name('users.block');
    Route::patch('/dashboard/users/{user}', [AdminController::class,'canPost'])->name('users.canPost');
    Route::get('/dashboard/emprunts', [EmpruntsController::class,'emprunts']);
    Route::get('/dashboard/reservations/today', [EmpruntsController::class,'todaysReservation']);
    Route::resource('/dashboard/authors', AuthorController::class);
    Route::resource('/dashboard/reservations', ReservationController::class);
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    


   
    Route::get('/dashboard/messages', function () {
        return view('admin.messages');
    });
    Route::get('/books/book-sort', function () {
        return view('client.booksSort');
    });
});

