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

use App\Settings\WebHooksSettings;

use Illuminate\Support\Str;

class WebHooksRepository
{

    const SEPARATOR = '-';

    const SLASH = '/';

    const PREFIX = 'appwebhook';

    public function __construct(WebHooksSettings $settings, HooksRequest $request)
    {

        $platform = $settings->app_platform;
        // $settings->name = $request->input('name');
        $settings->header = $request->input('header');
        $settings->secret = $request->input('secret');
        $settings->domain = $request->input('domain');
        if ($platform !== $request->input('platform')) {

            $settings->app_platform = $request->input('platform');

            $settings->route = $this->generateRoutes($request->platform);
        }

        $settings->validated = $request->input('validated');
        $settings->active = $request->input('active');
        $settings->save();
    }

    public function generateRoutes($name)
    {
        return  self::PREFIX . self::SLASH . Str::slug($name) . self::SEPARATOR . Str::uuid();
    }
}
