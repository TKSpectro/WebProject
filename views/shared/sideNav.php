<?php 
namespace app\models; ?>
<div class="sidenav">

<?php foreach(Cat::find() as $overCat):?> 
<div class="overCat">
<a href="#"><?=$overCat['descrip'];?></a>
</div>   
<?php foreach(ProdCat::find( 'catID = "'. $overCat['catID']. '"' ) as $rows):?>
<a href="#"><?php echo $rows['descrip'];?></a>
<?endforeach;?>
<?endforeach;?>
</div>
