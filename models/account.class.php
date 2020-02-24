<?php

namespace app\models;
 

class Account extends BaseModel
{
    const TABLENAME = '`account`';

    protected $schema = [
        'accountID'    => ['type' => BaseModel::TYPE_INT],
        'createdAt'    => ['type' => BaseModel::TYPE_STRING],
        'updatedAt'    => ['type' => BaseModel::TYPE_STRING],
        'firstname'    => ['type' => BaseModel::TYPE_STRING, 'min' => 2, 'max' => 45],
        'lastname'     => ['type' => BaseModel::TYPE_STRING, 'min' => 2, 'max' => 45],
        'email'        => ['type' => BaseModel::TYPE_STRING],
        'passwordHash' => ['type' => BaseModel::TYPE_STRING],
        'birthday'     => ['type' => BaseModel::TYPE_STRING],
        'mobile'       => ['type' => BaseModel::TYPE_STRING],
        'phone'        => ['type' => BaseModel::TYPE_STRING]
    ];

}


