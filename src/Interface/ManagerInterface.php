<?php

namespace YukataRm\Laravel\Http\Interface;

use YukataRm\Laravel\Http\Request\Interface\RequestInterface;
use YukataRm\Laravel\Http\Response\Interface\ResponseInterface;

use YukataRm\Laravel\Http\Enum\MethodEnum;

/**
 * YukataRm\Laravel\HttpのManagerのInterface
 * 
 * @package YukataRm\Laravel\Http\Interface
 */
interface ManagerInterface
{
    /**
     * Requestのインスタンスを生成する
     *
     * @param \YukataRm\Laravel\Http\Enum\MethodEnum $method
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Interface\RequestInterface
     */
    public function make(MethodEnum $method, string $url, array $params): RequestInterface;

    /*----------------------------------------*
     * Make Request 
     *----------------------------------------*/

    /**
     * GETリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Interface\RequestInterface
     */
    public function getRequest(string $url, array $params): RequestInterface;

    /**
     * POSTリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Interface\RequestInterface
     */
    public function postRequest(string $url, array $params): RequestInterface;

    /**
     * PUTリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Interface\RequestInterface
     */
    public function putRequest(string $url, array $params): RequestInterface;

    /**
     * DELETEリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Interface\RequestInterface
     */
    public function deleteRequest(string $url, array $params): RequestInterface;

    /**
     * HEADリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Interface\RequestInterface
     */
    public function headRequest(string $url, array $params): RequestInterface;

    /**
     * PATCHリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Interface\RequestInterface
     */
    public function patchRequest(string $url, array $params): RequestInterface;

    /*----------------------------------------*
     * Send Request
     *----------------------------------------*/

    /**
     * GETリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Interface\ResponseInterface
     */
    public function get(string $url, array $params): ResponseInterface;

    /**
     * POSTリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Interface\ResponseInterface
     */
    public function post(string $url, array $params): ResponseInterface;

    /**
     * PUTリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Interface\ResponseInterface
     */
    public function put(string $url, array $params): ResponseInterface;

    /**
     * DELETEリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Interface\ResponseInterface
     */
    public function delete(string $url, array $params): ResponseInterface;

    /**
     * HEADリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Interface\ResponseInterface
     */
    public function head(string $url, array $params): ResponseInterface;

    /**
     * PATCHリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Interface\ResponseInterface
     */
    public function patch(string $url, array $params): ResponseInterface;
}
