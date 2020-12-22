<?php

namespace App\Traits;

use App\Jobs\Notification\SendNotification;

trait QueueAction
{


    public function SendNotificationTime()
    {

        if (loadSetting('Notifications')->time && loadSetting('Notifications')->time > 0) {

            return now()->addMinutes(loadSetting('Notifications')->time);
        }

        return now();
    }

    public function sendQueuedNotification()
    {
      
        if (loadSetting('Notifications')->new_lead) {
            dispatch((new SendNotification($this->getEmailFromModelName(), $this))->delay($this->SendNotificationTime()));
        }
    }

    private function getEmailFromModelName()
    {
        return substr(get_class($this), strrpos(get_class($this), '/') + 11); // App\Models\Lead = Lead ....
    }
}
