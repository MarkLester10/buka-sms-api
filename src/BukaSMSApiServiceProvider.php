<?php

namespace MarkLesterMorta\BukaSMSApi;

use Illuminate\Support\ServiceProvider;

class BukaSMSApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/buka-sms-api.php' => config_path('buka-sms-api.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton(BukaSMSApi::class, function(){
            return new BukaSMSApi();
        });
    }
}
