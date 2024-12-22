<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('isAdmin', function ($user) {
            return $user->userCategory === 'admin';
        });

        Gate::define('staffAdmin', function ($user) {
            return $user->userCategory === 'admin' || $user->userCategory === 'staff';
        });

        Gate::define('isStaff', function ($user) {
            return $user->userCategory === 'staff';
        });

        Gate::define('isAcademician', function ($user) {
            return $user->userCategory === 'academician';
        });

        Gate::define('viewGrants', function ($user) {
            return $user->userCategory === 'admin' || $user->userCategory === 'staff' || $user->userCategory === 'academician';
        });

        /*Gate::define('isLeader', function ($user) {
            if ($user->userCategory === 'academician') {
                if ($user->academician->leader() === 'leader') {
                    return true;
                }
            }
        });*/


    }
}
