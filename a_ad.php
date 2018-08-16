<?php 



if(!empty($_POST["txt"])){

    $sql = "insert into ad value(NULL,'".$_POST["txt"]."','1')";
    mysqli_query($link,$sql);

    echo "<script>document.location.href='admin.php?do=admin&redo=ad'</script>";
}

if(!empty($_POST["update"][0])){

    $sql = "update ad set ad_display = '0'";
    mysqli_query($link,$sql);
    if(!empty($_POST["display"][0])){
        for($i=0;$i<count($_POST["display"]);$i++){
            $sql = "update ad set ad_display = '1' where ad_seq = '".$_POST["display"][$i]."' ";
            mysqli_query($link,$sql);
        }
    }

    for($i=0;$i<count($_POST["update"]);$i++){
        $sql = "update ad set ad_txt = '".$_POST["update"][$i]."' where ad_seq = '".$_POST["no"][$i]."'  ";
        mysqli_query($link,$sql);
    }

    if(!empty($_POST["del"][0])){
        for($i=0;$i<count($_POST["del"]);$i++){
            $sql = "DELETE FROM ad where ad_seq = '".$_POST["del"][$i]."'; ";
            mysqli_query($link,$sql);
        }
    }

    echo "<script>document.location.href='admin.php?do=admin&redo=ad'</script>";
}


$sql = "select * from ad";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">動態文字廣告管理</p>
        <form method="post"  action="">
    <table width="100%">
    	<tbody><tr class="yel">
            <td width="80%">動態文字廣告</td>
            <td width="10%">顯示</td>
            <td width="10%">刪除</td>
                    </tr>
                    <?php do{ ?>
                    <tr class="yel">
                    <input type="hidden" value="<?=$c2["ad_seq"]?>" name="no[]" >
                    <td width="80%"><input type="text" value="<?=$c2["ad_txt"]?>" name="update[]" style="width:80%"></td>
                    <td width="10%"><input type="checkbox" name="display[]" value="<?=$c2["ad_seq"]?>"  <?php if($c2["ad_display"] == 1){ echo "checked='checked' "; } ?>  ></td>
                    <td width="10%"><input type="checkbox" name="del[]" value="<?=$c2["ad_seq"]?>" ></td>
                    </tr>
                    <?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;a_ad_add.php?do=title&#39;)" value="新增動態文字廣告"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
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