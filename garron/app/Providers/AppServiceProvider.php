<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Lang;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(empty(session('locale'))){
            session(['locale' => Lang::locale()]);
        }
        Lang::setLocale(session('locale'));   
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       /* $this->app->binf('path.public', function(){
            return base_path() .'/html';
        });*/
    }
}
