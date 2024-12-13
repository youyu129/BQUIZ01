<?php
include_once "db.php";

$table=$_POST['table'];

// 變成大寫的字串
$db=ucfirst($table);

if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            // $$可變變數 將字串變成變數
            $$db->del($id);
        }else{
            $row=$$db->find($id);
            
            switch($table){
                case "admin":
                    $row['acc']=$_POST['acc'][$idx];
                    $row['pw']=$_POST['pw'][$idx];
                    break;

                case "menu":
                    $row['text']=$_POST['text'][$idx];
                    $row['href']=$_POST['href'][$idx];
                    // 多選 判斷有沒有在陣列裡面
                    $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    break;
                    
                default:
                    $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    // 判斷式 有文字才讀取
                    if(isset($row['text'])){
                        $row['text']=$_POST['text'][$idx];
                    }
            }
            $$db->save($row);
        }
    }
}

// 從哪裡來就回哪裡去
to("../admin.php?do=$table");

// dd($_POST);
?>