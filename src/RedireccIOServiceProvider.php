<?php

namespace Omatech\RedireccIO\Laravel;

use Illuminate\Support\ServiceProvider;
use Omatech\RedireccIO\RedireccIOClient;

class RedireccIOServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application service providers.
     *
     * @return void
     */
    public function register()
    {
        $this->configuration();
        $this->publish();

        app()->bind('RedireccIO', function() {
            return new RedireccIOClient(config('redireccio'));
        });
    }

    /**
     * Register configurations.
     *
     * @return void
     */
    private function configuration()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/redireccio.php', 'redireccio'
        );
    }

    /**
     * Publish configurations.
     *
     * @return void
     */
    private function publish()
    {
        $this->publishes([
            __DIR__.'/config/redireccio.php' => config_path('redireccio.php'),
        ]);
    }
}
