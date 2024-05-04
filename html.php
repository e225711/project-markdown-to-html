<?php

spl_autoload_extensions(".php");
spl_autoload_register();
require_once 'vendor/autoload.php';

use ToHTML\ToHTML;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['text'])) {
    $markdown_html = ToHTML::convertMarkdownToHTML($_POST['text']);
    $escaped_html = htmlspecialchars($markdown_html);
    $escaped_html_with_br = nl2br($escaped_html);
    echo $escaped_html_with_br;
} else {
    header('HTTP/1.1 400 Bad Request');
    echo 'Bad Request';
}
