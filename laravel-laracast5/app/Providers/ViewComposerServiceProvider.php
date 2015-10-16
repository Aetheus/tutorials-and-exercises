<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //check config/app.php
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeNavigation(){
        view()->composer("partials.nav", "App\Http\Composers\NavigationComposer@compose");

        /*
        easier way of doing this, for less complex requests
        view()->composer("partials.nav", function ($view){
            $view->with("latest", Article::latest()->first());
        });*/
    }
}
