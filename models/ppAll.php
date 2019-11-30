<?php


namespace app\models;

class PPAll /*extends \app\core\BaseModel*/
{
	protected $attributes = [
		'id' => null,
		'name' => null,
		'value' => null,
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



	static function findAll($id)
	{
		$db = $GLOBALS['database'];

		$result = [];

		try
		{
		 	$dbResult = $db->query('SELECT * FROM pp_all WHERE id = '.$db->quote($id))->fetchAll();

		 	foreach($dbResult as $index => $dbObj)
		 	{
		 		$obj = new PPAll($dbObj);
		 		$result[] = $obj;
		 	}
		}
		catch(\PDOException $e)
		{
			// TODO: Handle Error!!
		}

		return $result;
	}
}