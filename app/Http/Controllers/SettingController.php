<?php

namespace App\Http\Controllers;

use App\Settings\EmailsSettings;
use App\Settings\GeneralSettings;
use App\Settings\WebHooksSettings;
use App\Settings\InvoiceSettings;
use App\Settings\LocalisationSettings;
use App\Settings\NotificationsSettings;
use App\Settings\Repositories\EmailsRepository;
use App\Settings\Repositories\GeneralRepository;
use App\Settings\Repositories\WebHooksRepository;
use App\Settings\Repositories\InvoiceRepository;
use App\Settings\Repositories\LocalisationRepository;
use App\Settings\Repositories\NotificationRepository;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        GeneralSettings $settings,
        LocalisationSettings $localisations,
        EmailsSettings $emails,
        InvoiceSettings $invoice,
        NotificationsSettings $notifications,
        WebHooksSettings $hooks

    ) {
        
        
        return view('theme_a.settings._normal.index', [
            'settings' => $settings,
            'localisations' => $localisations,
            'emails' => $emails,
            'invoice' => $invoice,
            'notifications' => $notifications,
            'hooks' => $hooks
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if ($request->has('general_setting') && $request->filled('general_setting')) {
            app(GeneralRepository::class);
            return redirect()->back();
        }
        if ($request->has('localisation_setting') && $request->filled('localisation_setting')) {

            app(LocalisationRepository::class);

            return redirect()->back();
        }
        if ($request->has('emails_setting') && $request->filled('emails_setting')) {

            app(EmailsRepository::class);
            return redirect()->back();
        }
        if ($request->has('invoice_setting') && $request->filled('invoice_setting')) {

            app(InvoiceRepository::class);
            return redirect()->back();
        }

        if ($request->has('notification_setting') && $request->filled('notification_setting')) {

            app(NotificationRepository::class);
            return redirect()->back();
        }

        if ($request->has('hooks_setting') && $request->filled('hooks_setting')) {

            app(WebHooksRepository::class);
            return redirect()->back();
        }
    }
}
