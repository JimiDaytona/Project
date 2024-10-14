<?php

$query = "SELECT category, slug FROM categories";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
for ($date = []; $row = mysqli_fetch_assoc($res); $date[] = $row) ;
$content = '';
foreach ($date as $item) {
    $content .= '<div>' . '<a href=/' . $item['slug'] . '>' . $item['category'] . '</a>' . '</div>' . '<br>';
}
