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

use App\Http\Requests\Settings\Emails\EmailsRequest;
use App\Settings\EmailsSettings;

class EmailsRepository
{

    public function __construct(EmailsSettings $settings, EmailsRequest $request)
    {
        $settings->from_address = $request->input('from_address');
        $settings->from_name = $request->input('from_name');
        $settings->smtp_host = $request->input('smtp_host');
        $settings->smtp_user = $request->input('smtp_user');
        $settings->smtp_pass = $request->input('smtp_pass');
        $settings->smtp_port = $request->input('smtp_port');
        $settings->smtp_security = $request->input('smtp_security');
        $settings->smtp_auth_domain = $request->input('smtp_auth_domain');
        $settings->save();
    }
}
