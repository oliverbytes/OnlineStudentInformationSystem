<?php 

/* 
	BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

require_once(INCLUDES_PATH.DS."config.php");
require_once(CLASSES_PATH.DS."database.php");

class EnrollmentDetail extends DatabaseObject
{
	protected static $table_name 	= T_ENROLLMENT_DETAILS;
	protected static $col_id 		= C_ENROLLMENT_DETAIL_ID;

	protected static $fields = array
									(
										C_ENROLLMENT_DETAIL_STUDENTID, 
										C_ENROLLMENT_DETAIL_STATUS, 
										C_ENROLLMENT_DETAIL_PROGRAM,
										C_ENROLLMENT_DETAIL_SCHEDULE, 
										C_ENROLLMENT_DETAIL_PAYMENT, 
										C_ENROLLMENT_DETAIL_STUDENTCONTACTNUMBER, 
										C_ENROLLMENT_DETAIL_DATETIME
									);

	public $id;
	public $studentid 				= "";
	public $status 					= "";
	public $program 				= "";
	public $schedule 				= "";
	public $payment 				= "";
	public $studentcontactnumber 	= "";
	public $datetime;

	protected static function instantiate($record)
	{
		$this_class = new self;

		$this_class->id 						= $record[C_ENROLLMENT_DETAIL_ID];
		$this_class->studentid 					= $record[C_ENROLLMENT_DETAIL_STUDENTID];
		$this_class->status 					= $record[C_ENROLLMENT_DETAIL_STATUS];
		$this_class->program 					= $record[C_ENROLLMENT_DETAIL_PROGRAM];
		$this_class->schedule 					= $record[C_ENROLLMENT_DETAIL_SCHEDULE];
		$this_class->payment 					= $record[C_ENROLLMENT_DETAIL_PAYMENT];
		$this_class->studentcontactnumber 		= $record[C_ENROLLMENT_DETAIL_STUDENTCONTACTNUMBER];
		$this_class->datetime 					= $record[C_ENROLLMENT_DETAIL_DATETIME];

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
}

?>