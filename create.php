<?php
require_once 'link.php';

$sql="SELECT * FROM topic";
$result=$link->query($sql);
$list='';
while($row=$result->fetch_array(MYSQLI_ASSOC)){
    $filtered=htmlspecialchars($row['title']);
    $list=$list.'<li><a href="index.php?id='.$row['id'].'">'.$filtered.'</a></li>';
};

$article=array(
    'title'=>'Welcome',
    'description'=>'Hello, PHP!!',
    'date'=>'2023-12-28'
);

if(isset($_GET['id'])){
    $filtered_id=$link->real_escape_string($_GET['id']);
    $sql="SELECT * FROM topic WHERE id={$filtered_id}";
    $result=$link->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $article['title']=htmlspecialchars($row['title']);
    $article['description']=htmlspecialchars($row['description']);
    $article['date']=htmlspecialchars($row['date']);
}

?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial=scale=1.0">
        <title>Web</title>
    </head>
    <body>
        <h1><a href="index.php">Web</a></h1>
        <ol><?=$list ?></ol>
        <form action="process_create.php" method="post">
            <p><input type="name" name="title" placeholder="title"></p>
            <p><textarea name="description" placeholder="description"></textarea></p>
            <p><input type="submit"></p>
        </form>
    </body>
</html>