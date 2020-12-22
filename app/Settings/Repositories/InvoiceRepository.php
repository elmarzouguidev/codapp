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

use App\Http\Requests\Settings\Invoice\InvoiceRequest;

use App\Settings\InvoiceSettings;
use App\Traits\UploadAble;

class InvoiceRepository
{

    use UploadAble;

    public function __construct(InvoiceSettings $settings, InvoiceRequest $request)
    {
        $settings->prefix = $request->input('prefix');

        if ($request->has('logo')) {
            $oldimage = $settings->logo;
            $image = $this->uploadOne($request->logo, 'invoices');
            $settings->logo = $image;
            $this->deleteOne($oldimage);
        }

        $settings->save();
    }
}
