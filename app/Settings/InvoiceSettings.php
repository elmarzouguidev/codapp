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

class InvoiceSettings extends Settings
{

    public string $prefix;

    public  ? string $logo;


    public static function group(): string
    {
        return 'invoice';
    }

    public function getLogo(){

        if(isset($this->logo)){

           return getImagePath().$this->logo;
        }
        return "https://cdn3.geckoandfly.com/wp-content/uploads/2019/06/530-invoice-templates.jpg";
    }
}
