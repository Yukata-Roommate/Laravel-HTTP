<?php

namespace YukataRm\Laravel\Http\Enum;

/**
 * Bodyのフォーマットを表すEnum
 * 
 * @package YukataRm\Laravel\Http\Enum
 */
enum BodyFormatEnum: string
{
    case BODY      = "body";
    case JSON      = "json";
    case FORM      = "form_params";
    case MULTIPART = "multipart";
}
