<?php 

/* 
	BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

require_once(INCLUDES_PATH.DS."config.php");
require_once(CLASSES_PATH.DS."database.php");

class User extends DatabaseObject
{
	protected static $table_name 	= T_USERS;
	protected static $col_id 		= C_USER_ID;

	protected static $fields = array
									(
										C_USER_LEVEL, 
										C_USER_NAME, 
										C_USER_USERNAME,
										C_USER_PASSWORD, 
										C_USER_DATETIME
									);

	public $id;
	public $level;
	public $name;
	public $username;
	public $password;
	public $datetime;

	protected static function instantiate($record)
	{
		$this_class = new self;

		$this_class->id 			= $record[C_USER_ID];
		$this_class->level 			= $record[C_USER_LEVEL];
		$this_class->name 			= $record[C_USER_NAME];
		$this_class->username 		= $record[C_USER_USERNAME];
		$this_class->password 		= $record[C_USER_PASSWORD];
		$this_class->datetime 		= $record[C_USER_DATETIME];

		return $this_class;
	}

	public function create()
	{
		global $db;

		$sql = "INSERT INTO ".self::$table_name." (";

		$fieldIndex = 0;

		foreach (self::$fields as $field) 
		{
			$fieldIndex++;

			$endstring = ",";

			if($fieldIndex == count(self::$fields))
			{
				$endstring = "";
			}

			$sql .= $field.$endstring;
		}

		// ------------------------------------------------------------- //

		$sql .=") VALUES (";

		$classpropertycount = count(get_object_vars($this));

		$ignoreFields = array(self::$col_id);

		$classIndex = 0;

		foreach ($this as $property => $value) 
		{
			$classIndex++;

			$endstring = ",";

			if($classIndex == ($classpropertycount - count($ignoreFields)) + 1)
			{
				$endstring = "";
			}

			if(!in_array($property, $ignoreFields))
			{
				$sql .= "'".$value."'".$endstring;
			}
		}

		$sql .=")";

		// ------------------------------------------------------------- //

		if($db->query($sql))
		{
			$this->id = $db->get_last_id();
			return true;
		}
		else
		{
			return false;	
		}
	}
	
	public function update()
	{
		global $db;

		$sql = "UPDATE ".self::$table_name." SET ";

		$classpropertycount = count(get_object_vars($this));

		$ignoreFields = array(self::$col_id);

		$classIndex = 0;

		foreach ($this as $property => $value) 
		{
			$classIndex++;

			$endstring = ",";

			if($classIndex == ($classpropertycount - count($ignoreFields)) + 1)
			{
				$endstring = "";
			}

			if(!in_array($property, $ignoreFields))
			{
				$sql .= $property."='".$value."'".$endstring;
			}
		}


		$sql .=" WHERE " . self::$col_id . "=" . $db->escape_string($this->id) 				. "";

		$db->query($sql);

		return ($db->get_affected_rows() == 1) ? true : false;
	}

	public function delete()
	{
		global $db;

		$sql = "DELETE FROM " . self::$table_name . " WHERE " . self::$col_id . "=" . $this->id . "";
		$db->query($sql);

		return ($db->get_affected_rows() == 1) ? true : false;
	}

	public static function username_exists($username)
	{
		global $db;

		$username 		= $db->escape_string($username);
		$sql 			= "SELECT * FROM " . self::$table_name . " WHERE " . C_USER_USERNAME . " = '" . $username . "'";
		$result 		= $db->query($sql);

		return ($db->get_num_rows($result) == 1) ? true : false;
	}

	public static function login($username="", $password="")
	{
		global $db;

		$username 	= $db->escape_string($username);
		$password 	= $db->escape_string($password);
		
		$sql = "SELECT * FROM " . self::$table_name;
		$sql .= " WHERE " 	. C_USER_USERNAME . " = '" . $username . "'";
		$sql .= " AND " 	. C_USER_PASSWORD . " = '" . $password . "'";
		$sql .= " LIMIT 1";
		
		$result = self::get_by_sql($sql);

		return !empty($result) ? array_shift($result) : null;
	}
}

?>