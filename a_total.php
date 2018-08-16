<?php 


if(!empty($_POST["update"])){

            $sql = "update total set total_txt = '".$_POST["update"]."' ";
            mysqli_query($link,$sql);
    echo "<script>document.location.href='admin.php?do=admin&redo=total'</script>";
}


$sql = "select * from total";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

?>


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">進站總人數管理</p>
        <form method="post"  action="">
    <table width="100%">
    	<tbody><tr class="yel">
            <td width="80%">進站總人數： <input type="text" value="<?=$c2["total_txt"]?>" name="update[]" style="width:80%"> </td>
                    </tr>
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
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