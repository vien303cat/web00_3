<?php 


if(!empty($_POST["txt"])){

    $sql = "insert into menu value(NULL,'".$_POST["txt"]."','".$_POST["newnet"]."','1')";
    mysqli_query($link,$sql);

    echo "<script>document.location.href='admin.php?do=admin&redo=menu'</script>";
}

if(!empty($_POST["update"][0])){

    $sql = "update menu set menu_display = '0'";
    mysqli_query($link,$sql);
    if(!empty($_POST["display"][0])){
        for($i=0;$i<count($_POST["display"]);$i++){
            $sql = "update menu set menu_display = '1' where menu_seq = '".$_POST["display"][$i]."' ";
            mysqli_query($link,$sql);
        }
    }

    for($i=0;$i<count($_POST["update"]);$i++){
        $sql = "update menu set menu_txt = '".$_POST["update"][$i]."',menu_net = '".$_POST["net"][$i]."' where menu_seq = '".$_POST["no"][$i]."'  ";
        mysqli_query($link,$sql);
    }

    if(!empty($_POST["del"][0])){
        for($i=0;$i<count($_POST["del"]);$i++){
            $sql = "DELETE FROM menu where menu_seq = '".$_POST["del"][$i]."'; ";
            mysqli_query($link,$sql);
        }
    }

    echo "<script>document.location.href='admin.php?do=admin&redo=menu'</script>";
}



$sql = "select * from menu";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">動態文字廣告管理</p>
        <form method="post"  action="">
    <table width="100%">
    	<tbody><tr class="yel">
            <td width="35%">主選單名稱</td>
            <td width="35%">選單連結網址</td>
            <td width="10%">次選單數</td>
            <td width="5%">顯示</td>
            <td width="5%">刪除</td>
            <td width="10%"></td>
                    </tr>
                    <?php do{ ?>
                    <?php
                     $sqll = "select * from sup where sup_menuseq = '".$c2["menu_seq"]."';";
                     $cc1  = mysqli_query($link,$sqll);
                     $rrow  = mysqli_num_rows($cc1);   
                    ?>
                    
                    <tr class="yel">
                    <input type="hidden" value="<?=$c2["menu_seq"]?>" name="no[]" >
                    <td width="35%"><input type="text" value="<?=$c2["menu_txt"]?>" name="update[]" style="width:80%"></td>
                    <td width="35%"><input type="text" value="<?=$c2["menu_net"]?>" name="net[]" style="width:80%"></td>
                    <td width="10%"><?=$rrow?></td>
                    <td width="5%"><input type="checkbox" name="display[]" value="<?=$c2["menu_seq"]?>"  <?php if($c2["menu_display"] == 1){ echo "checked='checked' "; } ?>  ></td>
                    <td width="5%"><input type="checkbox" name="del[]" value="<?=$c2["menu_seq"]?>" ></td>
                    <td width="10%"><input type="button" onclick="document.location.href='admin.php?do=title&redo=sup&seq=<?=$c2["menu_seq"]?>'" value="編輯次選單"></td>
                    </tr>
                    <?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;a_menu_add.php?do=title&#39;)" value="新增主選單"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
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