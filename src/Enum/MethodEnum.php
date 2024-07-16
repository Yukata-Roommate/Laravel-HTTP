<?php

namespace YukataRm\Laravel\Http\Enum;

/**
 * HTTPメソッドを表すEnum
 * 
 * @package YukataRm\Laravel\Http\Enum
 */
enum MethodEnum: string
{
    case GET    = "get";
    case POST   = "post";
    case PUT    = "put";
    case DELETE = "delete";
    case HEAD   = "head";
    case PATCH  = "patch";
}
