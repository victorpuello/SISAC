<?php

namespace ATS\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
<<<<<<< HEAD
        'ATS\Events\LlenarPlanillasEvent' => [
            'ATS\Listeners\CrearPlanillasListener',
        ],'ATS\Events\CrearEstudianteEvent' => [
            'ATS\Listeners\CrearEstudianteListener',
        ],
=======
        'ATS\Events\LlenarPlanillasEvent' => ['ATS\Listeners\CrearPlanillasListener'],
        'ATS\Events\CrearObservacionesEvent' => ['ATS\Listeners\CrearObservacionesListener'],
>>>>>>> f205701c54e689f65413584e1861d5d7aa273eb0
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
