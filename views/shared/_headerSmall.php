<?php 

namespace app\models;

require_once 'models/_baseModel.class.php'; 

/*$params = [
    'land'        => $_POST['land'],
    'city'        => $_POST['city'],
    'street'      => $_POST['street'],
    'houseNumber' => $_POST['houseNumber'],
    'zip'         => $_POST['zip']
];*/


$address = new Address($_POST);

$result = $address->find();
$error;
$address->insert($error);
#print_r ($error);?>


<header>KLEIN</header>

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
        <?php foreach($result as $rows):?>
<tr>
        <?foreach($rows as $index => $cols):?>
        <td><?=$cols?></td>
        <?endforeach;?>
</tr>
        <?endforeach;?>



</table>