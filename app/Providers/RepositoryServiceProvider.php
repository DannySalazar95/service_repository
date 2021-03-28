<?php

namespace App\Providers;

use App\Repositories\Post\PostEloquentRepository;
use App\Repositories\Post\PostInterfaceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PostInterfaceRepository::class, PostEloquentRepository::class);
    }
}
