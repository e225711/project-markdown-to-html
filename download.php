<?php

spl_autoload_extensions(".php");
spl_autoload_register();
require_once 'vendor/autoload.php';

use ToHTML\ToHTML;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['text'])) {
    // ダウンロードするHTMLファイルの名前を決定（任意の名前で構いません）
    $filename = 'converted_html.html';

    // MarkdownをHTMLに変換
    $markdown_html = ToHTML::convertMarkdownToHTML($_POST['text']);

    header('Content-Type: text/html; charset=UTF-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // HTMLを出力してファイルとしてダウンロード
    echo $markdown_html;
    exit();
} else {
    // リクエストが不正な場合は400 Bad Requestを返す
    header('HTTP/1.1 400 Bad Request');
    echo 'Bad Request';
    exit();
}
