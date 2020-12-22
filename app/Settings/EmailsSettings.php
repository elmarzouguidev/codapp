<?php

/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 13/décembre/2020
 **/

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class EmailsSettings extends Settings
{

    public string $from_address;

    public string $from_name;

    public string $smtp_host;

    public string $smtp_user;

    public string $smtp_pass;

    public int $smtp_port;

    public string $smtp_security;

    public ? string $smtp_auth_domain;
   
    public static function group(): string
    {
        return 'emails';
    }

    public static function encrypted(): array
    {
        return [
            'smtp_pass'
         ];
    }
}
