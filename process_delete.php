<?php
require_once 'link.php';

settype($_POST['id'], "integer");
$filtered=array(
    'id'=>$link->real_escape_string($_POST['id']),
    'title'=>$link->real_escape_string($_POST['title']),
    'description'=>$link->real_escape_string($_POST['description'])
);

$sql="DELETE FROM topic WHERE id={$filtered['id']}";
$result=$link->query($sql);
if($result==false){
    echo '관리자에게 문의하세요';
    echo($link->error());
}else{
    echo '삭제되었습니다. <a href="index.php">처음으로</a>';
}
?>