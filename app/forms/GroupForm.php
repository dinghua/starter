<?php

use Kris\LaravelFormBuilder\Form;

class GroupForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', ['label'=>Lang::get('backend::groups.name')]);
    }
}
