<?php

namespace YukataRm\Laravel\Http\Provider;

use YukataRm\Laravel\Provider\FacadeServiceProvider as BaseServiceProvider;

use YukataRm\Laravel\Http\Facade\Manager;
use YukataRm\Laravel\Http\Facade\Http;

/**
 * Facade Service Provider
 * 
 * @package YukataRm\Laravel\Http\Provider
 */
class FacadeServiceProvider extends BaseServiceProvider
{
    /**
     * get facades
     * 
     * @return array<string, string>
     */
    protected function facades(): array
    {
        return [
            Http::class => Manager::class
        ];
    }
}
