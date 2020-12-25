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

        /**
         * Publish files js and css in folder public
         */
        $this->publishes([
            base_path().DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."shieldforce".DIRECTORY_SEPARATOR."package-auto-validation-laravel".DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR.""
            => public_path(DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."shieldforce".DIRECTORY_SEPARATOR."package-auto-validation-laravel".DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR.""),
        ], 'feedback');
    }
}
