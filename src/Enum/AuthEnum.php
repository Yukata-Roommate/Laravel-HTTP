<?php

namespace YukataRm\Laravel\Http\Enum;

/**
 * Authorizationの種類を表すEnum
 * 
 * @package YukataRm\Laravel\Http\Enum
 */
enum AuthEnum: string
{
    case BASIC  = "basic";
    case DIGEST = "digest";
}
