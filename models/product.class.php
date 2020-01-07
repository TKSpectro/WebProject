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
}

