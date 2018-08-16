<?php
$sql = "select * from title where title_display ='1' ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

?>

<a href='index.php' ><img src='img/<?=$c2["title_img"]?>' width="1024" height="100" title="<?=$c2["title_txt"]?>"></a>