<?php

namespace app\controller;

class ProductController extends \app\core\Controller
{
    public function actionProducts()
    {
        if (isset($_GET['type']))
        {
            $this->_params['title'] = $_GET['type'];
        }
        else
        {
            $this->_params['title'] = "Gefundene Produkte";
        }
        $this->_params['Header'] = true;

        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT product.prodID, product.descrip, product.stdPrice, product.photo FROM ' . \app\models\Product::tablename();

            if (isset($_GET['search']))
            {
                $sql .= ' WHERE descrip LIKE "%' . $_GET['search'] . '%"';
            }
            else
            {
                $sql .= ' INNER JOIN prodcat ON prodcat.prodCatID = product.prodCatID INNER JOIN cat ON prodcat.catID = cat.catID';
                if (isset($_GET['type']))
                {
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

                if (isset($_GET['min']) && ($_GET['min'] != null))
                {
                    $sql .= ' AND (product.stdPrice >= ' . $_GET['min'] . ')';
                }

                if (isset($_GET['max']) && ($_GET['max'] != null))
                {
                    $sql .= ' AND (product.stdPrice <= ' . $_GET['max'] . ')';
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


        $this->_params['product'] = $result;
    }
}