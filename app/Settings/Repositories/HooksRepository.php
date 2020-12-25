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

use App\Http\Requests\Settings\Hooks\HooksRequest;

use App\Settings\HooksSettings;
use Illuminate\Support\Str;

class HooksRepository
{

    const SEPARATOR = '-';
    const SLASH = '/';

    public function __construct(HooksSettings $settings, HooksRequest $request)
    {

        $platform = $settings->platform;
        // $settings->name = $request->input('name');
        $settings->header = $request->input('header');
        $settings->secret = $request->input('secret');
        $settings->domain = $request->input('domain');
        if ($platform !== $request->input('platform')) {
            $settings->platform = $request->input('platform');
            $settings->route = $this->generateRoutes($request->platform);
        }

        $settings->validated = $request->input('validated');
        $settings->active = $request->input('active');
        $settings->save();
    }

    public function generateRoutes($name)
    {
        return  'hooker/'.Str::slug($name) . self::SEPARATOR . Str::uuid();
        // return Str::slug($name) .Str::random(40);

    }
}
