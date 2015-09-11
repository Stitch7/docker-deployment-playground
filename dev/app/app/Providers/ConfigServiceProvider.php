<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = realpath(base_path('/config'));
        $this->app->useConfigPath($configPath);
        $this->app->configure('countries');
        $this->app->configure('languages');
    }
}