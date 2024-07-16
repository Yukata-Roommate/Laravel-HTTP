<?php

namespace YukataRm\Laravel\Http\Enum;

/**
 * Request Headersのキーを表すEnum
 * 
 * @package YukataRm\Laravel\Http\Enum
 */
enum RequestHeadersEnum: string
{
    case ACCEPT        = "Accept";
    case AUTHORIZATION = "Authorization";
    case CONTENT_TYPE  = "Content-Type";
}
