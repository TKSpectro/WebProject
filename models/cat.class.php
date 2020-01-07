<?php

namespace app\models;
 

class Cat extends BaseModel
{
    const TABLENAME = '`cat`';

    protected $schema = [
        'catID'       => ['type' => BaseModel::TYPE_INT],
        'createdAt'    => ['type' => BaseModel::TYPE_STRING],
        'updatedAt'    => ['type' => BaseModel::TYPE_STRING],
        'descrip'      => ['type' => BaseModel::TYPE_STRING]
    ];
}

