<?php

namespace App\Providers;

use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Repositories\BookRepository;
use App\Repositories\UserRepository;
use App\Services\BookService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Services\BookServiceInterface;
use App\Interfaces\Services\UserServiceInterface;

class InterfaceServiceProvicer extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BookServiceInterface::class, BookService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
