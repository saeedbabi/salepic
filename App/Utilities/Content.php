<?php

namespace App\Utilities;

class Content
{
    public static function excerpt($content, $wordcount, $postfix = '...')
    {
        $word = explode(" ", $content, $wordcount);
        return implode(' ', array_slice($word, 0)) . $postfix;
    }
}
