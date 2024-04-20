<?php

namespace App\Providers;

use App\Models\Reservation;
use App\Services\GenreService;
use App\Services\CommentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Genre\GenreRepository;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\Genre\GenreRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GenreRepositoryInterface::class, GenreRepository::class);
        $this->app->bind(GenreService::class, function ($app) {
            return new GenreService($app->make(GenreRepositoryInterface::class));
        });
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(CommentService::class, function ($app) {
            return new CommentService($app->make(CommentRepositoryInterface::class));
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.sideBar', function ($view) {
          $reservationCount =  Reservation::where('is_returned', false)->where('is_taken', false)->count();
          $empruntsCount =  Reservation::where('is_returned', false)->where('is_taken', true)->count();
          $view->with([
            'reservationCount' => $reservationCount,
            'empruntsCount' => $empruntsCount,
            ]);        
        });
       
    }
}
