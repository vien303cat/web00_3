<?php
include_once("head.php"); 

?>


<form method="post" enctype="multipart/form-data">
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
    <td colspan="2" align="center" valign="middle">修改動畫圖片</td>
  </tr>
  <tr>
    <input type="hidden" value="<?=$_GET["seq"]?>" name="newno">
    <input type="hidden" value="<?=$c2["title_img"]?>" name="newimgname"> 
    <td align="center" valign="middle">動畫圖片:</td>
    <td align="center" valign="middle"><input type="file" name="newimg" ></td>
  </tr>
</table>

<table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table> 
</form>

