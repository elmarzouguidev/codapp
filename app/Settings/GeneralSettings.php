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

class GeneralSettings extends Settings
{

    public string $app_name;
    
    public string $ceo;

    public string $mobile;

    public string $address;

    public string $email;

    public string $website;

    public string $country;

    public string $city;

    public string $code_postale;

    public bool $app_active;

    public static function group(): string
    {
        return 'general';
    }

   /* public static function encrypted(): array
    {
        return [
            'hookCSRF'
         ];
    }*/
}
