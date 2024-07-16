<?php

namespace YukataRm\Laravel\Http\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * HttpのFacade
 * HttpManagerのMethodをstaticに呼び出せるようにする
 * 
 * @package YukataRm\Laravel\Http\Facade
 * 
 * @method static \YukataRm\Laravel\Http\Request\Interface\RequestInterface make(\YukataRm\Laravel\Http\Enum\MethodEnum $method, string $url, array $params)
 * 
 * @method static \YukataRm\Laravel\Http\Request\Interface\RequestInterface getRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Request\Interface\RequestInterface postRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Request\Interface\RequestInterface putRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Request\Interface\RequestInterface deleteRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Request\Interface\RequestInterface headRequest(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Request\Interface\RequestInterface patchRequest(string $url, array $params)
 * 
 * @method static \YukataRm\Laravel\Http\Response\Interface\ResponseInterface get(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Response\Interface\ResponseInterface post(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Response\Interface\ResponseInterface put(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Response\Interface\ResponseInterface delete(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Response\Interface\ResponseInterface head(string $url, array $params)
 * @method static \YukataRm\Laravel\Http\Response\Interface\ResponseInterface patch(string $url, array $params)
 * 
 * @see \YukataRm\Laravel\Http\Interface\ManagerInterface
 */
class Http extends Facade
{
    /** 
     * HttpManagerにアクセスするためのFacadeの名前を取得する
     * 
     * @return string 
     */
    protected static function getFacadeAccessor(): string
    {
        return static::class;
    }
}
