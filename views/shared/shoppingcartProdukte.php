<?php $prod=$produkt['0'];?>

<tr>
    <td class="prod"><img src="<?= $prod['photo'] ?>" alt="produckt"></td>
    <td class="prodName"><?= $prod['descrip'] ?></td>
    
    <td><?= $prod['stdPrice'] ?>€</td>

    <td><form method="post" id='form-date'>
        <input type="number" name="quantity" value="<?=$prodID['quantity'];?>"
         <?$anzahl+=$prodID['quantity'];?> ></td>
    <td><input type="hidden"    name="prodID" value="<?= $prod['prodID'] ?>">
    <input class="btn" type="submit"    name="delete" value="ENTFERNEN" id="senddate">
    </form></td>
        
    <td><?php echo $prod['stdPrice']* $prodID['quantity']; 
    $summe+=$prod['stdPrice']* $prodID['quantity'];?>€</td>
    </tr>
<tr>
    <td  colspan="6"><div class="seprator"></div></td>
</tr>

<script>
		document.addEventListener('DOMContentLoaded', function(){

			var form = document.getElementById('form-date');
			var submit = document.getElementById('senddate');
			//var errorBox = document.getElementById('error-box');

			submit.addEventListener('click', function(event){
				event.stopPropagation(); // no send to the top element
				event.preventDefault(); // no default action on submit

				var request = new XMLHttpRequest();
				request.open(form.getAttribute('method'), '?ajax=1', true);

				request.onreadystatechange = function() {
					// request finished?
					if(this.readyState == 4) // XMLHttpRequest.DONE
					{
						// HTTP-Status-Code is OK?
						if(this.status == 200)
						{
							alert(this.responseText);
							}
						else
						{	
                        alert(this.statusText);
                        }
                    }
					}
				

				var formData = new FormData(form);
				formData.append('delete', '1');
				request.send(formData);
		
        });
    }
	</script>
