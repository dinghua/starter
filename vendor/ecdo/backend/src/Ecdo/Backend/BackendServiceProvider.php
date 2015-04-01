<?php namespace Ecdo\Backend;

use Illuminate\Support\ServiceProvider;
use Ecdo\Backend\Console\InstallCommand;
use Ecdo\Backend\Console\UserSeedCommand;

class BackendServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ecdo/backend');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		include __DIR__ .'/routes.php';
        $this->registerInstallCommands();
        $this->registerUserSeedCommands();
        $this->commands('command.backend.install','command.backend.user');
	}

	/**
     * Register console commands backend:install
     *
     * @author cooper
     * @link   http://ecdo.cc
     *
     * @return void
     */
    public function registerInstallCommands()
    {
        $this->app['command.backend.install'] = $this->app->share(function($app)
        {
            return new InstallCommand();
        });
    }

    /**
     * Register console commands backend:user
     *
     * @author cooper
     * @link   http://ecdo.cc
     *
     * @return void
     */
    public function registerUserSeedCommands()
    {
        $this->app['command.backend.user'] = $this->app->share(function($app)
        {
            return new UserSeedCommand();
        });
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('backend');
	}

}