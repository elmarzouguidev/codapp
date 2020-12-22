<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.app_name', 'HayMacProduction');
        $this->migrator->add('general.ceo', 'Elmarzougui Abdelghafour');
        $this->migrator->add('general.mobile', '0677512753');
        $this->migrator->add('general.address', 'Casablanca AIN CHOK');
        $this->migrator->add('general.email', 'abdelgha4or@gmail.com');
        $this->migrator->add('general.website', 'www.elmarzougui.com');
        $this->migrator->add('general.country', 'Maroc');
        $this->migrator->add('general.city', 'Casablanca');
        $this->migrator->add('general.code_postale', '200000');
        $this->migrator->add('general.app_active', true);
        $this->migrator->add('general.timezone', 'Africa/Casablanca');
    }
}
