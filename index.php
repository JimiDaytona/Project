<?php
require 'connect.php';
$link = connect();
$url = $_SERVER['REQUEST_URI'];

$rout = '^/(?<catSlug>[a-z0-9_-]+)$';
if (preg_match("#$rout#", $url, $match)) {
    $page = include './view/show.php';
}

$rout = '^/$';
if (preg_match("#$rout#", $url, $match)) {
    $page = include './view/all.php';
}

$layout = file_get_contents('layout.php');
//$layout = str_replace('{{ title }}', $slug, $layout);
$layout = str_replace('{{ content }}', $content, $layout);
echo $layout;
?>