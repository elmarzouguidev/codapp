<?php

namespace App\Traits;

use Illuminate\Support\Facades\Gate;

trait Permission
{

    public function checkPermission($action, $item): bool
    {
        $response = Gate::inspect($action, $item);
        
        if (!$response->allowed()) {
            $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => $response->message()
                ]
            );
            return false;
        }
        return true;
    }
}
