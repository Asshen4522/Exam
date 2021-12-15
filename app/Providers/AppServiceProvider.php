<?php

namespace App\Providers;

use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;
//use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

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
        //
        
        //FacadesView::share('name', $FIO);    
    }
}
