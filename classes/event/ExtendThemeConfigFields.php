<?php namespace Codecycler\CustomSortShopaholic\Classes\Event;

use Cms\Controllers\ThemeOptions;
use Cms\Models\ThemeData;

class ExtendThemeConfigFields
{
    public function handle($obFormWidget)
    {
        if (!$obFormWidget->model instanceof ThemeData) {
            return;
        }

        if (!$obFormWidget->getController() instanceof ThemeOptions) {
            return;
        }

        $obFormWidget->addTabFields($this->extendFields());
    }

    public function extendFields()
    {
        $options = [
            'alphabet' => 'Alphabet',
            'custom_sort_order' => 'Custom sort order',
        ];

        return [
            'default_sort' => [
                'label' => 'Default sort',
                'type' => 'dropdown',
                'span' => 'left',
                'options' => $options,
                'tab' => 'Search and filter',
            ],
        ];
    }
}