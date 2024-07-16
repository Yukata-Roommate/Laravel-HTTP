<?php

namespace YukataRm\Laravel\Http\Response;

use YukataRm\Laravel\Http\Response\Interface\ResponseInterface;

use Illuminate\Http\Client\Response as LaravelResponse;
use Illuminate\Support\Collection;

/**
 * HTTPレスポンスを表現するクラス
 * 
 * @package YukataRm\Laravel\Http\Response
 */
class Response implements ResponseInterface
{
    /**
     * LaravelのResponseインスタンス
     *
     * @var \Illuminate\Http\Client\Response
     */
    public readonly LaravelResponse $response;

    /**
     * コンストラクタ
     *
     * @param \Illuminate\Http\Client\Response $response
     * @return void
     */
    function __construct(LaravelResponse $response)
    {
        $this->response = $response;
    }

    /**
     * リクエストが成功したかどうかを取得する
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->response->successful();
    }

    /**
     * レスポンスのステータスコードを取得する
     *
     * @return int
     */
    public function statusCode(): int
    {
        return $this->response->status();
    }

    /**
     * レスポンスのヘッダーを取得する
     *
     * @return array
     */
    public function headers(): array
    {
        return $this->response->headers();
    }

    /**
     * レスポンスのボディを取得する
     *
     * @return mixed
     */
    public function body(): mixed
    {
        return $this->response->json();
    }

    /**
     * レスポンスのボディを文字列で取得する
     *
     * @return string
     */
    public function bodyAsString(): string
    {
        return $this->response->body();
    }

    /**
     * レスポンスのボディをオブジェクトで取得する
     *
     * @return mixed
     */
    public function bodyAsObject(): mixed
    {
        return $this->response->object();
    }

    /**
     * レスポンスのボディを配列で取得する
     *
     * @return \Illuminate\Support\Collection
     */
    public function bodyAsCollection(): Collection
    {
        return $this->response->collect();
    }

    /**
     * レスポンスの理由を取得する
     *
     * @return string
     */
    public function reason(): string
    {
        return $this->response->reason();
    }
}
