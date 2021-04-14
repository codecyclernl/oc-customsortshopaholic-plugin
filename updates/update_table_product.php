<?php namespace Codecycler\CustomSortShopaholic\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * Class UpdateTableProduct
 * @package Codecycler\CustomSortShopaholic\Updates
 */
class UpdateTableProduct extends Migration
{
    /**
     * Apply migration
     */
    public function up()
    {
        if (!Schema::hasTable('lovata_shopaholic_products') || Schema::hasColumn('lovata_shopaholic_products', 'sort_order')) {
            return;
        }

        Schema::table('lovata_shopaholic_products', function (Blueprint $obTable) {
            $obTable->integer('sort_order')->nullable();
        });
    }

    /**
     * Rollback migration
     */
    public function down()
    {
        if (!Schema::hasTable('lovata_shopaholic_products') || !Schema::hasColumn('lovata_shopaholic_products', 'sort_order')) {
            return;
        }

        Schema::table('lovata_shopaholic_products', function (Blueprint $obTable) {
            $obTable->dropColumn('sort_order');
        });
    }
}
