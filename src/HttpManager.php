<?php

namespace YukataRm\Laravel\Http;

use YukataRm\Laravel\Http\Interface\ManagerInterface;

use YukataRm\Laravel\Http\Request\Request;
use YukataRm\Laravel\Http\Response\Response;

use YukataRm\Laravel\Http\Enum\MethodEnum;

/**
 * Facadeを経由してstaticにアクセスされるManager
 * 
 * @package YukataRm\Laravel\Http
 */
class HttpManager implements ManagerInterface
{
    /**
     * Requestのインスタンスを生成する
     *
     * @param \YukataRm\Laravel\Http\Enum\MethodEnum $method
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Request
     */
    public function make(MethodEnum $method, string $url, array $params = []): Request
    {
        return new Request($method, $url, $params);
    }

    /*----------------------------------------*
     * Make Request 
     *----------------------------------------*/

    /**
     * GETリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Request
     */
    public function getRequest(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::GET, $url, $params);
    }

    /**
     * POSTリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Request
     */
    public function postRequest(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::POST, $url, $params);
    }

    /**
     * PUTリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Request
     */
    public function putRequest(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::PUT, $url, $params);
    }

    /**
     * DELETEリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Request
     */
    public function deleteRequest(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::DELETE, $url, $params);
    }

    /**
     * HEADリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Request
     */
    public function headRequest(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::HEAD, $url, $params);
    }

    /**
     * PATCHリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Request\Request
     */
    public function patchRequest(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::PATCH, $url, $params);
    }

    /*----------------------------------------*
     * Send Request
     *----------------------------------------*/

    /**
     * GETリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Response
     */
    public function get(string $url, array $params = []): Response
    {
        return $this->getRequest($url, $params)->send();
    }

    /**
     * POSTリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Response
     */
    public function post(string $url, array $params = []): Response
    {
        return $this->postRequest($url, $params)->send();
    }

    /**
     * PUTリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Response
     */
    public function put(string $url, array $params = []): Response
    {
        return $this->putRequest($url, $params)->send();
    }

    /**
     * DELETEリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Response
     */
    public function delete(string $url, array $params = []): Response
    {
        return $this->deleteRequest($url, $params)->send();
    }

    /**
     * HEADリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Response
     */
    public function head(string $url, array $params = []): Response
    {
        return $this->headRequest($url, $params)->send();
    }

    /**
     * PATCHリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Response\Response
     */
    public function patch(string $url, array $params = []): Response
    {
        return $this->patchRequest($url, $params)->send();
    }
}
