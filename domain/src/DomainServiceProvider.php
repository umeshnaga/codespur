<?php

namespace Codespur\Domain;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    protected $defer = false;

    public function boot()
    {
        //
        
         //$this->handleConfigs();
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        //include __DIR__.'/cpanel_api.php';
        $this->app['cpanel'] = $this->app->share(function($app)
        {
            
            $host = $app['config']['cpanel']['host'];
            $user = $app['config']['cpanel']['user'];
            $password =$app['config']['cpanel']['auth'];

            return new Cpanel($host, $user, $password);
        });

    }
    private function handleConfigs()
    {
        $configPath = __DIR__ . '/../config/cpanel.php';
        $this->publishes([$configPath => config_path('cpanel.php')]);
        //$this->mergeConfigFrom($configPath, 'cpanel');
    }
    
    public function provides()
	{
		return array();
	}
}
