<?php


namespace app\models;

class Address extends BaseModel
{
    const TABLENAME = '`address`';
    
    protected $schema = [
        'addressID'   => ['type' => BaseModel::TYPE_INT],
        'createdAt'   => ['type' => BaseModel::TYPE_STRING],
        'updatedAt'   => ['type' => BaseModel::TYPE_STRING],
        'land'        => ['type' => BaseModel::TYPE_STRING, 'min' => 2, 'max' => 45],
        'city'        => ['type' => BaseModel::TYPE_STRING, 'min' => 2, 'max' => 45],
        'street'      => ['type' => BaseModel::TYPE_STRING],
        'houseNumber' => ['type' => BaseModel::TYPE_INT],
        'zip'         => ['type' => BaseModel::TYPE_STRING]
    ];


    


  

}


