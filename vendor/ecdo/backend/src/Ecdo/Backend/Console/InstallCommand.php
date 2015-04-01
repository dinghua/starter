<?php namespace Ecdo\Backend\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class InstallCommand extends Command {

    /**
    * The console command name.
    *
    * @var string
    */
    protected $name = 'backend:install';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'publish assets,configs and run migration';

    /**
     * Exceute the console command
     *
     * @author cooper
     * @link   http://ecdo.cc
     *
     * @return void
     */
    public function fire()
    {
        $this->call('migrate', array('--env' => $this->option('env'), '--package' => 'cartalyst/sentry' ) );
        $this->call('migrate', array('--env' => $this->option('env'), '--package' => 'ecdo/backend' ) );
        $this->call('config:publish', array('package' => 'cartalyst/sentry' ) );
        $this->call('config:publish', array('package' => 'anahkiasen/former' ) );
        $this->call('config:publish', array('package' => 'ecdo/backend' ) );
        $this->call('asset:publish', array('package' => 'ecdo/backend' ) );

        if ($this->confirm('Do you wish to create a user? [yes|no]'))
        {
            $this->call('backend:user');
        }
    }


    public function getOptions()
    {
        return array(
            array('env', null, InputOption::VALUE_OPTIONAL, 'The environment the command should run under.', null),
        );
    }
}
