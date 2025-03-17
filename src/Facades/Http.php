<?php

namespace YukataRm\Laravel\Http\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Http Facade
 *
 * @package YukataRm\Laravel\Http\Facades
 *
 * @method static \YukataRm\Laravel\Http\Interfaces\RequestInterface make(string $method, string $url, array $params)
 *
 * @method static \YukataRm\Laravel\Http\Interfaces\RequestInterface getRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interfaces\RequestInterface postRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interfaces\RequestInterface putRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interfaces\RequestInterface deleteRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interfaces\RequestInterface headRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interfaces\RequestInterface patchRequest(string $url, array $params)
 *
 * @method static \YukataRm\Laravel\Http\Interfaces\ResponseInterface get(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interfaces\ResponseInterface post(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interfaces\ResponseInterface put(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interfaces\ResponseInterface delete(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interfaces\ResponseInterface head(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interfaces\ResponseInterface patch(string $url, array $params)
 *
 * @see \YukataRm\Laravel\Http\Facades\Manager
 */
class Http extends Facade
{
    /**
     * Facade Accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return static::class;
    }
}
