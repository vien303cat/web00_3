<?php
$sql = "select * from bottom ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

echo $c2["bottom_txt"];
?>

