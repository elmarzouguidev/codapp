<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateEmailsSettings extends SettingsMigration
{


    public function up(): void
    {
        $this->migrator->add('emails.from_address', 'admin@admin.com');
        $this->migrator->add('emails.from_name', 'Elmarzougui Abdelghafour');
        $this->migrator->add('emails.smtp_host', 'smtp.gmail.com');
        $this->migrator->add('emails.smtp_user', 'user@domain.com');
        $this->migrator->addEncrypted('emails.smtp_pass', '123456789');
        $this->migrator->add('emails.smtp_port', '443');
        $this->migrator->add('emails.smtp_security', 'none');
        $this->migrator->add('emails.smtp_auth_domain', 'admin@admin.com');
    }
}
