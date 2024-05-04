<?php

spl_autoload_extensions(".php");
spl_autoload_register();
require_once 'vendor/autoload.php';

use ToHTML\ToHTML;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['text'])) {
    echo ToHTML::convertMarkdownToHTML($_POST['text']);
} else {
    header('HTTP/1.1 400 Bad Request');
    echo 'Bad Request';
}
