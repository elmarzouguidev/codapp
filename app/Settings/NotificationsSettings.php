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

class NotificationsSettings extends Settings
{

    public bool $new_admin;

    public bool $new_lead;

    public bool $new_command;

    public bool $command_delivered;

    public bool $new_moderator;

    public bool $new_delivery;

    public int $time;

    public string $email_to_send;



    public static function group(): string
    {
        return 'notifications';
    }

    /* public static function encrypted(): array
    {
        return [
            'hookCSRF'
         ];
    }*/
}
