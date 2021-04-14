<?php namespace Codecycler\CustomSortShopaholic;

use Codecycler\CustomSortShopaholic\Classes\Event\ExtendProductController;
use Codecycler\CustomSortShopaholic\Classes\Event\ExtendProductModel;
use Codecycler\CustomSortShopaholic\Classes\Event\ExtendThemeConfigFields;
use Codecycler\CustomSortShopaholic\Classes\Event\ProductModelHandler;
use Event;
use System\Classes\PluginBase;

/**
 * Class Plugin
 * @package Codecycler\CustomSortShopaholic
 */
class Plugin extends PluginBase
{
    public function boot()
    {
        Event::subscribe(ExtendProductModel::class);
        Event::subscribe(ExtendProductController::class);
        Event::listen('backend.form.extendFields', ExtendThemeConfigFields::class);
        Event::subscribe(ProductModelHandler::class);
    }
}
