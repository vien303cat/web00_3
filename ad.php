<?php

$sql = "select * from ad where ad_display = '1'  ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$ad = "";
do{
   $ad .= $c2["ad_txt"]." "; 
}while($c2  = mysqli_fetch_assoc($c1));

echo $ad ;
?>

