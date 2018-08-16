<?php 

if(!empty($_FILES["img"]["name"])){
    $ee = explode(".",$_FILES["img"]["name"])[1];
    $imgname = $strtime.".".$ee;
    $sql = "insert into mvim value(NULL,'$imgname','1')";
    mysqli_query($link,$sql);
    copy($_FILES["img"]["tmp_name"],"img/".$imgname);

    echo "<script>document.location.href='admin.php?do=admin&redo=mvim'</script>";
}

if(!empty($_POST["newno"])){


    $ee = explode(".",$_FILES["newimg"]["name"])[1];
    $imgname = $strtime.".".$ee;
    $sql = "update mvim set mvim_img = '$imgname' where mvim_seq='".$_POST["newno"]."'";
    mysqli_query($link,$sql);
    copy($_FILES["newimg"]["tmp_name"],"img/".$imgname);

    echo "<script>document.location.href='admin.php?do=admin&redo=mvim'</script>";
}

if(!empty($_POST["no"][0])){
    $sql = "update mvim set mvim_display = '0'";
    mysqli_query($link,$sql);
    if(!empty($_POST["display"][0])){
        for($i=0;$i<count($_POST["display"]);$i++){
            $sql = "update mvim set mvim_display = '1' where mvim_seq = '".$_POST["display"][$i]."' ";
            mysqli_query($link,$sql);
        }
    }

    if(!empty($_POST["del"][0])){
        for($i=0;$i<count($_POST["del"]);$i++){
            $sql = "DELETE FROM mvim where mvim_seq = '".$_POST["del"][$i]."'; ";
            mysqli_query($link,$sql);
        }
    }

    echo "<script>document.location.href='admin.php?do=admin&redo=mvim'</script>";
}


$sql = "select * from mvim";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">動畫圖片管理</p>
        <form method="post"  action="">
    <table width="100%">
    	<tbody><tr class="yel">
            <td width="70%">動畫圖片</td>
            <td width="10%">顯示</td>
            <td width="10%">刪除</td>
            <td width="10%"></td>
                    </tr>
                    <?php do{ ?>
                    <tr class="yel">
                    <input type="hidden" value="<?=$c2["mvim_seq"]?>" name="no[]" >
        	        <td width="70%"><embed src='img/<?=$c2["mvim_img"]?>' width="200" height="100"></embed></td>
                    <td width="10%"><input type="checkbox" name="display[]" value="<?=$c2["mvim_seq"]?>"  <?php if($c2["mvim_display"] == 1){ echo "checked='checked' "; } ?>  ></td>
                    <td width="10%"><input type="checkbox" name="del[]" value="<?=$c2["mvim_seq"]?>" ></td>
                    <td width="10%"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;a_mvim_update.php?do=title&seq=<?=$c2["mvim_seq"]?>&#39;)" value="更新圖片"></td>
                    </tr>
                    <?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;a_mvim_add.php?do=mvim&#39;)" value="新增動畫圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
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