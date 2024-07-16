<?php

namespace YukataRm\Laravel\Http\Request;

use YukataRm\Laravel\Http\Request\Interface\RequestInterface;

use YukataRm\Laravel\Http\Response\Response;
use YukataRm\Laravel\Http\Enum\MethodEnum;
use YukataRm\Laravel\Http\Enum\AuthEnum;
use YukataRm\Laravel\Http\Enum\BodyFormatEnum;
use YukataRm\Laravel\Http\Enum\RequestHeadersEnum;
use YukataRm\Laravel\Http\Enum\RequestHeaders\AcceptEnum;
use YukataRm\Laravel\Http\Enum\RequestHeaders\TokenTypeEnum;
use YukataRm\Laravel\Http\Enum\RequestHeaders\ContentTypeEnum;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

/**
 * HTTPリクエストを表現するクラス
 * 
 * @package YukataRm\Laravel\Http\Request
 */
class Request implements RequestInterface
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * リクエスト先のURL
     *
     * @var string
     */
    public readonly string $url;

    /**
     * リクエストパラメータ
     *
     * @var array
     */
    public readonly array $params;

    /**
     * リクエストのHTTPメソッド
     *
     * @var \YukataRm\Laravel\Http\Enum\MethodEnum
     */
    public readonly MethodEnum $method;

    /**
     * コンストラクタ
     *
     * @param \YukataRm\Laravel\Http\Enum\MethodEnum $method
     * @param string $url
     * @param array $params
     * @return void
     */
    function __construct(MethodEnum $method, string $url, array $params)
    {
        $this->method = $method;
        $this->url    = $url;
        $this->params = $params;
    }

    /*----------------------------------------*
     * Send Request
     *----------------------------------------*/

    /**
     * リクエストを送信する
     *
     * @return \YukataRm\Laravel\Http\Response\Response
     */
    public function send(): Response
    {
        $request = Http::asJson();

        $request = $this->withAuth($request);

        $request = $this->withBodyFormat($request);

        $request = $this->withRequestHeaders($request);

        $request = $this->withTimeout($request);

        $request = $this->withConnectTimeout($request);

        $request = $this->withRetry($request);

        $request = $this->withMaxRedirects($request);

        $request = $this->withWithoutRedirecting($request);

        $request = $this->withWithoutVerifying($request);

        $response = match ($this->method) {
            MethodEnum::GET    => $request->get($this->url, $this->params),
            MethodEnum::POST   => $request->post($this->url, $this->params),
            MethodEnum::PUT    => $request->put($this->url, $this->params),
            MethodEnum::DELETE => $request->delete($this->url, $this->params),
            MethodEnum::HEAD   => $request->head($this->url, $this->params),
            MethodEnum::PATCH  => $request->patch($this->url, $this->params),
        };

        return new Response($response);
    }

    /*----------------------------------------*
     * Auth
     *----------------------------------------*/

    /**
     * 認証方式
     *
     * @var \YukataRm\Laravel\Http\Enum\AuthEnum|null
     */
    private AuthEnum|null $auth   = null;

    /**
     * 認証に使用するユーザー名
     *
     * @var string|null
     */
    private ?string $userName = null;

    /**
     * 認証に使用するパスワード
     *
     * @var string|null
     */
    private ?string $password = null;

    /**
     * 認証情報を付与する
     *
     * @param \Illuminate\Http\Client\PendingRequest $request
     * @return \Illuminate\Http\Client\PendingRequest
     */
    private function withAuth(PendingRequest $request): PendingRequest
    {
        return match ($this->auth) {
            AuthEnum::BASIC  => $request->withBasicAuth($this->userName, $this->password),
            AuthEnum::DIGEST => $request->withDigestAuth($this->userName, $this->password),

            default => $request,
        };
    }

    /**
     * 認証情報を指定する
     *
     * @param \YukataRm\Laravel\Http\Enum\AuthEnum $auth
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function auth(AuthEnum $auth, string $userName, string $password): static
    {
        $this->auth     = $auth;
        $this->userName = $userName;
        $this->password = $password;

        return $this;
    }

    /**
     * BASIC認証を行う
     *
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function basicAuth(string $userName, string $password): static
    {
        return $this->auth(AuthEnum::BASIC, $userName, $password);
    }

    /**
     * DIGEST認証を行う
     *
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function digestAuth(string $userName, string $password): static
    {
        return $this->auth(AuthEnum::DIGEST, $userName, $password);
    }

    /*----------------------------------------*
     * Body Format
     *----------------------------------------*/

    /**
     * リクエストボディのフォーマット
     *
     * @var string|null
     */
    private ?string $bodyFormat = null;

    /**
     * リクエストボディのフォーマットを付与する
     *
     * @param \Illuminate\Http\Client\PendingRequest $request
     * @return \Illuminate\Http\Client\PendingRequest
     */
    private function withBodyFormat(PendingRequest $request): PendingRequest
    {
        return is_null($this->bodyFormat) ? $request : $request->bodyFormat($this->bodyFormat);
    }

    /**
     * リクエストボディのフォーマットを指定する
     *
     * @param \YukataRm\Laravel\Http\Enum\BodyFormatEnum $bodyFormat
     * @return static
     */
    public function bodyFormat(BodyFormatEnum|string $bodyFormat): static
    {
        $this->bodyFormat = $bodyFormat instanceof BodyFormatEnum ? $bodyFormat->value : $bodyFormat;

        return $this;
    }

    /**
     * リクエストボディのフォーマットをBODYに指定する
     *
     * @return static
     */
    public function asBody(): static
    {
        return $this->bodyFormat(BodyFormatEnum::BODY);
    }

    /**
     * リクエストボディのフォーマットをJSONに指定する
     *
     * @return static
     */
    public function asJson(): static
    {
        return $this->bodyFormat(BodyFormatEnum::JSON);
    }

    /**
     * リクエストボディのフォーマットをFORMに指定する
     *
     * @return static
     */
    public function asForm(): static
    {
        return $this->bodyFormat(BodyFormatEnum::FORM);
    }

    /**
     * リクエストボディのフォーマットをMULTIPARTに指定する
     *
     * @return static
     */
    public function asMultipart(): static
    {
        return $this->bodyFormat(BodyFormatEnum::MULTIPART);
    }

    /*----------------------------------------*
     * Request Headers
     *----------------------------------------*/

    /**
     * リクエストヘッダー
     *
     * @var array
     */
    private array $requestHeaders = [];

    /**
     * リクエストヘッダーを付与する
     *
     * @param \Illuminate\Http\Client\PendingRequest $request
     * @return \Illuminate\Http\Client\PendingRequest
     */
    private function withRequestHeaders(PendingRequest $request): PendingRequest
    {
        return empty($this->requestHeaders) ? $request : $request->withHeaders($this->requestHeaders);
    }

    /**
     * リクエストヘッダーの配列を指定する
     *
     * @param array $requestHeaders
     * @return static
     */
    public function requestHeaders(array $requestHeaders): static
    {
        $this->requestHeaders = array_merge_recursive($this->requestHeaders, $requestHeaders);

        return $this;
    }

    /**
     * リクエストヘッダーを指定する
     *
     * @param \YukataRm\Laravel\Http\Enum\RequestHeadersEnum $key
     * @param string $value
     * @return static
     */
    public function requestHeader(RequestHeadersEnum|string $key, string $value): static
    {
        if ($key instanceof RequestHeadersEnum) $key = $key->value;

        return $this->requestHeaders([$key => $value]);
    }

    /**
     * リクエストヘッダーのAcceptを指定する
     *
     * @param \YukataRm\Laravel\Http\Enum\RequestHeaders\AcceptEnum $accept
     * @return static
     */
    public function accept(AcceptEnum|string $accept): static
    {
        if ($accept instanceof AcceptEnum) $accept = $accept->value;

        return $this->requestHeader(RequestHeadersEnum::ACCEPT, $accept);
    }

    /**
     * リクエストヘッダーのAcceptをJSONに指定する
     *
     * @return static
     */
    public function acceptJson(): static
    {
        return $this->accept(AcceptEnum::JSON);
    }

    /**
     * リクエストヘッダーのAcceptをFORMに指定する
     *
     * @return static
     */
    public function acceptForm(): static
    {
        return $this->accept(AcceptEnum::FORM);
    }

    /**
     * リクエストヘッダーのAcceptをHTMLに指定する
     *
     * @return static
     */
    public function acceptHtml(): static
    {
        return $this->accept(AcceptEnum::HTML);
    }

    /**
     * リクエストヘッダーのAuthorizationを指定する
     *
     * @param \YukataRm\Laravel\Http\Enum\RequestHeaders\TokenTypeEnum $tokenType
     * @param string $token
     * @return static
     */
    public function token(TokenTypeEnum|string $tokenType, string $token): static
    {
        if ($tokenType instanceof TokenTypeEnum) $tokenType = $tokenType->value;

        return $this->requestHeader(RequestHeadersEnum::AUTHORIZATION, trim($tokenType . " " . $token));
    }

    /**
     * リクエストヘッダーのAuthorizationをBearerに指定する
     *
     * @param string $token
     * @return static
     */
    public function bearerToken(string $token): static
    {
        return $this->token(TokenTypeEnum::BEARER, $token);
    }

    /**
     * リクエストヘッダーのContent-Typeを指定する
     *
     * @param \YukataRm\Laravel\Http\Enum\ContentTypeEnum $contentType
     * @return static
     */
    public function contentType(ContentTypeEnum|string $contentType): static
    {
        if ($contentType instanceof ContentTypeEnum) $contentType = $contentType->value;

        return $this->requestHeader(RequestHeadersEnum::CONTENT_TYPE, $contentType);
    }

    /**
     * リクエストヘッダーのContent-TypeをJSONに指定する
     *
     * @return static
     */
    public function contentTypeJson(): static
    {
        return $this->contentType(ContentTypeEnum::JSON);
    }

    /**
     * リクエストヘッダーのContent-TypeをFORMに指定する
     *
     * @return static
     */
    public function contentTypeForm(): static
    {
        return $this->contentType(ContentTypeEnum::FORM);
    }

    /**
     * リクエストヘッダーのContent-TypeをHTMLに指定する
     *
     * @return static
     */
    public function contentTypeHtml(): static
    {
        return $this->contentType(ContentTypeEnum::HTML);
    }

    /*----------------------------------------*
     * Timeout
     *----------------------------------------*/

    /**
     * リクエストのタイムアウト時間
     *
     * @var int|null
     */
    private ?int $timeout = null;

    /**
     * リクエストのコネクトタイムアウト時間
     *
     * @var int|null
     */
    private ?int $connectTimeout = null;

    /**
     * リクエストのタイムアウト時間を付与する
     *
     * @param \Illuminate\Http\Client\PendingRequest $request
     * @return \Illuminate\Http\Client\PendingRequest
     */
    private function withTimeout(PendingRequest $request): PendingRequest
    {
        return is_null($this->timeout) ? $request : $request->timeout($this->timeout);
    }

    /**
     * リクエストのタイムアウト時間を指定する
     *
     * @param int $seconds
     * @return static
     */
    public function timeout(int $seconds = 30): static
    {
        $this->timeout = $seconds;
        return $this;
    }

    /**
     * リクエストのコネクトタイムアウト時間を付与する
     *
     * @param \Illuminate\Http\Client\PendingRequest $request
     * @return \Illuminate\Http\Client\PendingRequest
     */
    private function withConnectTimeout(PendingRequest $request): PendingRequest
    {
        return is_null($this->connectTimeout) ? $request : $request->connectTimeout($this->connectTimeout);
    }

    /**
     * リクエストのコネクトタイムアウト時間を指定する
     *
     * @param int $seconds
     * @return static
     */
    public function connectTimeout(int $seconds = 10): static
    {
        $this->connectTimeout = $seconds;
        return $this;
    }

    /*----------------------------------------*
     * Retry
     *----------------------------------------*/

    /**
     * リトライ回数
     *
     * @var int|null
     */
    private ?int $retryTimes = null;

    /**
     * リトライ間隔
     *
     * @var int|null
     */
    private ?int $retrySleeps = null;

    /**
     * リトライ条件
     *
     * @var \Closure|null
     */
    private ?\Closure $retryWhen = null;

    /**
     * リトライ情報を付与する
     *
     * @param \Illuminate\Http\Client\PendingRequest $request
     * @return \Illuminate\Http\Client\PendingRequest
     */
    private function withRetry(PendingRequest $request): PendingRequest
    {
        if (is_null($this->retryTimes)) return $request;
        if (is_null($this->retrySleeps)) return $request;
        if (is_null($this->retryWhen)) return $request;

        return $request->retry($this->retryTimes, $this->retrySleeps, $this->retryWhen);
    }

    /**
     * リトライ情報を指定する
     *
     * @param int $times
     * @param int $sleepMilliseconds
     * @param \Closure $when
     * @return static
     */
    public function retry(int $times, int $sleepMilliseconds = 0, \Closure $when = null): static
    {
        $this->retryTimes  = $times;
        $this->retrySleeps = $sleepMilliseconds;
        $this->retryWhen   = $when;

        return $this;
    }

    /*----------------------------------------*
     * Redirect
     *----------------------------------------*/

    /**
     * リダイレクトの最大回数
     *
     * @var int|null
     */
    private ?int $maxRedirects = null;

    /**
     * リダイレクトを行うかどうか
     *
     * @var bool
     */
    private bool $withoutRedirecting = false;

    /**
     * リダイレクトの最大回数を付与する
     *
     * @param \Illuminate\Http\Client\PendingRequest $request
     * @return \Illuminate\Http\Client\PendingRequest
     */
    private function withMaxRedirects(PendingRequest $request): PendingRequest
    {
        return is_null($this->maxRedirects) ? $request : $request->maxRedirects($this->maxRedirects);
    }

    /**
     * リダイレクトの最大回数を指定する
     *
     * @param int $maxRedirects
     * @return static
     */
    public function maxRedirects(int $maxRedirects): static
    {
        $this->maxRedirects = $maxRedirects;

        return $this;
    }

    /**
     * リダイレクトを行うかどうかを付与する
     *
     * @param \Illuminate\Http\Client\PendingRequest $request
     * @return \Illuminate\Http\Client\PendingRequest
     */
    private function withWithoutRedirecting(PendingRequest $request): PendingRequest
    {
        return $this->withoutRedirecting ? $request->withoutRedirecting() : $request;
    }

    /**
     * リダイレクトを行うかどうかを指定する
     *
     * @param bool $withoutRedirecting
     * @return static
     */
    public function withoutRedirecting($withoutRedirecting = true): static
    {
        $this->withoutRedirecting = $withoutRedirecting;

        return $this;
    }

    /*----------------------------------------*
     * Verify
     *----------------------------------------*/

    /**
     * 証明書の検証を行うかどうか
     *
     * @var bool
     */
    private bool $withoutVerifying = false;

    /**
     * 証明書の検証を行うかどうかを付与する
     *
     * @param \Illuminate\Http\Client\PendingRequest $request
     * @return \Illuminate\Http\Client\PendingRequest
     */
    private function withWithoutVerifying(PendingRequest $request): PendingRequest
    {
        return $this->withoutVerifying ? $request->withoutVerifying() : $request;
    }

    /**
     * 証明書の検証を行うかどうかを指定する
     *
     * @param bool $withoutVerifying
     * @return static
     */
    public function withoutVerifying($withoutVerifying = true): static
    {
        $this->withoutVerifying = $withoutVerifying;

        return $this;
    }
}
