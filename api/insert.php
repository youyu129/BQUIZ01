<?php

include_once "db.php";

$table=$_POST['table'];

// 變成大寫的字串
$db=ucfirst($table);

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    // 把檔名存到POST裡面
    $_POST['img']=$_FILES['img']['name'];
}

unset($_POST['table']);

if(isset($_POST['pw2'])){
    unset($_POST['pw2']);
}

$$db->save($_POST);

to("../admin.php?do=$table");

?>