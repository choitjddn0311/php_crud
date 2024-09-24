<?php
$conn = mysqli_connect('localhost' , 'root' , '' , 'opentutorials');

$sql = "SELECT * FROM topic";
        $result = mysqli_query($conn, $sql);
        $list = '';
        while($row = mysqli_fetch_array($result)) {
            $escaped_title = htmlspecialchars($row['title']);
            $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
        }

$article = array(
    'title' => 'Welcome',
    'description' => 'Hello, web'
);
$update_link = '';
if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn ,$_GET['id']);
    $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB</title>
</head>
<body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
        <?=$list;?>
    </ol>
    <a href="create.php">create</a>
    <?=$update_link?>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
</body>
</html>
