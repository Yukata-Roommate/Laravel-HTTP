<?php

namespace YukataRm\Laravel\Http\Provider;

use Illuminate\Support\ServiceProvider;

use YukataRm\Laravel\Http\Facade\Manager;
use YukataRm\Laravel\Http\Facade\Http;

/**
 * Facade Service Provider
 * 
 * @package YukataRm\Laravel\Http\Provider
 */
class FacadeServiceProvider extends ServiceProvider
{
    /**
     * register Facade
     * 
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Http::class, function () {
            return new Manager();
        });
    }
}
