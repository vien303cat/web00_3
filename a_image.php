<?php 


if(!empty($_GET["page"])){
    $now_page = $_GET["page"] ;
}else{ $now_page = 1 ; }

$sql = "select * from image ";
$c1  = mysqli_query($link,$sql);
$allrow = mysqli_num_rows($c1);

$page_add = 3 ; 
$page_open = ($now_page - 1 ) * $page_add ;
$allpage =  ceil($allrow/$page_add);

if($now_page == 1){
    $frontpage = 1;
    $nextpage  = $now_page + 1 ;
}else if ($now_page == $allpage){
    $frontpage = $now_page - 1;
    $nextpage  = $allpage ;
}else{ 
    $frontpage = $now_page - 1;
    $nextpage  = $now_page + 1 ;
}




if(!empty($_FILES["img"]["name"])){
    $ee = explode(".",$_FILES["img"]["name"])[1];
    $imgname = $strtime.".".$ee;
    $sql = "insert into image value(NULL,'$imgname','1')";
    mysqli_query($link,$sql);
    copy($_FILES["img"]["tmp_name"],"img/".$imgname);

    echo "<script>document.location.href='admin.php?do=admin&redo=image'</script>";
}

if(!empty($_POST["newno"])){

    $ee = explode(".",$_FILES["newimg"]["name"])[1];
    $imgname = $strtime.".".$ee;
    $sql = "update image set image_img = '$imgname' where image_seq='".$_POST["newno"]."'";
    mysqli_query($link,$sql);
    copy($_FILES["newimg"]["tmp_name"],"img/".$imgname);

    echo "<script>document.location.href='admin.php?do=admin&redo=image'</script>";
}


if(!empty($_POST["no"][0])){


    for($i=0;$i<count($_POST["no"]);$i++){
        $sql = "update image set image_display = '0' where image_seq = '".$_POST["no"][$i]."'";
        mysqli_query($link,$sql);
    }
    if(!empty($_POST["display"][0])){
        for($i=0;$i<count($_POST["display"]);$i++){
            $sql = "update image set image_display = '1' where image_seq = '".$_POST["display"][$i]."' ";
            mysqli_query($link,$sql);
        }
    }

    if(!empty($_POST["del"][0])){
        for($i=0;$i<count($_POST["del"]);$i++){
            $sql = "DELETE FROM image where image_seq = '".$_POST["del"][$i]."'; ";
            mysqli_query($link,$sql);
        }
    }

    echo "<script>document.location.href='admin.php?do=admin&redo=image'</script>";
}



$sql = "select * from image limit $page_open,$page_add ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">校園映像資料管理</p>
        <form method="post"  action="">
    <table width="100%">
    	<tbody><tr class="yel">
            <td width="70%">校園映像資料圖片</td>
            <td width="10%">顯示</td>
            <td width="10%">刪除</td>
            <td width="10%"></td>
                    </tr>
                    <?php do{ ?>
                    <tr class="yel">
                    <input type="hidden" value="<?=$c2["image_seq"]?>" name="no[]" >
        	        <td width="70%"><embed src='img/<?=$c2["image_img"]?>' width="100" height="68"></embed></td>
                    <td width="10%"><input type="checkbox" name="display[]" value="<?=$c2["image_seq"]?>"  <?php if($c2["image_display"] == 1){ echo "checked='checked' "; } ?>  ></td>
                    <td width="10%"><input type="checkbox" name="del[]" value="<?=$c2["image_seq"]?>" ></td>
                    <td width="10%"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;a_image_update.php?do=title&seq=<?=$c2["image_seq"]?>&#39;)" value="更新圖片"></td>
                    </tr>
                    <?php }while($c2 = mysqli_fetch_assoc($c1)) ?>
    </tbody></table>
    <table style="width:100%;">
     <tbody><tr>
      <td width="100%" align="center">
        <a href='admin.php?do=admin&redo=image&page=<?=$frontpage?>'> < </a>

       <?php
            for($i=1;$i<=$allpage;$i++){
                if($i == $now_page){
                    echo "<span style='font-size:48px;color:#00F'>".$i."</span>";
                }else{
                    echo "<a href='admin.php?do=admin&redo=image&page=$i'><span style='font-size:24px'>".$i."</span></a>";
                }
            }

       ?>

        <a href='admin.php?do=admin&redo=image&page=<?=$nextpage?>' > > </a>
      </td>
     </tr>
    </tbody></table>   
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;a_image_add.php?do=image&#39;)" value="新增校園映像資料圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
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