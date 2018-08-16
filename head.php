<?php
session_start();
$link = mysqli_connect("localhost","root","","db00_3");
mysqli_query($link,"SET NAMES UTF8");

$strtime  = strtotime("+6hour");
$nowtime  = date("Y-m-d H:i:s",$strtime) ;

include_once("web_list.php");

//做到在用就好
$sql = "select * from news where news_display = '1'";
$c1  = mysqli_query($link,$sql);
$newsrow = mysqli_num_rows($c1); 
?>