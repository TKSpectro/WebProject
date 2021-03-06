<?php

namespace app\models;
 

class ProdCat extends BaseModel
{
    const TABLENAME = '`prodCat`';

    protected $schema = [
        'prodCatID'        => ['type' => BaseModel::TYPE_INT],
        'createdAt'    => ['type' => BaseModel::TYPE_STRING],
        'updatedAt'    => ['type' => BaseModel::TYPE_STRING],
        'descrip'      => ['type' => BaseModel::TYPE_STRING],
        'catID'      => ['type' => BaseModel::TYPE_STRING]

    ];
}

