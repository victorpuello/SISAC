<?php

namespace ATS\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'ATS\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
        $this->mapDocenteRoutes();
        //$this->mapSecretariaRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
    

    protected function mapDocenteRoutes ()
    {
        Route::middleware(['web','auth','docente'])
            ->name('docente.')
            ->namespace($this->namespace.'\Admin')
            ->prefix('docente')
            ->group(base_path('routes/docentes.php'));
    }

    protected function mapAdminRoutes ()
    {
        Route::middleware(['web','auth','admin'])
            ->namespace($this->namespace.'\Admin')
            ->prefix('admin')
            ->group(base_path('routes/admin.php'));
    }
    protected function mapSecretariaRoutes ()
    {
        Route::middleware(['web','auth','secretaria'])
            ->name('secretaria.')
            ->namespace($this->namespace.'\Secretaria')
            ->prefix('secretaria')
            ->group(base_path('routes/secretaria.php'));
    }
}
