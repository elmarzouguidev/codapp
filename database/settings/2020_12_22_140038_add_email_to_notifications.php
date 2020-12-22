<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddEmailToNotifications extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('notifications.email_to_send', 'admin@admin.com');
    }
}
