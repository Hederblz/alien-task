<?php

namespace App\Providers;

use App\Events\CrudEvent;
use App\Events\NotaCriadaEvent;
use App\Events\UserEvent;
use App\Http\Controllers\LogController;
use App\Listeners\NotaCriada;
use App\Listeners\RegisterUserLog;
use App\Listeners\RegistrarNota;
use App\Models\Log;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
       
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(CrudEvent::class, [NotaCriada::class, 'handle']);        
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
