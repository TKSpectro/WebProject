<?php


namespace app\models;


class Contact extends BaseModel
{
    const TABLENAME = '`contact`';

    protected $schema = [
        'contactID' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING],
        'email'     => ['type' => BaseModel::TYPE_STRING],
        'subject'   => ['type' => BaseModel::TYPE_STRING],
        'message'   => ['type' => BaseModel::TYPE_STRING]
    ];
}