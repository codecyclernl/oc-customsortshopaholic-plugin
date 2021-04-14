<?php namespace Codecycler\CustomSortShopaholic\Classes\Event;

use Lovata\Shopaholic\Models\Product;
use October\Rain\Database\SortableScope;

class ExtendProductModel
{
    public function subscribe()
    {
        Product::extend(function ($obModel) {
            // Add the sortable behavior to the product model
            array_push($obModel->implement, 'October\Rain\Database\Behaviors\Sortable');
        });
    }
}