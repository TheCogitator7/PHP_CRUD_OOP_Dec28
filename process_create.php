<?php
require_once 'link.php';

$sql="INSERT INTO topic(title, description, date) VALUES(
    '{$_POST['title']}',
    '{$_POST['description']}',
    NOW()
)";
$result=$link->query($sql);
if($result==false){
    echo '관리자에게 문의하세요';
    echo($link->error());
}else{
    echo '정상 처리되었습니다. <a href="index.php">처음으로</a>';
}
?>