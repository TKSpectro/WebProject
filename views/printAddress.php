<?php 
namespace app\models;


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
        <?php foreach(Address::find() as $rows):?>
<tr>
        <?foreach($rows as $index => $cols):?>
        <td><?=htmlspecialchars($cols)?></td>
        <?endforeach;?>
</tr>
        <?endforeach;?>



</table>