<?php 
namespace app\models; ?>
<div class="sidenav">

<?php foreach(Cat::find() as $test):?>  
<?php echo $test['descrip'];
    
    foreach(ProdCat::find( 'catID = "'. $test['catID']. '"' ) as $rows):?>
    <a href="#"><?php echo $rows['descrip'];?></a>
<?endforeach;?>
<?endforeach;?>
</div>
