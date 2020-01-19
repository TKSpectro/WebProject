<?php $prod=$produkt['0'];?>

<tr>
    <td class="prod"><img src="<?= $prod['photo'] ?>" alt="produckt"></td>
    <td class="prodName"><?= $prod['descrip'] ?></td>
    
    <td><?= $prod['stdPrice'] ?>€</td>
    <td><? echo $prodID['quantity'];
         $anzahl+=$prodID['quantity'];?></td>
    <td> <form method="post" action="" >
    <input type="hidden"    name="prodID" value="<?= $prod['prodID'] ?>">
    <input class="btn" type="submit"    name="delete" value="ENTFERNEN"></form></td>
        
    <td><?php echo $prod['stdPrice']* $prodID['quantity']; 
    $summe+=$prod['stdPrice']* $prodID['quantity'];?>€</td>
    </tr>
<tr>
    <td  colspan="6"><div class="seprator"></div></td>
</tr>