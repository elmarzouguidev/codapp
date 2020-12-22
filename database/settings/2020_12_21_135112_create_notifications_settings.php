<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateNotificationsSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('notifications.new_admin', true);
        $this->migrator->add('notifications.new_lead', true);
        $this->migrator->add('notifications.new_command', true);
        $this->migrator->add('notifications.new_moderator', true);
        $this->migrator->add('notifications.new_delivery', true);
        $this->migrator->add('notifications.command_delivered', true);
        $this->migrator->add('notifications.time', 2);
    }
}
