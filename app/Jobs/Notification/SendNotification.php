<?php

namespace App\Jobs\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $abstract;
    protected $model;

    public function __construct($abstract, $model)
    {
        $this->abstract = $abstract;
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (loadSetting('Notifications')->email_to_send !== null) {
            Mail::to(loadSetting('Notifications')->email_to_send)->send($this->callEmail());
        }
    }

    private function callEmail()
    {
        $mail = "App\\Mail\\Notification\\"  . 'New' . $this->abstract; // newAdmin or NewLead founded in Mail/Notification/

        return  new $mail($this->model);
    }
}
