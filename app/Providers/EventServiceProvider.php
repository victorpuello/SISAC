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
        'ATS\Events\LlenarPlanillasEvent' => ['ATS\Listeners\CrearPlanillasListener'],
        'ATS\Events\CrearObservacionesEvent' => ['ATS\Listeners\CrearObservacionesListener'],
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
