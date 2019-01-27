<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->concord->registerModel(\Konekt\User\Contracts\User::class, \App\User::class);
    }


    public function register()
    {
        //
    }
}
