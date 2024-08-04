<?php

namespace YukataRm\Laravel\Http\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Http Facade
 * 
 * @package YukataRm\Laravel\Http\Facade
 * 
 * @method static \YukataRm\Laravel\Http\Interface\RequestInterface make(string $method, string $url, array $params)
 * 
 * @method static \YukataRm\Laravel\Http\Interface\RequestInterface getRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interface\RequestInterface postRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interface\RequestInterface putRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interface\RequestInterface deleteRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interface\RequestInterface headRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interface\RequestInterface patchRequest(string $url, array $params)
 * 
 * @method static \YukataRm\Laravel\Http\Interface\ResponseInterface get(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interface\ResponseInterface post(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interface\ResponseInterface put(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interface\ResponseInterface delete(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interface\ResponseInterface head(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Interface\ResponseInterface patch(string $url, array $params)
 * 
 * @see \YukataRm\Laravel\Http\Facade\Manager
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
