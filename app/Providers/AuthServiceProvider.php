<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Auth;
use Hash;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Validator;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, Auth::user()->password);
        });
    }
}
