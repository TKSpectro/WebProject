<?php

namespace app\models;
 

class ShoppingCart extends BaseModel
{
    const TABLENAME = '`shoppingCart`';

    protected $schema = [
       
        'shoppingCartID'  => ['type' => BaseModel::TYPE_INT],
        'createdAt'       => ['type' => BaseModel::TYPE_STRING],
        'updatedAt'       => ['type' => BaseModel::TYPE_STRING],
        'prodID'          => ['type' => BaseModel::TYPE_INT]
    ];
}
