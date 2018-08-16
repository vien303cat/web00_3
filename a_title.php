<?php 

if(!empty($_FILES["img"]["name"])){
    $ee = explode(".",$_FILES["img"]["name"])[1];
    $imgname = $strtime.".".$ee;
    $sql = "insert into title value(NULL,'$imgname','".$_POST["txt"]."','0')";
    mysqli_query($link,$sql);
    copy($_FILES["img"]["tmp_name"],"img/".$imgname);

    echo "<script>document.location.href='admin.php?do=admin&redo=title'</script>";
}

if(!empty($_POST["newno"])){

    $imgname = $_POST["newimgname"];
    copy($_FILES["newimg"]["tmp_name"],"img/".$imgname);

    echo "<script>document.location.href='admin.php?do=admin&redo=title'</script>";
}

if(!empty($_POST["update"][0])){


    if(!empty($_POST["display"])){
        $sql = "update title set title_display = '0'";
        mysqli_query($link,$sql);
        $sql = "update title set title_display = '1' where title_seq = '".$_POST["display"]."' ";
        mysqli_query($link,$sql);
    }

    for($i=0;$i<count($_POST["update"]);$i++){
        $sql = "update title set title_txt = '".$_POST["update"][$i]."' where title_seq = '".$_POST["no"][$i]."'  ";
        mysqli_query($link,$sql);
    }

    if(!empty($_POST["del"][0])){
        for($i=0;$i<count($_POST["del"]);$i++){
            $sql = "DELETE FROM title where title_seq = '".$_POST["del"][$i]."'; ";
            mysqli_query($link,$sql);
        }
    }

    echo "<script>document.location.href='admin.php?do=admin&redo=title'</script>";
}


$sql = "select * from title";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">網站標題管理</p>
        <form method="post"  action="">
    <table width="100%">
    	<tbody><tr class="yel">
        	<td width="50%">網站標題</td><td width="30%">替代文字</td><td width="5%">顯示</td><td width="5%">刪除</td><td width="10%"></td>
                    </tr>
                    <?php do{ ?>
                    <tr class="yel">
                    <input type="hidden" value="<?=$c2["title_seq"]?>" name="no[]" >
        	        <td width="50%"><img src='img/<?=$c2["title_img"]?>' width="300" height="30"></td>
                    <td width="30%"><input type="text" value="<?=$c2["title_txt"]?>" name="update[]"></td>
                    <td width="5%"><input type="radio" name="display" value="<?=$c2["title_seq"]?>"  <?php if($c2["title_display"] == 1){ echo "checked='checked' "; } ?>  ></td>
                    <td width="5%"><input type="checkbox" name="del[]" value="<?=$c2["title_seq"]?>" ></td>
                    <td width="10%"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;a_title_update.php?do=title&seq=<?=$c2["title_seq"]?>&#39;)" value="更新圖片"></td>
                    </tr>
                    <?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;a_title_add.php?do=title&#39;)" value="新增網站標題圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>
                                                </div>
                <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
                    	<script>
						$(".sswww").hover(
							function ()
							{
								$("#alt").html(""+$(this).children(".all").html()+"").css({"top":$(this).offset().top-50})
								$("#alt").show()
							}
						)
						$(".sswww").mouseout(
							function()
							{
								$("#alt").hide()
							}
						)
                        </script>
                             </div>
             	<div style="clear:both;"></div>