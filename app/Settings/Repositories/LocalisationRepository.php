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

use App\Http\Requests\Settings\Localisation\LocalisationRequest;
use App\Settings\LocalisationSettings;

class LocalisationRepository
{


    public function __construct(LocalisationSettings $settings, LocalisationRequest $request)
    {
        $settings->localisation_country = $request->input('localisation_country');
        $settings->localisation_timezone = $request->input('localisation_timezone');
        $settings->currency_code = $request->input('currency_code');
        $settings->currency_symbole = $request->input('currency_symbole');
        $settings->default_lng = $request->input('default_lng');
        $settings->save();
    }
}
