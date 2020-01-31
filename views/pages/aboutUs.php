<?php  
  namespace app\models;

#use app\models\Shoppingcart;
      
        var_dump($test);
        $warenkorb=Array();
        $ausgabe=Array();

        foreach($test as $gekaufteWare)
        {
            $warenkorb=Array();
            $produkt= \app\models\Product::find('prodID = "' . $gekaufteWare['prodID'] . '"');  
            $prod=$produkt['0'];
            array_push($warenkorb,$prod['photo']);
            array_push($warenkorb,$prod['descrip']);
            array_push($warenkorb,$prod['stdPrice']);
            array_push($warenkorb,$gekaufteWare['quantity']);
            array_push($warenkorb,$prod['stdPrice']*$gekaufteWare['quantity']);
            array_push($warenkorb,$prod['prodID']);
            array_push( $ausgabe, $warenkorb);
        }
        echo($_SESSION['accountID']);
       # var_dump($ausgabe['0']);
       /*foreach($ausgabe as $prod)
        {
            var_dump($prod);
            echo('<br>');
        }*/

        /*console.log(className.length);
        for (var i = 0; i < className.length; ++i) {
            console.log(className[i].id);
            var submit = document.getElementById(className[i].id);*/

        
        