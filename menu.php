<?php
$sql = "select * from menu where menu_display = '1' ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

do{ ?>
    <div class="mainmu"><a href='<?=$c2["menu_net"]?>'><?=$c2["menu_txt"]?></a> 
    <?php
        $sqll = "select * from sup where sup_menuseq = '".$c2["menu_seq"]."'";
        $cc1   = mysqli_query($link,$sqll);
        $cc2   = mysqli_fetch_assoc($cc1);
    ?>
        <div class="mw" style="display:none;"><a href='<?=$c2["sup_net"]?>'><?=$cc2["sup_txt"]?></a> </div>
    </div>

<?php
}while($c2  = mysqli_fetch_assoc($c1))
?>