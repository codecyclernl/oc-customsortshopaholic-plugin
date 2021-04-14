<?php namespace Codecycler\CustomSortShopaholic\Updates;

use Seeder;
use Lovata\Shopaholic\Models\Product;

class SeederTableProductSortOrder extends Seeder
{
    public function run()
    {
        foreach (Product::all() as $obProduct) {
            if (!$obProduct->sort_order) {
                $obProduct->sort_order = $obProduct->id;
                $obProduct->save();
            }
        }
    }
}