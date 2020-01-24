<?php
namespace app\models;
$productCounter = 0;
?>

<div class="productList">

<ul >
    <li class="dropdownLi"> <div class="dropdown">
        <button class="dropbtn">Sortierung</button>
        <div class="dropdown-content ">
            <a href="index.php?a=products<? if (isset($_GET['type']))
            {
                ?>&type=<?= $_GET['type'] ?><? } ?><? if (isset($_GET['cat']))
            {
                ?>&cat=<?= $_GET['cat'] ?><? } ?><? if (isset($_GET['prodCat']))
            {
                ?>&prodCat=<?= $_GET['prodCat'] ?><? } ?>&sortBy=priceDesc">Preis: absteigend</a>
            <a href="index.php?a=products<? if (isset($_GET['type']))
            {
                ?>&type=<?= $_GET['type'] ?><? } ?><? if (isset($_GET['cat']))
            {
                ?>&cat=<?= $_GET['cat'] ?><? } ?><? if (isset($_GET['prodCat']))
            {
                ?>&prodCat=<?= $_GET['prodCat'] ?><? } ?>&sortBy=priceAsc"">Preis: aufsteigend</a>
            <a href="index.php?a=products<? if (isset($_GET['type']))
            {
                ?>&type=<?= $_GET['type'] ?><? } ?><? if (isset($_GET['cat']))
            {
                ?>&cat=<?= $_GET['cat'] ?><? } ?><? if (isset($_GET['prodCat']))
            {
                ?>&prodCat=<?= $_GET['prodCat'] ?><? } ?>&sortBy=nameDesc"">Name : absteigend</a>
            <a href="index.php?a=products<? if (isset($_GET['type']))
            {
                ?>&type=<?= $_GET['type'] ?><? } ?><? if (isset($_GET['cat']))
            {
                ?>&cat=<?= $_GET['cat'] ?><? } ?><? if (isset($_GET['prodCat']))
            {
                ?>&prodCat=<?= $_GET['prodCat'] ?><? } ?>&sortBy=nameAsc"">Name : aufsteigend</a>
        </div>
    </div></li>

        <?php

        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT product.prodID, product.descrip, product.stdPrice, product.photo FROM ' . Product::tablename();

            if (isset($_GET['search']))
            {
                $sql .= ' WHERE descrip LIKE "%' . $_GET['search'] . '%"';
            }
            elseif (isset($_GET['type']))
            {
                $sql .= ' INNER JOIN prodcat ON prodcat.prodCatID = product.prodCatID INNER JOIN cat ON prodcat.catID = cat.catID';
                //TODO 3 following ifs could get removed if we change type in get to boy/girl etc. instead of Jungs-Toys
                if ($_GET['type'] == 'Jungs-Toys')
                {
                    $sql .= ' WHERE ((cat.type = "boy") OR (cat.type = "both"))';
                }
                if ($_GET['type'] == 'Mädchen-Toys')
                {
                    $sql .= ' WHERE ((cat.type = "girl") OR (cat.type = "both"))';
                }
                if ($_GET['type'] == 'Konsolespiele')
                {
                    $sql .= ' WHERE (cat.type = "console")';
                }

                //filter if cat is given
                if (isset($_GET['cat']))
                {
                    $sql .= ' AND (cat.catID = ' . $_GET['cat'] . ')';
                }

                //filter if prodCat is given
                if (isset($_GET['prodCat']))
                {
                    $sql .= ' AND (product.prodCatID = ' . $_GET['prodCat'] . ')';
                }

                //filter if a sort is given
                if (isset($_GET['sortBy']))
                {
                    if ($_GET['sortBy'] == 'priceDesc')
                    {
                        $sql .= ' ORDER BY stdPrice DESC';
                    }
                    if ($_GET['sortBy'] == 'priceAsc')
                    {
                        $sql .= ' ORDER BY stdPrice ASC';
                    }
                    if ($_GET['sortBy'] == 'nameDesc')
                    {
                        $sql .= ' ORDER BY descrip DESC';
                    }
                    if ($_GET['sortBy'] == 'nameAsc')
                    {
                        $sql .= ' ORDER BY descrip ASC';
                    }
                }
            }
            $result = $db->query($sql)->fetchAll();
        }
        catch (\PDOException $e)
        {
            die('Select statment failed: ' . $e->getMessage());
        }

        foreach ($result as $prod)
        {
            include __DIR__ . '/../shared/productLook.php';
        }


        //        if (isset($_GET['cat']))
        //        {
        //            foreach (ProdCat::find('catID = "' . $_GET['cat'] . '"') as $prodCat)
        //            {
        //                foreach (Product::find('prodCatID = "' . $prodCat['prodCatID'] . '"') as $prod)
        //                    include __DIR__ . '/../shared/productLook.php';
        //            }
        //        }
        //        elseif (isset($_GET['prodCat']))
        //        {
        //            foreach (Product::find('prodCatID = "' . $_GET['prodCat'] . '"') as $prod)
        //                include __DIR__ . '/../shared/productLook.php';
        //        }
        //
        //        else
        //        {
        //            if (isset($_GET['search']))
        //            {
        //                foreach (Product::find('descrip like "' . '%' . $_GET['search'] . '%' . '"') as $prod)
        //                    include __DIR__ . '/../shared/productLook.php';
        //            }
        //            else
        //            {
        //                foreach ($product as $prod)
        //                    include __DIR__ . '/../shared/productLook.php';
        //            }
        ?>
    </ul>
</div>
