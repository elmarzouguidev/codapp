<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/theadmin';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {

        $this->setPatterns();
        $this->configureRateLimiting();

        $this->routes(function () {

            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            /*** mapping login routes ***/
            Route::middleware('web')
                ->namespace($this->getNameSpace())
                ->group(base_path('routes/login.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix(env('ADMIN_DASH_PREFIX') ?? config('haymacproduction.ADMIN_DASH_PREFIX'))
                ->middleware('web')
                ->namespace($this->namespace)
                ->as('admin.')
                ->group(base_path('routes/adminRoutes.php'));

            Route::prefix(env('DILEVERY_DASH_PREFIX') ?? config('haymacproduction.DILEVERY_DASH_PREFIX'))
                ->middleware('web')
                ->namespace($this->namespace)
                ->as('delivery.')
                ->group(base_path('routes/deliveryRoutes.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }

    protected function setPatterns()
    {

        Route::pattern('id', '[0-9]+');
        Route::pattern('slug', '[a-z0-9-]+');
    }

    private function getNameSpace()
    {
        if (request()->is(env('ADMIN_DASH_PREFIX') . '/login')) {

            return $this->namespace . '\Admin\Auth';
        }
    }
}
