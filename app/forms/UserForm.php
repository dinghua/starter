<?php

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text', ['label'=>Lang::get('backend::users.first_name')])
            ->add('last_name', 'text', ['label'=>Lang::get('backend::users.last_name')])
            ->add('email', 'text', ['label'=>Lang::get('backend::users.email')])
            ->add('password', 'password', ['label'=>Lang::get('backend::users.password')])
            ->add('password_confirmation', 'password', ['label'=>Lang::get('backend::users.confirm_password')]);
    }
}
