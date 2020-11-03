<?php

namespace App\HtmlParser;

class Translate
{
    public static function decode(string $string): string
    {
        return htmlspecialchars_decode($string);
    }
}
