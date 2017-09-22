<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your default and User controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * This namespace is applied to your API controller routes.
     *
     * @var string
     */
    protected $apiNamespace = 'App\Http\Controllers\Api';

    /**
     * This namespace is applied to your Admin controller routes.
     *
     * @var string
     */
    protected $adminNamespace = 'App\Http\Controllers\Admin';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapWebAdminRoutes();

        $this->mapWebUserRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the admin "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebAdminRoutes()
    {
        Route::prefix('admin')
            ->middleware('web')
            ->as('admin.')
            ->namespace($this->adminNamespace)
            ->group(base_path('routes/web-admin.php'));
    }

    /**
     * Define the user "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebUserRoutes()
    {
        Route::prefix('user')
            ->middleware('web')
            ->as('user.')
            ->namespace($this->namespace)
            ->group(base_path('routes/web-user.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        // TODO:  Work on this
        /**
         * foreach (glob("routes/api-*.php") as $filename) {
         * Route::prefix('api')
         * ->middleware('api')
         * ->as('api.' . substr($filename, 11, 2) . '.')
         * ->namespace($this->apiNamespace)
         * ->group(base_path($filename));
         * }
         **/

        Route::prefix('api')
            ->middleware('api')
            ->as('api.')
            ->namespace($this->namespace . "\Api")
            ->group(base_path('routes/api-v1.php'));
    }
}
