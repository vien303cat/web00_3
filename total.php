<?php

if(empty($_SESSION["log"])){
    $_SESSION["log"] = 1 ;
    $sql = "update total set total_txt = total_txt + 1 ;";
    mysqli_query($link,$sql);
}

$sql = "select * from total  ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

echo $c2["total_txt"];
?>

