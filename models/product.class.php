<?php

namespace app\models;
 

class Product extends BaseModel
{
    const TABLENAME = '`product`';

    protected $schema = [
       
        'prodID'       => ['type' => BaseModel::TYPE_INT],
        'createdAt'    => ['type' => BaseModel::TYPE_STRING],
        'updatedAt'    => ['type' => BaseModel::TYPE_STRING],
        'descrip'      => ['type' => BaseModel::TYPE_STRING],
        'stdPrice'     => ['type' => BaseModel::TYPE_FLOAT],
        'photo'        => ['type' => BaseModel::TYPE_STRING],
        'prodCatID'    => ['type' => BaseModel::TYPE_INT]
    ];

    public function search($keyword)
    {
        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT * FROM ' . self::tablename();

            if (!empty($keyword))
            {
                $sql .= ' WHERE descrip LIKE' . '%$keyword%' . ';';
            }

            $result = $db->query($sql)->fetchAll();
        }
        catch (\PDOException $e)
        {
            die('Select statment failed: ' . $e->getMessage());
        }

        return $result;
    }
}

