<?php


/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 13/décembre/2020
 **/


function getImagePath()
{
    return asset('storage/') . '/';
}


function loadSetting($abstract)
{
    return app('App\Settings\\' . $abstract . 'Settings');
}

function getDomainName()
{
    return request()->getSchemeAndHttpHost();
}


function setEnv($name, $value)
{
    $path = base_path('.env');
    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            $name . '=' . env($name),
            $name . '=' . $value,
            file_get_contents($path)
        ));
    }
}
