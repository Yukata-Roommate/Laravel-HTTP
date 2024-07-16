<?php

namespace YukataRm\Laravel\Http;

use Illuminate\Support\ServiceProvider as Provider;

use YukataRm\Laravel\Http\HttpManager;
use YukataRm\Laravel\Http\Facade\Http;

/**
 * ServiceProvider
 * Facadeの登録を行う
 * 
 * @package YukataRm\Laravel\Http
 */
class ServiceProvider extends Provider
{
    /**
     * アプリケーションの起動時に実行する
     * FacadeとManagerの紐づけを行う
     * 
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Http::class, function () {
            return new HttpManager();
        });
    }
}
