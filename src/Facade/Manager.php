<?php

namespace YukataRm\Laravel\Http\Facade;

use YukataRm\Laravel\Http\Interface\RequestInterface;
use YukataRm\Laravel\Http\Interface\ResponseInterface;
use YukataRm\Laravel\Http\Request\Request;

/**
 * Facade Manager
 * 
 * @package YukataRm\Laravel\Http\Facade
 */
class Manager
{
    /**
     * make Request instance
     *
     * @param string $method
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\RequestInterface
     */
    public function make(string $method, string $url, array $params = []): RequestInterface
    {
        return new Request($method, $url, $params);
    }

    /*----------------------------------------*
     * Make Request 
     *----------------------------------------*/

    /**
     * make GET Request instance
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\RequestInterface
     */
    public function getRequest(string $url, array $params = []): RequestInterface
    {
        return $this->make("get", $url, $params);
    }

    /**
     * make POST Request instance
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\RequestInterface
     */
    public function postRequest(string $url, array $params = []): RequestInterface
    {
        return $this->make("post", $url, $params);
    }

    /**
     * make PUT Request instance
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\RequestInterface
     */
    public function putRequest(string $url, array $params = []): RequestInterface
    {
        return $this->make("put", $url, $params);
    }

    /**
     * make DELETE Request instance
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\RequestInterface
     */
    public function deleteRequest(string $url, array $params = []): RequestInterface
    {
        return $this->make("delete", $url, $params);
    }

    /**
     * make HEAD Request instance
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\RequestInterface
     */
    public function headRequest(string $url, array $params = []): RequestInterface
    {
        return $this->make("head", $url, $params);
    }

    /**
     * make PATCH Request instance
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\RequestInterface
     */
    public function patchRequest(string $url, array $params = []): RequestInterface
    {
        return $this->make("patch", $url, $params);
    }

    /*----------------------------------------*
     * Send Request
     *----------------------------------------*/

    /**
     * send GET Request
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\ResponseInterface
     */
    public function get(string $url, array $params = []): ResponseInterface
    {
        return $this->getRequest($url, $params)->send();
    }

    /**
     * send POST Request
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\ResponseInterface
     */
    public function post(string $url, array $params = []): ResponseInterface
    {
        return $this->postRequest($url, $params)->send();
    }

    /**
     * send PUT Request
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\ResponseInterface
     */
    public function put(string $url, array $params = []): ResponseInterface
    {
        return $this->putRequest($url, $params)->send();
    }

    /**
     * send DELETE Request
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\ResponseInterface
     */
    public function delete(string $url, array $params = []): ResponseInterface
    {
        return $this->deleteRequest($url, $params)->send();
    }

    /**
     * send HEAD Request
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\ResponseInterface
     */
    public function head(string $url, array $params = []): ResponseInterface
    {
        return $this->headRequest($url, $params)->send();
    }

    /**
     * send PATCH Request
     *
     * @param string $url
     * @param array $params
     * @return \YukataRm\Laravel\Http\Interface\ResponseInterface
     */
    public function patch(string $url, array $params = []): ResponseInterface
    {
        return $this->patchRequest($url, $params)->send();
    }
}
