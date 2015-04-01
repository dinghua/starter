<?php namespace  Kris\LaravelFormBuilder\Fields;

class LinkType extends FormField
{
    /**
     * @inheritdoc
     */
    protected function getTemplate()
    {
        return 'link';
    }

    /**
     * @inheritdoc
     */
    protected function getDefaults()
    {
        return [
            'attr' => ['type' => $this->type]
        ];
    }
}
