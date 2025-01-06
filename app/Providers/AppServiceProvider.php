<?php

namespace App\Providers;

use App\Services\BookService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Services\BookServiceInterface;
use App\Interfaces\Services\UserServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BookServiceInterface::class, BookService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
