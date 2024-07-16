<?php

namespace YukataRm\Laravel\Http\Response\Interface;

use Illuminate\Support\Collection;

/**
 * ResponseのInterface
 * 
 * @package YukataRm\Laravel\Http\Response\Interface
 */
interface ResponseInterface
{
    /**
     * リクエストが成功したかどうかを取得する
     *
     * @return bool
     */
    public function isSuccess(): bool;

    /**
     * レスポンスのステータスコードを取得する
     *
     * @return int
     */
    public function statusCode(): int;

    /**
     * レスポンスのヘッダーを取得する
     *
     * @return array
     */
    public function headers(): array;

    /**
     * レスポンスのボディを取得する
     *
     * @return mixed
     */
    public function body(): mixed;

    /**
     * レスポンスのボディを文字列で取得する
     *
     * @return string
     */
    public function bodyAsString(): string;

    /**
     * レスポンスのボディをオブジェクトで取得する
     *
     * @return mixed
     */
    public function bodyAsObject(): mixed;

    /**
     * レスポンスのボディを配列で取得する
     *
     * @return \Illuminate\Support\Collection
     */
    public function bodyAsCollection(): Collection;

    /**
     * レスポンスの理由を取得する
     *
     * @return string
     */
    public function reason(): string;
}
