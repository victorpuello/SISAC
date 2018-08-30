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
        Blade::if('secretaria', function (){
            return optional(auth()->user())->isSecretaria();
        });

        Blade::if('director', function (){
            return optional(auth()->user()->docente)->is_director;
        });
        Blade::if('acudiente', function ($estudiante){
            return is_null($estudiante->acudiente);
        });
        Blade::if('editar', function ($estudiante){
            return is_null($estudiante);
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
