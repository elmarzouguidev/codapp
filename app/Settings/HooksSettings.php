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

class HooksSettings extends Settings
{

    public string $name;

    public string $header;

    public string $secret;

    public string $domain;

    public string $route;

    public bool $validated;

    public bool $active;

    public static function group(): string
    {
        return 'hooks';
    }

    /* public static function encrypted(): array
    {
        return [
            'secret'
         ];
    }*/
}
