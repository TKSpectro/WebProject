<?php


namespace app\models;

class Product /*extends \app\core\BaseModel*/
{
	protected $attributes = [
		'id' => null,
		'createdAt' => null,
		'updatedAt' => null,
		'name' => null,
		'number' => null,
		'price' => null
	];

	// TODO: MOVE TO BASEMODEL
	function __construct($dbData)
	{
		foreach ($this->attributes as $key => $value)
		{
			if(isset($dbData[$key]))
			{
				$this->attributes[$key] = $dbData[$key];
			}
		}
	}

	// TODO: MOVE TO BASEMODEL
	public function __get($key)
	{
		if(isset($this->attributes[$key]))
		{
			return $this->attributes[$key];
		}

		throw 'Access Wrong!';
	}

	// TODO: MOVE TO BASEMODEL
	public function __set($key, $value)
	{
		if(isset($this->attributes[$key]))
		{
			$this->attributes[$key] = $value;
		}

		throw 'Access Wrong!';
	}



	static function findAll()
	{
		$db = $GLOBALS['database'];

		$result = [];

		try
		{
		 	$dbResult = $db->query('SELECT * FROM product WHERE 1')->fetchAll();

		 	foreach($dbResult as $index => $dbAccountObj)
		 	{
		 		$accountObj = new Product($dbAccountObj);
		 		$result[] = $accountObj;
		 	}
		}
		catch(\PDOException $e)
		{
			// TODO: Handle Error!!
		}

		return $result;
	}

	static function findOne($id)
	{
		$db = $GLOBALS['database'];

		$result = null;

		try
		{
		 	$dbObj = $db->query('SELECT * FROM product WHERE id = '.$db->quote($id))->fetch();

		 	if($dbObj)
		 	{
		 		$result = new Product($dbObj);
		 	}
		}
		catch(\PDOException $e)
		{
			// TODO: Handle Error!!
		}

		return $result;
	}
}