<?php

namespace ATS\Providers;

use ATS\Model\Planilla;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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
    	Schema::defaultStringLength(120);
        Blade::if('load', function (Planilla $planilla){
            return $planilla->isLoad();
        });
        Blade::if('edited', function (Planilla $planilla){
            return $planilla->isEdited();
        });
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
        Blade::if('institucion', function ($institucion){
            return is_null($institucion);
        });
        Blade::if('multilogros', function (){
            return (Config::get('institucion.indicadores.modoPlanilla') === 'seguimiento');
        });
        Blade::directive('prop', function ($expression) {
            return "<?php echo ATS\Clases\Vue::prop({$expression}); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->bind('path.public', function() {
            return base_path().'/public_html';
        });*/
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
