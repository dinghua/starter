<?php namespace Ecdo\Backend\Controllers;

use Controller;
use View;
use Config;
use Kris\LaravelFormBuilder\FormBuilder;

class BaseController extends Controller {

    protected $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
        //share the config option to all the views
        View::share('backend', Config::get('backend::site_config'));
    }

    /**
     * get the validation service
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @param  string $service
     * @param  array $inputs
     * @return Object
     */
    protected function getValidationService($service, array $inputs = array())
    {
        $class = '\\'.ltrim(Config::get("backend::validation.{$service}"), '\\');
        return new $class($inputs);
    }

}
