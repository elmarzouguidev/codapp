<?php

namespace App\Http\Livewire\Lead;

use Illuminate\Support\Facades\Gate;

trait Permission
{


    public function checkPermission($action, $item): bool
    {
        $response = Gate::inspect($action, $item);
        if (!$response->allowed()) {
            // dd('Sorry no allowed');
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
