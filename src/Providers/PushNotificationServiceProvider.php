<?php

namespace Dptsi\PushNotification\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\ChannelManager;
use Dptsi\PushNotification\Services\PushNotification;
use Dptsi\PushNotification\Channels\FirebaseChannel;

class PushNotificationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $this->app->make(ChannelManager::class)->extend('firebase', function () use ($app) {
            return $app->make(FirebaseChannel::class);
        });

        $this->mergeConfigFrom(
            __DIR__. '../../Config/pushnotification.php',
            'pushnotification'
        );
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__. '/../Config/pushnotification.php' => config_path('pushnotification.php'),
        ]);

        $this->app->bind('pushnotification', PushNotification::class);
    }
}
