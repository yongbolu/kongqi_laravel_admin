<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ExtendClass\AnyUpload;

class FacadesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('any_upload', function ($app) {
            return new AnyUpload();
        });

    }
}
