<?php namespace Codecycler\CustomSortShopaholic\Classes\Event;

use Event;
use Backend;
use Lovata\Shopaholic\Controllers\Products;

class ExtendProductController
{
    public function subscribe()
    {
        Products::extend(function ($obController) {
            // Add the reorder behavior
            array_push($obController->implement, 'Backend.Behaviors.ReorderController');

            // Add reorder config
            $obController->addDynamicProperty('reorderConfig', '$/codecycler/customsortshopaholic/config/reorder.yaml');
        });

        Event::listen('lovata.backend.extend_list_toolbar', function ($obController) {
            if (!$obController instanceof Products) {
                return;
            }

            // Add the reorder button to the toolbar
            $url    = Backend::url('lovata/shopaholic/products/reorder');
            $label  = e(trans('codecycler.customsortshopaholic::lang.buttons.reorder_products'));

            return '<a class="btn btn-default oc-icon-reorder" href="' . $url . '">' . $label . '</a>';
        });
    }
}