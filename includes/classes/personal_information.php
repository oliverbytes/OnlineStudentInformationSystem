<?php 

/* 
	BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

require_once(INCLUDES_PATH.DS."config.php");
require_once(CLASSES_PATH.DS."database.php");

class PersonalInformation extends DatabaseObject
{
	protected static $table_name 	= T_PERSONAL_INFORMATIONS;
	protected static $col_id 		= C_PERSONAL_INFORMATION_ID;

	protected static $fields = array
									(
										C_PERSONAL_INFORMATION_STUDENTID, 
										C_PERSONAL_INFORMATION_FIRSTNAME, 
										C_PERSONAL_INFORMATION_LASTNAME,
										C_PERSONAL_INFORMATION_MIDDLENAME, 
										C_PERSONAL_INFORMATION_ADDRESS, 
										C_PERSONAL_INFORMATION_FATHER, 
										C_PERSONAL_INFORMATION_MOTHER, 
										C_PERSONAL_INFORMATION_GUARDIAN, 
										C_PERSONAL_INFORMATION_GENDER, 
										C_PERSONAL_INFORMATION_CIVILSTATUS, 
										C_PERSONAL_INFORMATION_CITIZENSHIP, 
										C_PERSONAL_INFORMATION_BIRTHDAY, 
										C_PERSONAL_INFORMATION_EMAIL, 
										C_PERSONAL_INFORMATION_CONTACTNUMBER1, 
										C_PERSONAL_INFORMATION_CONTACTNUMBER2, 
										C_PERSONAL_INFORMATION_CONTACTNUMBER3, 
										C_PERSONAL_INFORMATION_EMERGENCY_CONTACT_PERSON, 
										C_PERSONAL_INFORMATION_DATETIME
									);

	public $id;
	public $studentid 				= "";
	public $firstname 				= "";
	public $lastname 				= "";
	public $middlename 				= "";
	public $address 				= "";
	public $father 					= "";
	public $mother 					= "";
	public $guardian 				= "";
	public $gender 					= "";
	public $civilstatus 			= "";
	public $citizenship 			= "";
	public $birthday 				= "";
	public $email 					= "";
	public $contactnumber1 			= "";
	public $contactnumber2 			= "";
	public $contactnumber3 			= "";
	public $emergencycontactperson 	= "";
	public $datetime 				= "";

	protected static function instantiate($record)
	{
		$this_class = new self;

		$this_class->id 							= $record[C_PERSONAL_INFORMATION_ID];
		$this_class->studentid 						= $record[C_PERSONAL_INFORMATION_STUDENTID];
		$this_class->firstname 						= $record[C_PERSONAL_INFORMATION_FIRSTNAME];
		$this_class->lastname 						= $record[C_PERSONAL_INFORMATION_LASTNAME];
		$this_class->middlename 					= $record[C_PERSONAL_INFORMATION_MIDDLENAME];
		$this_class->address 						= $record[C_PERSONAL_INFORMATION_ADDRESS];
		$this_class->father 						= $record[C_PERSONAL_INFORMATION_FATHER];
		$this_class->mother 						= $record[C_PERSONAL_INFORMATION_MOTHER];
		$this_class->guardian 						= $record[C_PERSONAL_INFORMATION_GUARDIAN];
		$this_class->gender 						= $record[C_PERSONAL_INFORMATION_GENDER];
		$this_class->civilstatus 					= $record[C_PERSONAL_INFORMATION_CIVILSTATUS];
		$this_class->citizenship 					= $record[C_PERSONAL_INFORMATION_CITIZENSHIP];
		$this_class->birthday 						= $record[C_PERSONAL_INFORMATION_BIRTHDAY];
		$this_class->email 							= $record[C_PERSONAL_INFORMATION_EMAIL];
		$this_class->contactnumber1 				= $record[C_PERSONAL_INFORMATION_CONTACTNUMBER1];
		$this_class->contactnumber2 				= $record[C_PERSONAL_INFORMATION_CONTACTNUMBER2];
		$this_class->contactnumber3 				= $record[C_PERSONAL_INFORMATION_CONTACTNUMBER3];
		$this_class->emergencycontactperson 		= $record[C_PERSONAL_INFORMATION_EMERGENCY_CONTACT_PERSON];
		$this_class->datetime 						= $record[C_PERSONAL_INFORMATION_DATETIME];

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

	public static function get_by_studentid($studentid="")
	{
		global $db;

		$studentid 	= $db->escape_string($studentid);
		
		$sql = "SELECT * FROM " . self::$table_name;
		$sql .= " WHERE " 	. C_PERSONAL_INFORMATION_STUDENTID . " = '" . $studentid . "'";
		$sql .= " LIMIT 1";
		
		$result = self::get_by_sql($sql);

		return !empty($result) ? array_shift($result) : null;
	}
}

?>