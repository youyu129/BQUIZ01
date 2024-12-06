<?php

include_once "db.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    // 把檔名存到POST裡面
    $_POST['img']=$_FILES['img']['name'];
}

$Title->save($_POST);

to("../admin.php?do=title");

// $_POST['img'];
// $text=$_POST['text'];

?>