<?php

namespace app\models;
 

class Shoppingcart extends BaseModel
{
    const TABLENAME = '`shoppingcart`';

    protected $schema = [
       
        'ID'              => ['type' => BaseModel::TYPE_INT],
        'createdAt'       => ['type' => BaseModel::TYPE_STRING],
        'updatedAt'       => ['type' => BaseModel::TYPE_STRING],
        'prodID'          => ['type' => BaseModel::TYPE_INT],
        'quantity'        => ['type' => BaseModel::TYPE_INT],
        'randomNr'        => ['type' => BaseModel::TYPE_STRING],
        'accountID'       => ['type' => BaseModel::TYPE_INT]


    ];
}
