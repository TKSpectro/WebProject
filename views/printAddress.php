<?php 
namespace app\models;
require_once 'models/address.class.php';

$test = Address::find();

?>

<br>
<br>
<br>
<br>
<br>
<table border=1>
<tr>
    <th>ID</th>
    <th>createdAt</th>
    <th>updatedAt</th>
    <th>Land</th>
    <th>City</th>
    <th>Street</th>
    <th>Hause Number</th>
    <th>ZIP</th>
</tr>
        <?php foreach($test as $rows):?>
<tr>
        <?foreach($rows as $index => $cols):?>
        <td><?=htmlspecialchars($cols)?></td>
        <?endforeach;?>
</tr>
        <?endforeach;?>



</table>