<?php


namespace app\models;

class Address extends BaseModel
{
    const TABLENAME = '`Address`';
    
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


    

/*
    const TABLENAME = '`Address`';
    public $data;

    public function __construct($country, $land, $street, $hausNr, $zip)
    {
        
        $this->data['city']  = $country;
        $this->data['land']     = $land;
        $this->data['street']   = $street;
        $this->data['houseNumber']   = $hausNr;
        $this->data['zip']      = $zip;
    }
    public function insert()
    {
        $db  = $GLOBALS['db'];

        try
        {
            $sql = 'INSERT INTO ' . self::TABLENAME . ' (city,land,street,houseNumber,zip) 
            VALUES (:city,:land,:street,:houseNumber,:zip)';
            
            $statement = $db->prepare($sql);
            $statement->bindParam(':city',   $this->data['city']);
            $statement->bindParam(':land',      $this->data['land']);
            $statement->bindParam(':street',    $this->data['street']);
            $statement->bindParam(':houseNumber',    $this->data['houseNumber']);
            $statement->bindParam(':zip',       $this->data['zip']);

            $statement->execute();
            return true;
        }
        catch(\PDOException $e)
        {
            die('Error inserting bike: '.$e->getMessage());
        }
        return false;
    }*/

   /* static function findAll()
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
    }*/
}


