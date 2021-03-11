<?php

/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 13/novembre/2020
 **/

return [

    'platform' => env('WEBHOOK_PLATFORM', 'woocommerce'),

    'header_signature'=> env('WEBHOOK_HEADER_SIGNATURE', 'x-wc-webhook-signature'),
];
