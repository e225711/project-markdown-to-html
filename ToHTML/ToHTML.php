<?php

namespace ToHTML;

spl_autoload_extensions(".php");
spl_autoload_register();
require_once 'vendor/autoload.php';

class ToHTML
{
    public static function convertMarkdownToHTML($markdownText)
    {
        $Parsedown = new \Parsedown();
        return $Parsedown->text($markdownText);
    }
}
