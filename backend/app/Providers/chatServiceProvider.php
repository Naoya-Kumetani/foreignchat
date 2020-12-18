<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class chatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
        'chatService', // キー名
        'App\Services\chatService' // クラス名
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
