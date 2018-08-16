<?php
include_once("head.php"); 

$sql = "select * from title where title_seq = '".$_GET["seq"]."'" ;
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>


<form method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
    <td colspan="2" align="center" valign="middle">修改標題區圖片</td>
  </tr>
  <tr>
    <input type="hidden" value="<?=$_GET["seq"]?>" name="newno">
    <input type="hidden" value="<?=$c2["title_img"]?>" name="newimgname"> 
    <td align="center" valign="middle">標題區圖片:</td>
    <td align="center" valign="middle"><input type="file" name="newimg" ></td>
  </tr>
  <tr>
    <td align="center" valign="middle">標題區替代文字:</td>
    <td align="center" valign="middle"><input type="text" name="newtxt" value="<?=$c2["title_txt"]?>" ></td>
  </tr>
</table>

<table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table> 
</form>

