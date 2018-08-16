<?php
$sql = "select * from image where image_display = '1'";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
$row = mysqli_num_rows($c1);
$x = 0 ;
?>

<div  align="center"><img src="img/01E01.jpg" onclick="pp(1)"></div>

<?php do{ ?>
    <div align="center" class="im" id="ssaa<?=$x?>"><img src='img/<?=$c2["image_img"]?>' width="150" height="103"></div>
<?php
$x++ ;}while($c2 = mysqli_fetch_assoc($c1));
?>


<div  align="center"><img src="img/01E02.jpg" onclick="pp(2)"></div>