<?php

namespace app\models;
 

class Product extends BaseModel
{
    const TABLENAME = '`product`';

    protected $schema = [
        'productID'    => ['type' => BaseModel::TYPE_INT],
        'createdAt'    => ['type' => BaseModel::TYPE_STRING],
        'updatedAt'    => ['type' => BaseModel::TYPE_STRING],
        'descrip'    => ['type' => BaseModel::TYPE_STRING],
        'stdPrice'     => ['type' => BaseModel::TYPE_FLOAT],
        'catID'        => ['type' => BaseModel::TYPE_INT],
    ];
}

