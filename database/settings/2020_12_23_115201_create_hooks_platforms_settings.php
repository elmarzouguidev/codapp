<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateHooksPlatformsSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('hooks.platform', 'shopify');
        $this->migrator->add('hooks.name', 'shopify');
        $this->migrator->add('hooks.header', 'X-Shopify-Hmac-Sha256');
        $this->migrator->add('hooks.secret', 'haymacproduction');
        $this->migrator->add('hooks.domain', 'haymac.shopify.com');
        $this->migrator->add('hooks.route', 'shopifyHooks');
        $this->migrator->add('hooks.validated', true);
        $this->migrator->add('hooks.active', true);


        /********************************************************************** */
    }
}
