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
