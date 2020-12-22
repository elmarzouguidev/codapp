<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateInvoiceSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('invoice.prefix', 'command_');
        $this->migrator->add('invoice.logo', 'https://cdn3.geckoandfly.com/wp-content/uploads/2019/06/530-invoice-templates.jpg');
    }
}
