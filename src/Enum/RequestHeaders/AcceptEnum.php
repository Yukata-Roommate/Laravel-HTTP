<?php

namespace YukataRm\Laravel\Http\Enum\RequestHeaders;

/**
 * Acceptヘッダーの値を表すEnum
 * 
 * @package YukataRm\Laravel\Http\Enum\RequestHeaders
 */
enum AcceptEnum: string
{
    case JSON = "application/json";
    case FORM = "application/x-www-form-urlencoded";
    case HTML = "text/html";
}
