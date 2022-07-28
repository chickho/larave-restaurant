<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(User $user){
            return $user->role === 'admin';
        });
        Gate::define('cashier', function(User $user){
            return $user->role === 'cashier';
        });
        Gate::define('kitchen', function(User $user){
            return $user->role === 'kitchen';
        });
        Gate::define('customer', function(User $user){
            return $user->role === 'customer';
        });
        Gate::define('tamu', function(User $user){
            return $user->role === 'guest';
        });
    }
}
