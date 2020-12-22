<?php

/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 11/décembre/2020
 **/

namespace App\Hooks\Handler;

use App\Hooks\Repository\HookRepository;
use App\Http\Controllers\Hooks\Elementor\ElementorHookController;
use App\Http\Controllers\Hooks\ClickFunnels\ClickFunnelsHookController;
use App\Http\Controllers\Hooks\Shopify\ShopifyController;
use App\Http\Controllers\Hooks\WooCommerce\WooCommerceController;

class WebHook extends HookRepository
{


    public function __invoke()
    {
        $this->wpElementor();
    }

    public function clickFunnels()
    {
        return new ClickFunnelsHookController($this->getAllData());
    }

    public function wpElementor()
    {
        return new ElementorHookController($this->getAllData());
    }

    public function wpWooCommerce()
    {
        return new WooCommerceController($this->webhookCall);
    }

    public function shopify()
    {

        return new ShopifyController($this->webhookCall);
    }
}
