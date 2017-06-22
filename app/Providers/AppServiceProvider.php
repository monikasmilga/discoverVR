<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require base_path('App/Http/helpers.php');

        if(request()->segment(1) !== 'admin')
        {
            View::share('menu', getFrontEndMenu());
            View::share('languageMenu', getActiveLanguages());
            View::share('vrRooms', getVRRooms());
        }




    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
