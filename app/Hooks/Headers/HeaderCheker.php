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


class HeaderCheker  implements HeaderChekerInterface
{

    protected $headerName;

    public function __construct()
    {
        $this->setHeader(config('Hooks.platform'));
    }

    /**
     * x-wc-webhook-signature
     * elementor-signature
     */
    public function setHeader($header)
    {
        switch ($header) {
            case 'woocommerce':
                $this->headerName =  'x-wc-webhook-signature';
                break;
            case 'shopify':
                $this->headerName =  'X-Shopify-Hmac-Sha256';
                break;
            case 'elementor':
                $this->headerName =  'elementor-signature';
                break;
            default:
                $this->headerName =  'appwebhook';
        }
      //  $this->headerName = $header;
    }

    public function getHeader()
    {
        return $this->headerName;
    }
}
