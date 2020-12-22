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

class LocalisationSettings extends Settings
{

    public string $country;

    public string $timezone;

    public string $currency_code;

    public string $currency_symbole;

    public string $default_lng;

    public static function group(): string
    {
        return 'localisation';
    }

    /* public static function encrypted(): array
    {
        return [
            'hookCSRF'
         ];
    }*/
}
