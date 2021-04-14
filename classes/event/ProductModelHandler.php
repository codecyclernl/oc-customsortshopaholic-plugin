<?php namespace Codecycler\CustomSortShopaholic\Classes\Event;

use Lovata\Shopaholic\Classes\Item\ProductItem;
use Lovata\Shopaholic\Models\Product;
use Lovata\Toolbox\Classes\Event\ModelHandler;

class ProductModelHandler extends ModelHandler
{
    protected $obElement;

    public function subscribe($obEvent)
    {
        parent::subscribe($obEvent);

        $obEvent->listen('shopaholic.sorting.get.list', function ($sSorting) {
            return $this->getSortingList($sSorting);
        });
    }

    public function getModelClass()
    {
        return Product::class;
    }

    public function getItemClass()
    {
        return ProductItem::class;
    }

    public function getSortingList($sSorting)
    {
        if (empty($sSorting)) {
            return null;
        }

        if ($sSorting == 'custom') {
            return $this->getSortingCustom();
        }

        if ($sSorting == 'alphabetically') {
            return $this->getSortingAlphabetically();
        }

        return null;
    }

    public function getSortingCustom()
    {
        $arProductIDList = Product::orderBy('sort_order', 'asc')->lists('id');

        return $arProductIDList;
    }

    public function getSortingAlphabetically()
    {
        $arProductIDList = Product::orderBy('name', 'asc')->lists('id');

        return $arProductIDList;
    }
}