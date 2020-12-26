<?php

namespace App\Providers;

use App\Hooks\Headers\HeaderCheker;
use Illuminate\Support\ServiceProvider;

class HooksServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
     //  dd(loadSetting('WebHooks')->app_platform,'From here');
    
    }
}
