<?php 


if(!empty($_GET["page"])){
    $now_page = $_GET["page"] ;
}else{ $now_page = 1 ; }

$sql = "select * from news ";
$c1  = mysqli_query($link,$sql);
$allrow = mysqli_num_rows($c1);

$page_add = 5 ; 
$page_open = ($now_page - 1 ) * $page_add ;
$allpage =  ceil($allrow/$page_add);

if($now_page == 1){
    $frontpage = 1;
    $nextpage  = $now_page + 1 ;
}else if ($now_page == $allpage){
    $frontpage = $now_page - 1;
    $nextpage  = $allpage ;
}else{ 
    $frontpage = $now_page - 1;
    $nextpage  = $now_page + 1 ;
}



$sql = "select * from news where news_display = '1' limit $page_open,$page_add ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
do{
?>

<li><?=mb_substr($c2["news_txt"],0,15)?><span class="all" style="display:none"><?=$c2["news_txt"]?></span></li>


<?php 
}while($c2  = mysqli_fetch_assoc($c1))
?>