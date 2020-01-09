<?php 
namespace app\models; 
?>

<div class="sidenav">
<?php foreach(Cat::find() as $overCat):?> 
<div class="overCat">
<a href="index.php?a=products&type=Jungs-Toys&cat=<?=$overCat['catID'] ?>"><?=$overCat['descrip'];?></a>
</div>   
<?php foreach(ProdCat::find( 'catID = "'. $overCat['catID']. '"' ) as $rows):?>
<a href="index.php?a=products&type=Jungs-Toys&prodCat=<?=$rows['prodCatID'] ?>"><?php echo $rows['descrip'];?></a>
<?endforeach;?>
<?endforeach;?>
</div>
