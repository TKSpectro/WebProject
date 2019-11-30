<?php


namespace app\models;

class Address extends \app\core\BaseModel
{
    const TABLENAME = '`address`';

    protected $schema = [
        'addressID' => ['type' => BaseModel::TYPE_INT],
        'createdAt' => ['type' => BaseModel::TYPE_STRING],
        'updatedAt' => ['type' => BaseModel::TYPE_STRING],
        'land' => ['type' => BaseModel::TYPE_STRING, 'min' => 2, 'max' => 45],
        'city' => ['type' => BaseModel::TYPE_STRING, 'min' => 2, 'max' => 45],
        'street' => ['type' => BaseModel::TYPE_STRING],
        'houseNumber' => ['type' => BaseModel::TYPE_INT],
        'zip' => ['type' => BaseModel::TYPE_STRING],
    ];

    static function findAll()
    {
        $db = $GLOBALS['database'];

        $result = [];

        try
        {
            $dbResult = $db->query('SELECT * FROM account WHERE 1')->fetchAll();

            foreach ($dbResult as $index => $dbAccountObj)
            {
                $accountObj = new Account($dbAccountObj);
                $result[] = $accountObj;
            }
        }
        catch (\PDOException $e)
        {
            // TODO: Handle Error!!
        }

        return $result;
    }


    public function fullname()
    {
        return ($this->firstname ?? '') . ' ' . ($this->lastname ?? '');
    }
}


