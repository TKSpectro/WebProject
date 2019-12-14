<?php

namespace app\models;
 

class AccountAddress extends BaseModel
{
    const TABLENAME = '`accountAddressOrder`';

    protected $schema = [
        'accountID'    	=> ['type' => BaseModel::TYPE_INT],
        'createdAt'    	=> ['type' => BaseModel::TYPE_STRING],
        'updatedAt'  	=> ['type' => BaseModel::TYPE_STRING],
        'orderID'    	=> ['type' => BaseModel::TYPE_INT],
        'accountID'     => ['type' => BaseModel::TYPE_INT],
        'addressID'     => ['type' => BaseModel::TYPE_INT],
    ];
}

