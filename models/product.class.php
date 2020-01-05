<?php

namespace app\models;
 

class Product extends BaseModel
{
    const TABLENAME = '`product`';

    protected $schema = [
<<<<<<< HEAD
        'prodID'       => ['type' => BaseModel::TYPE_INT],
=======
        'prodID'    => ['type' => BaseModel::TYPE_INT],
>>>>>>> b2e4ed5a1fd1555bd19a58ed1470e5fca7a9a58e
        'createdAt'    => ['type' => BaseModel::TYPE_STRING],
        'updatedAt'    => ['type' => BaseModel::TYPE_STRING],
        'descrip'      => ['type' => BaseModel::TYPE_STRING],
        'stdPrice'     => ['type' => BaseModel::TYPE_FLOAT],
        'catID'        => ['type' => BaseModel::TYPE_INT]
    ];
}

