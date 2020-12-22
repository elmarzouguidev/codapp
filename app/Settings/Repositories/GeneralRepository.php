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

use App\Http\Requests\Settings\General\GeneralRequest;
use App\Settings\GeneralSettings;

class GeneralRepository
{


    public function __construct(GeneralSettings $settings, GeneralRequest $request)
    {
     //  dd('Oui generale');

        $settings->app_name = $request->input('app_name');
        $settings->ceo = $request->input('ceo');
        $settings->mobile = $request->input('mobile');
        $settings->address = $request->input('address');
        $settings->email = $request->input('email');
        $settings->website = $request->input('website');
        $settings->country = $request->input('country');
        $settings->city = $request->input('city');
        $settings->code_postale = $request->input('code_postale');
        // $settings->site_active = $request->boolean('site_active');
        $settings->save();
       
    }
}
