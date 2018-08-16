<?php
$sql = "select * from mvim where mvim_display = '1'";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
$x = 0 ;
do{
?>
<script>
lin[<?=$x?>] = "<?=$c2["mvim_img"]?>" ;
</script>

<?php
$x++ ;}while($c2 = mysqli_fetch_assoc($c1));
?>