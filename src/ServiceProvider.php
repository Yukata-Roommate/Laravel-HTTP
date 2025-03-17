<?php

namespace YukataRm\Laravel\Http;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

use YukataRm\Laravel\Http\Facades\Http;
use YukataRm\Laravel\Http\Facades\Manager;

/**
 * Http Service Provider
 *
 * @package YukataRm\Laravel\Db
 */
class ServiceProvider extends BaseServiceProvider
{
    /*----------------------------------------*
     * Register
     *----------------------------------------*/

    /**
     * register
     *
     * @return void
     */
    public function register()
    {
        $this->registerFacade();
    }

    /**
     * register Facade
     *
     * @return void
     */
    protected function registerFacade()
    {
        $this->app->singleton(Http::class, function () {
            return new Manager();
        });
    }
}
