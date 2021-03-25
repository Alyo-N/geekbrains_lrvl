<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use App\Listeners\LastLogin;
use App\Events\User;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
      /*  'Illuminate\Auth\Events\Login' => [
            LastLogin::class
        ],
*/
        User::class => [
            LastLogin::class
        ],

        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
			// ... other providers
			'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
		],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
