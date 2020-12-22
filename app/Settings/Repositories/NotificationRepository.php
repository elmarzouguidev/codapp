<?php

/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 13/décembre/2020
 **/

namespace App\Settings\Repositories;

use App\Http\Requests\Settings\Notifications\NotificationsRequest;

use App\Settings\NotificationsSettings;

class NotificationRepository
{


    public function __construct(NotificationsSettings $settings, NotificationsRequest $request)
    {

        $actions = [
            'new_admin' => $request->has('new_admin') ? true : false,
            'new_lead' => $request->has('new_lead') ? true : false,
            'new_command' => $request->has('new_command') ? true : false,
            'command_delivered' => $request->has('command_delivered') ? true : false,
            'new_moderator' => $request->has('new_moderator') ? true : false,
            'new_delivery' => $request->has('new_delivery') ? true : false,
            'time' => $request->time_notify,
            'email_to_send' => $request->email_to_send,
        ];
        $settings->new_admin = $actions['new_admin'];
        $settings->new_lead = $actions['new_lead'];
        $settings->new_command = $actions['new_command'];
        $settings->command_delivered = $actions['command_delivered'];
        $settings->new_moderator = $actions['new_moderator'];
        $settings->new_delivery = $actions['new_delivery'];
        $settings->time = $actions['time'];
        $settings->email_to_send = $actions['email_to_send'];
        $settings->save();
    }
}
