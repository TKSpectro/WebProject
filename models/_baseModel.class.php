<?php

namespace app\models;

abstract class BaseModel
{
    const TYPE_INT = 'int';
    const TYPE_FLOAT = 'float';
    const TYPE_STRING = 'string';

    protected $schema = [];
    protected $data = [];


    public function __construct($params)
    {
       
       foreach ($this->schema as $key => $value)
        {
            if (isset($params[$key]))
            {
                $this->{$key} = $params[$key];
            }
            else
            {   
                $this->{$key} = null;
            }
        }
    
    }

   public function __get($key)
    {
        if (array_key_exists($key, $this->data))
        {
            return $this->data[$key];
        }
        throw new \Exception('You can not access to property"' . $key . '"" for the class "' . get_called_class());
    }

    public function __set($key, $value)
    {
        if (array_key_exists($key, $this->schema))
        {
            $this->data[$key] = $value;
            return;
        }
        throw new \Exception('You can not write to property "' . $key . '"" fpr the class "' . get_called_class());
    }



    public function insert(&$errors)
    {
        $db = $GLOBALS['db'];
       
        try
        {
         
            $sql = 'INSERT INTO ' . self::tablename() . ' (';
            $valueString = ' VALUES (';
            
            foreach ($this->schema as $key => $schemaOptions)
            {
                $sql .= '`' . $key . '`,';

                if ($this->data[$key] === null)
                {
                    $valueString .= 'NULL,';
                }
                else
                {
                    $valueString .= $db->quote($this->data[$key]) . ',';
                }
            }

            $sql            = trim($sql, ',');
            $valueString    = trim($valueString, ',');
            $sql           .= ')'.$valueString. ');' ; 
            $statement      = $db->prepare($sql);
            $statement->execute();

            return true;
        }
        catch (\PDOException $e)
        {
            $errors[] = 'Error inserting ' . get_called_class();
        }
        return false;
    }

    public function update(&$errors,$where = '')
    {
        $db = $GLOBALS['db'];

        try
        {
            $sql = 'UPDATE ' . self::tablename() . ' SET ';
            foreach ($this->schema as $key => $schemaOptions)
            {
                if ($this->data[$key] !== null)
                {
                    $sql .= $key . ' = ' . $db->quote($this->data[$key]) . ',';
                }
            }

            $sql = trim($sql, ',');
            $sql .= ' WHERE ' . $where . ';';

            $statement = $db->prepare($sql);
            $statement->execute();

            return true;
        }
        catch (\PDOException $e)
        {
            $errors[] = 'Error updating ' . get_called_class();
        }
        return false;
    }

    public function delete(&$errors = null,$where)
    {
        $db = $GLOBALS['db'];

        try
        {
            $sql = 'DELETE FROM ' . self::tablename() . ' WHERE '.$where;
            $db->exec($sql);
            return true;
        }
        catch (\PDOException $e)
        {
            $errors[] = 'Error deleting' . get_called_class();
        }
        return false;
    }

    public function validate(&$errors = null)
    {
        foreach ($this->schema as $key => $schemaOptions)
        {
            if (isset($this->data[$key]) && is_array($schemaOptions))
            {
                $valueErrors = $this->validateValue($key, $this->data[$key], $schemaOptions);

                if ($valueErrors !== true)
                {
                    array_push($errors, ...$valueErrors);
                }
            }
        }
        if (count($errors) === 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    protected function validateValue($attribute, &$value, &$schemaOptions)
    {
        $type = $schemaOptions['type'];
        $errors = [];

        switch ($type)
        {
            case BaseModel::TYPE_INT:
                break;
            case BaseModel::TYPE_FLOAT:
                break;
            case BaseModel::TYPE_STRING:
                {
                    if (isset($schemaOptions['min']) && mb_strlen($value) < $schemaOptions['min'])
                    {
                        $errors[] = $attribute . ': String need min. ' . $schemaOptions['min'] . ' characters!';
                    }

                    if (isset($schemaOptions['max']) && mb_strlen($value) > $schemaOptions['max'])
                    {
                        $errors[] = $attribute . ': String can have max. ' . $schemaOptions['max'] . ' characters!';
                    }
                }
                break;
        }
        return count($errors) > 0 ? $errors : true;
    }

    public static function tablename()
    {
        
        $class = get_called_class();
        if (defined($class . '::TABLENAME'))
        {
            return $class::TABLENAME;
        }
        return null;
    }

    public static function find($where = '')
    {
        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT * FROM ' . self::tablename();

            if (!empty($where))
            {
                $sql .= ' WHERE ' . $where . ';';
            }

            $result = $db->query($sql)->fetchAll();
        }
        catch (\PDOException $e)
        {
            die('Select statment failed: ' . $e->getMessage());
        }

        return $result;
    }

    function validateInput($str, $check)
{
    if(is_array($check))
    {
        foreach($check as $checkValue)
        {
            if (strpos($str, $checkValue) !== false)
            {
                // vorzeitiges Beenden der Funktion
                return false;
            }
        }
    }
    else
    {
        if (strpos($str, $check)!==false)
        {
            // vorzeitiges Beenden der Funktion
            return false;
        }
        
    }
    return true;
}

}