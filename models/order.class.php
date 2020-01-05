<?php

namespace app\models;
 

class Order extends BaseModel
{
    const TABLENAME = '`order`';

    protected $schema = [
        'orderID'    	=> ['type' => BaseModel::TYPE_INT],
        'createdAt'    	=> ['type' => BaseModel::TYPE_DATE],
        'updatedAt'    	=> ['type' => BaseModel::TYPE_DATE],
        'orderDate'  	=> ['type' => BaseModel::TYPE_DATE],
        'shipDate'  	=> ['type' => BaseModel::TYPE_DATE],
        'sum'       	=> ['type' => BaseModel::TYPE_FLOAT]
    ];
}

