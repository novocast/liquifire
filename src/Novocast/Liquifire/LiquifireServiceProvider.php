<?php

namespace Novocast\Liquifire;

use Illuminate\Support\ServiceProvider as ServiceProvider;

class LiquifireServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * @return Object $this
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/config/liquifire.php' => config_path('/liquifire.php')]);

        return $this;

    }

    /**
     * @return Object $this
     */
    public function register()
    {
        $this->registerLiquifire();
        $this->app->alias('liquifire', 'Liquifire\Liquifire');
            
        return $this;

    }
        
    /**
     * @return Object $this;
     */
    protected function registerLiquifire()
    {
        $this->app->bind('Liquifire', function ($app) {
            return new Liquifire();

        });
        return $this;
    }
        
    /**
     * @return array services from provider
     */
    public function provides()
    {
        return array('Liquifire');
    }
}
