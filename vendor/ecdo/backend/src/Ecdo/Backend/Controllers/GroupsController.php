<?php namespace Ecdo\Backend\Controllers;

use View;
use Redirect;
use Input;
use Lang;
use Sentry;
use Event;
use Config;
use Cartalyst\Sentry\Groups\NameRequiredException;
use Cartalyst\Sentry\Groups\GroupExistsException;
use Cartalyst\Sentry\Groups\GroupNotFoundException;

class GroupsController extends BaseController {


    /**
     * Display all the groups
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return Response
     */
    public function index()
    {
        $groups = Sentry::getGroupProvider()->findAll();

        return View::make(Config::get('backend::views.groups_index'), compact('groups'));
    }

    /**
     * Display create a new group form
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return Response
     */
    public function create()
    {
        $form  = $this->formBuilder->create('GroupForm', [
            'method' => 'POST',
            'url'    => route('admin.groups.store'),
        ])->add(Lang::get('backend::common.save'), 'submit', [
            'attr' => [ 'class' => 'btn btn-primary' ]
        ])->add(Lang::get('backend::common.cancel'), 'link', [
            'attr' => [ 'class' => 'btn btn-default' ],
            'href' => route('admin.groups.index')
        ]);
        return View::make(Config::get('backend::views.groups_create'), compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return Response
     */
    public function edit($id)
    {
        try
        {
            $group = Sentry::getGroupProvider()->findById($id);
            $form  = $this->formBuilder->create('GroupForm', [
                'method' => 'PUT',
                'url'    => route('admin.groups.update', $id),
                'model'  => $group
            ])->add(Lang::get('backend::common.save'), 'submit', [
                'attr' => [ 'class' => 'btn btn-primary' ]
            ])->add(Lang::get('backend::common.cancel'), 'link', [
                'attr' => [ 'class' => 'btn btn-default' ],
                'href' => route('admin.groups.index')
            ]);

            return View::make(Config::get('backend::views.groups_edit'), compact('group', 'form'));
        } catch (GroupNotFoundException $e)
        {
            return Redirect::route('admin.groups.index')->with('error', $e->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return Response
     */
    public function store()
    {
        try
        {
            $group = Sentry::getGroupProvider()->create(Input::only('name'));
            Event::fire('groups.create', array( $group ));

            return Redirect::route('admin.groups.index')->with('success', Lang::get('backend::groups.create_success'));
        } catch (NameRequiredException $e)
        {
            return Redirect::back()->withInput()->with('error', $e->getMessage());
        } catch (GroupExistsException $e)
        {
            return Redirect::back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return Response
     */
    public function update($id)
    {
        try
        {
            $group       = Sentry::getGroupProvider()->findById($id);
            $group->name = Input::get('name');
            $group->save();
            Event::fire('groups.update', array( $group ));

            return Redirect::route('admin.groups.index')->with('success', Lang::get('backend::groups.update_success'));
        } catch (GroupNotFoundException $e)
        {
            return Redirect::back()->withInput()->with('error', $e->getMessage());
        } catch (GroupExistsException $e)
        {
            return Redirect::back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return Response
     */
    public function destroy($id)
    {
        try
        {
            $group     = Sentry::getGroupProvider()->findById($id);
            $eventData = $group;
            $group->delete();
            Event::fire('groups.delete', array( $eventData ));
            if(\Request::ajax()){
                return \Response::json(['result'=>1]);
            }
            return Redirect::route('admin.groups.index')->with('success', Lang::get('backend::groups.delete_success'));
        } catch (GroupNotFoundException $e)
        {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

}
