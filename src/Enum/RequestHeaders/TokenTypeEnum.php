<?php

namespace YukataRm\Laravel\Http\Enum\RequestHeaders;

/**
 * Authorizationヘッダーの値を表すEnum
 * 
 * @package YukataRm\Laravel\Http\Enum\RequestHeaders
 */
enum TokenTypeEnum: string
{
    case BEARER = "Bearer";
}
