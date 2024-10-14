<?php
$category = $match['catSlug'];
$query = "SELECT content  
FROM posts LEFT JOIN categories 
    ON categories.id = posts.id_category
WHERE categories.slug = '$category'";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
for($date= []; $row = mysqli_fetch_assoc($res); $date[] = $row['content']);
$content = '';
foreach($date as $item){
    $content .='<div>' . $item . '</div>' . '<br>';
}

$content .= '<form method="post" action="/' . $category . '">
                <label for="name">Напиши свой пост: </label>
                <input name = "text" type="text" style="width:1000px;">
                <input type="submit">
            </form>';

if (!empty($_POST['text'])) {
    $new_post = $_POST['text'];
    $query = "SELECT id as id_cat from categories WHERE slug = '$category'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $id_cat = mysqli_fetch_assoc($res);
    $query = "INSERT INTO posts (content, id_category) VALUES ('$new_post', '$id_cat[id_cat]')";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    header('Location:/' . $category);
}