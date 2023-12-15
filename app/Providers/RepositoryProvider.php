<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\User\Eloquent\EloquentUserRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class,function(){
            return new EloquentUserRepository(new User());
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
