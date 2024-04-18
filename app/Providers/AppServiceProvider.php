<?php

namespace App\Providers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Repositories\GenreRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\GenreRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GenreRepositoryInterface::class, GenreRepository::class);


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
