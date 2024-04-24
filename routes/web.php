<?php

use App\Models\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EmpruntsController;
use App\Http\Controllers\Auth\ForgetPassword;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SubscribersController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [WelcomeController::class, 'data']);
Route::post('/subsribe',[SubscribersController::class,'store'])->name('suscriber.store');
Route::get('/generate-reservation/{reservation}',[PdfController::class,'index'])->name('generate.pdf');

Route::middleware('guest')->group(function () {
    //forget password
Route::get('/forget-password',[ForgetPassword::class,'index']);    
Route::post('/forget-password',[ForgetPassword::class,'forgetPassword'])->name('forgetPassword');
Route::get('/reset-password/{token}',[ForgetPassword::class,'ResetPassword'])->name('ResetPassword');
Route::post('/reset-password',[ForgetPassword::class,'NewPassword'])->name('NewPassword');
        // authentification with google
Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');        
Route::get('/auth/google/callback-url',[GoogleAuthController::class,'callbackGoogle']);
        //register
Route::get('register', [RegisterController::class, 'create'])->name('register');        
Route::post('register', [RegisterController::class, 'store']);
        //login
Route::get('login', [LoginController::class, 'create'])->name('login');        
Route::post('login', [LoginController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    //logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');    
});

Route::middleware(['auth','role:client','isbanned'])->group(function () {
                //home page
Route::get('/home', [PostController::class,'index'])->name('home.index');                
Route::post('/home/post', [PostController::class,'store'])->name('post.store');
                //CRUD post
Route::delete('/profile/{post}/delete', [PostController::class,'destroy'])->name('post.destroy');                
Route::get('/profile/{post}/edit', [PostController::class,'edit'])->name('post.edit');
Route::put('/profile/{post}/update', [PostController::class,'update'])->name('post.update');
            //reservation
Route::get('/reserve/{book}', [EmpruntsController::class,'showReservation'])->name('reservePage');            
Route::resource('/reservation', ReservationController::class);
            //review
Route::resource('/review', ReviewController::class);            
            //rating
Route::resource('/rating', RatingController::class);            
            //profile
Route::get('/profile', [ProfileController::class,'index'])->name('profile.index');            
Route::patch('/edit-profile', [ProfileController::class,'update'])->name('profile.update');
Route::patch('/edit-profile-inf', [ProfileController::class,'updateInf'])->name('profile.updateInf');
Route::post('/edit-ImageProfile', [ProfileController::class,'uploadImage'])->name('uploadImage');
Route::put('/edit-ImageProfile', [ProfileController::class,'updateImage'])->name('updateImage');
Route::delete('/edit-DeleteImage', [ProfileController::class,'deleteImage'])->name('deleteImage');
Route::get('/edit-profile', [ProfileController::class,'show']);
Route::patch('/edit-password', [ProfileController::class,'password'])->name('password');
Route::patch('/edit-socialMedia-Links', [ProfileController::class,'socialeMedia'])->name('socialeMedia');
Route::get('/{post}', [ProfileController::class,'userProfile'])->name('user.profile');
            //books Page
Route::get('/books/searchBook', [ClientController::class,'search'])->name('search');            
Route::get('/books', [ClientController::class,'index'])->name('books.index');
Route::get('/books/sort/{genre}', [ClientController::class,'sortGenre'])->name('sortGenre');
Route::get('/books/ss{author}', [ClientController::class,'sortAuthor'])->name('sortAuthor');
Route::get('/books/{book}', [ClientController::class,'show'])->name('book.details');

Route::get('/comment/{id}', [CommentController::class,'show'])->name('comment.show');

});

//admin
Route::middleware(['auth', 'role:admin'])->prefix('dashboard')->group(function () {
            //CRUD books
    Route::resource('/books', BookController::class);
            //CRUD GENRE
    Route::resource('/genres', GenreController::class);
            //CRUD AUTHORS
    Route::resource('/authors', AuthorController::class);
    Route::resource('/reservations', ReservationController::class);
            //dashboard statistic
    Route::get('/statistic', [AdminController::class, 'index'])->name('dashboard.index');
            //users management
    Route::get('/users', [AdminController::class,'users']);
    Route::patch('/users/{user}/block', [AdminController::class,'block'])->name('users.block');
    Route::patch('/users/{user}', [AdminController::class,'canPost'])->name('users.canPost');
            //emprunts management
    Route::patch('/emprunts/return-date/{reservation}', [EmpruntsController::class,'update'])->name('updateReturn');
    Route::post('/emprunts/return-Email/{reservation}', [EmpruntsController::class,'returnMail'])->name('returnMail');
    Route::post('/emprunts/take-Book-Email/{reservation}', [EmpruntsController::class,'TakeBookMail'])->name('TakeBookMail');
    Route::get('/emprunts', [EmpruntsController::class,'emprunts']);
    Route::get('/emprunts/return-date', [EmpruntsController::class,'returnBook']);
    Route::get('/reservation/today', [EmpruntsController::class,'todaysReservation']);
            //user s ptofile
    Route::get('/{username}',[AdminController::class,'ShowClientProfile'])->name('Profile');  
});

