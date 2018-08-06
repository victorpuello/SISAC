<?php

namespace Ngsoft\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::if('admin', function (){
            return optional(auth()->user())->isAdmin();
        });
        Blade::if('docente', function (){
            return optional(auth()->user())->isDocente();
        });

        Blade::if('director', function (){
            return optional(auth()->user()->docente)->is_director;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
