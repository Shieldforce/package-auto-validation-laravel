<?php

namespace ShieldForce\AutoValidation\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use ShieldForce\AutoValidation\Http\Kernel;
use ShieldForce\AutoValidation\Http\Middleware\RouteType;

class AutoValidationServiceProvider extends ServiceProvider
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
        new RouteType(Auth());
    }
}
