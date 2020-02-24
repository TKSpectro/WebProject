<?php

namespace app\models;
 

class Order extends BaseModel
{
    const TABLENAME = '`order`';

    protected $schema = [
        'orderID'    	=> ['type' => BaseModel::TYPE_INT],
        'orderDate'    	=> ['type' => BaseModel::TYPE_STRING],
        'updatedAt'    	=> ['type' => BaseModel::TYPE_STRING],
        'shipDate'  	=> ['type' => BaseModel::TYPE_STRING],
        'sum'       	=> ['type' => BaseModel::TYPE_FLOAT],
        'accountID'     => ['type' => BaseModel::TYPE_INT],
        'addressID'     => ['type' => BaseModel::TYPE_INT]

    ];
}

