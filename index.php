<?php
include_once "api/db.php";
?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;"
                onclick="cl(&#39;#cover&#39;)">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>

    <div id="main">
        <a title="<?=$Title->find(['sh'=>1])['text'];?>" href="index.php">
            <div class="ti"
                style="background:url('./upload/<?=$Title->find(['sh'=>1])['img'];?>'); background-size:cover;"></div>
            <!--標題-->
        </a>
        <div id="ms">
            <div id="lf" style="float:left;">
                <div id="menuput" class="dbor">
                    <!--主選單放此-->
                    <span class="t botli">主選單區</span>
                    <?php
                    $mains=$Menu->all(['sh'=>1,'main_id'=>0]);
                    foreach($mains as $main){
                        // js.js裡面的mainmu
                        echo "<div class='mainmu cent'>";
                        echo "<a href='{$main['href']}'>";
                        echo $main['text'];
                        echo "</a>";
                        echo "<div class='mw'>";
                        // 先判斷這個主選單下面有沒有次選單
                        // if(有次選單){
                        //     顯示次選單
                        // }
                        // 找main_id有沒有是主選單的id
                        // 有的話就是有次選單
                        if($Menu->count(['main_id'=>$main['id']])>0){
                           $subs=$Menu->all(['main_id'=>$main['id']]);
                            foreach($subs as $sub){
                                // js.js裡面的mainmu2
                                echo "<div class='mainmu2 cent'>";
                                echo "<a href='{$sub['href']}'>";
                                echo $sub['text'];
                                echo "</a>";
                                echo "</div>";
                                }
                            }
                            echo "</div>";
                            echo "</div>";
                            }
                        
                    ?>
                </div>
                <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">進站總人數 :
                        <?=$Total->find(1)['total'];?></span>
                </div>
            </div>

            <?php
			// $do=(isset($_GET[do]))?$_GET['do']:'main';
			
			// 語法是isset時，才能簡化為??的寫法
			$do=$_GET['do']??'main';

			$file="./front/{$do}.php";
			// if(file_exists($file)){
			// 	include $file;
			// }else{
			// 	include "./front/main.php";
			// }

			// 簡化為三元運算式
			include (file_exists($file))?$file:"./front/main.php";
			?>


            <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                <!--右邊-->
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
                    onclick="lo(&#39;?do=login&#39;)">管理登入</button>

                <div style="width:89%; height:480px;" class="dbor">
                    <span class="t botli">校園映象區</span>

                    <!-- 上 -->
                    <div class="cent" id="up" onclick="pp(1)">
                        <img src="./icon/up.jpg" alt="">
                    </div>

                    <!-- 圖片 -->
                    <div class="cent">
                        <?php
                        $imgs=$Image->all(['sh'=>1]);
                        foreach($imgs as $idx => $img){
                            // im display:none
                            echo "<div class='im' id='ssaa$idx'>";
                        echo "<img src='./upload/{$img['img']}'
                            style='width:150px;height:103px;border:3px solid orange'>";
                        echo "</div>";
                        }
                        ?>
                    </div>

                    <!-- 下 -->
                    <div class="cent" id="dn" onclick="pp(2)">
                        <img src="./icon/dn.jpg" alt="">
                    </div>

                    <script>
                    // 現在的頁數
                    var nowpage = 0,
                        // 有幾張圖片要顯示
                        num = <?=$Image->count(['sh'=>1]);?>;

                    function pp(x) {
                        var s, t;
                        // pp(1) 如果現在頁數是1以上的話，執行pp的時候會減一頁
                        if (x == 1 && nowpage - 1 >= 0) {
                            nowpage--;
                        }
                        // pp(2) 如果現在頁數加一頁再乘以三小於條件，執行pp的時候會加一頁
                        // 原本的寫法超過7張圖的話，最後一頁會顯示不出來
                        // 修改如下後即可正常顯示
                        if (x == 2 && (nowpage + 1) <= num * 1 - 3) {
                            nowpage++;
                        }
                        $(".im").hide()
                        // 迴圈會跑3次
                        for (s = 0; s <= 2; s++) {
                            // *1 可以把變數轉成數字型態
                            t = s * 1 + nowpage * 1;
                            $("#ssaa" + t).show()
                        }
                    }
                    pp(1)
                    </script>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
        <div
            style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
            <span class="t" style="line-height:123px;"><?=$Bottom->find(1)['bottom'];?></span>
        </div>
    </div>

</body>

</html>