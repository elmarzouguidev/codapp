<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateInvoiceSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('invoice.prefix', 'command_');

        $this->migrator->add('invoice.logo', null);
    }
}
