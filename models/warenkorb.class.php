<?php

namespace app\models;
 

class Warenkorb extends BaseModel
{
    const TABLENAME = '`warenkorb`';

    protected $schema = [
       
        'warenkorbID'  => ['type' => BaseModel::TYPE_INT],
        'createdAt'    => ['type' => BaseModel::TYPE_STRING],
        'updatedAt'    => ['type' => BaseModel::TYPE_STRING],
        'prodID'       => ['type' => BaseModel::TYPE_INT]
    ];
}
