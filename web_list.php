<?php 

$list["title"] = "a_title.php";
$list["ad"] = "a_ad.php";
$list["mvim"] = "a_mvim.php";
$list["image"] = "a_image.php";
$list["total"] = "a_total.php";
$list["bottom"] = "a_bottom.php";
$list["news"] = "a_news.php";
$list["member"] = "a_member.php";
$list["menu"] = "a_menu.php";
$list["sup"] = "a_sup.php";
if(empty( $_GET["redo"] )) {
    $web = "title" ;
}else{
    $web = $_GET["redo"];
}
?>