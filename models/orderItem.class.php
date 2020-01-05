<?php 

namespace app\models;
 

class OrderItem extends BaseModel
{
    const TABLENAME = '`orderItem`';

    protected $schema = [
        'accountID'   	=> ['type' => BaseModel::TYPE_INT],
        'createdAt'   	=> ['type' => BaseModel::TYPE_STRING],
        'updatedAt'    	=> ['type' => BaseModel::TYPE_STRING],
        'actPrice'		=> ['type' => BaseModel::TYPE_FLOAT],
        'qty'    		=> ['type' => BaseModel::TYPE_INT],
        'orderID'       => ['type' => BaseModel::TYPE_INT],
        'prodID' 		=> ['type' => BaseModel::TYPE_INT]
    ];
}

