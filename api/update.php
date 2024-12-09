<?php
include_once "db.php";

if(!isset($_POST['id'])){
    exit();
}

$table=$_POST['table'];

// 變成大寫的字串
$db=ucfirst($table);

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);

    $row=$$db->find($_POST['id']);
    $row['img']=$_FILES['img']['name'];
    $$db->save($row);
}

to("../admin.php?do=$table");