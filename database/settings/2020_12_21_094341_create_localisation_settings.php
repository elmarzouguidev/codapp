<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateLocalisationSettings extends SettingsMigration
{
    public function up(): void
    { 
        $this->migrator->add('localisation.country', 'MAROC');
        $this->migrator->add('localisation.timezone', 'Africa/Casablanca');
        $this->migrator->add('localisation.default_lng', 'Francais');
        $this->migrator->add('localisation.currency_code', 'MAD');
        $this->migrator->add('localisation.currency_symbole', 'DH');

    }
}
