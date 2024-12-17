<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
        <?php
        $ads=$Ad->all(['sh'=>1]);
        foreach($ads as $ad){
            echo $ad['text'];
            echo str_repeat("&nbsp;",10);
        }
        ?>
    </marquee>
    <div style="height:32px; display:block;"></div>

    <!--正中央-->

    <!-- 動畫輪播圖的容器 -->
    <div style="width:100%; padding:2px; height:290px;">
        <div id="mwww" loop="true" style="width:100%; height:100%;">
            <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
        </div>
    </div>
    <!-- 輪播圖片 -->
    <script>
    var lin = new Array();

    <?php

    $mvs=$Mvim->all(['sh'=>1]);

    foreach($mvs as $mv){
        echo "lin.push('upload/{$mv['img']}');";
    }
    ?>

    var now = 0;
    // 陣列長度2以上才會執行
    if (lin.length > 1) {
        // 設定間隔時間
        // 每3000毫秒就會重複執行ww()
        // 非同步機制 跟主程式是分開執行的
        setInterval("ww()", 3000);
        now = 1;
    }

    function ww() {
        // $(選擇器) 在這個範圍內作用，將這一段html碼放入html容器
        $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
        //$("#mwww").attr("src",lin[now])
        now++;
        // 索引值>長度時 
        if (now >= lin.length)
            now = 0;
    }
    ww();
    </script>
    <div
        style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
        <span class="t botli">最新消息區
            <?php
            if($News->count(['sh'=>1])>5){
                echo "<a href='index.php?do=news' style='float:right'>";
                echo "More...";
                echo "</a>";
            }
            ?>
        </span>
        <ul class="ssaa" style="list-style-type:decimal;">
            <?php
            // 要顯示符合條件的前五筆
            $all_news=$News->all(['sh'=>1]," limit 5");
            foreach($all_news as $n){
                echo "<li>";
                echo mb_substr($n['text'],0,20);
                echo "<span class='all' style='display:none'>";
                echo $n['text'];
                echo "</span>";
                echo "</li>";
            }
            ?>
        </ul>
        <!-- 彈出視窗 平常不顯示 滑鼠移上來才會顯示 -->
        <div id="altt"
            style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
            123456</div>
        <script>
        // ssaa在li的上層 針對ssaa下的li做的事情
        // 滑鼠移上去才顯示            
        $(".ssaa li").hover(
            function() {
                // 在altt裡面
                // this => 滑鼠移上去的那一個 正在動作的那一個
                // jQ的.html=原生js的innerHtml
                // html() => 取得裡面的內容
                $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                $("#altt").show()
            }
        )
        // 滑鼠移開恢復不顯示
        $(".ssaa li").mouseout(
            function() {
                $("#altt").hide()
            }
        )
        </script>
    </div>
</div>