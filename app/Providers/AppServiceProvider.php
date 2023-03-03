<?php

namespace App\Providers;
use App\Repositories\AuthInterface;
use App\Repositories\AuthRepository;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(AuthInterface::class, AuthRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
