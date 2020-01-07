<?php 
namespace app\models; ?>
<div class="sidenav">
<?php foreach(ProdCat::find() as $rows):?>
<a href="#"><?php echo $rows['descrip'];?></a>
<?endforeach;?>
</div>
