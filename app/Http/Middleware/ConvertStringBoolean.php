<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TransformsRequest;

class ConvertStringBoolean extends TransformsRequest
{
    /**
     * Transform the given value.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    protected function transform($key, $value)
    {

       /* if ($value === 'true' || $value === 'TRUE' || $value === 'ON' || $value === 'on') {

            return true;
        }*/
        if ($value === 'ON' || $value === 'on') {

            return true;
        }

        if ($value === 'false' || $value === 'FALSE') {
            return false;
        }

        return $value;
    }
}
