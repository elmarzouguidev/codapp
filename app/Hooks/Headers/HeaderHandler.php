<?php

/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 11/décembre/2020
 **/

namespace App\Hooks\Headers;


class HeaderHandler extends HeaderCheker
{

    public static function headerName()
    {
        return  app(HeaderCheker::class)->getHeader();
    }
}
