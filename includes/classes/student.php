<?php 

/* 
	BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

require_once(INCLUDES_PATH.DS."config.php");
require_once(CLASSES_PATH.DS."database.php");

class Student extends DatabaseObject
{
	protected static $table_name 	= T_STUDENTS;
	protected static $col_id 		= C_STUDENT_ID;

	protected static $fields = array
									(
										C_STUDENT_STUDENTID, 
										C_STUDENT_PERSONAL_INFORMATION_ID, 
										C_STUDENT_SCHOOL_LAST_ATTENDED_ID,
										C_STUDENT_INQUIRY_ID, 
										C_STUDENT_SCHOOL_CONSIDERED_ID, 
										C_STUDENT_STI_DISCOVERY_ID, 
										C_STUDENT_ENROLLMENT_DETAIL_ID, 
										C_STUDENT_APPOINTMENT_DETAIL_ID, 
										C_STUDENT_DATETIME
									);

	public $id;
	public $studentid;
	public $personal_information_id;
	public $school_last_attended_id;
	public $inquiry_id;
	public $school_considered_id;
	public $sti_discovery_id;
	public $enrollment_detail_id;
	public $appointment_detail_id;
	public $datetime;

	protected static function instantiate($record)
	{
		$this_class = new self;

		$this_class->id 							= $record[C_STUDENT_ID];
		$this_class->studentid 						= $record[C_STUDENT_STUDENTID];
		$this_class->personal_information_id 		= $record[C_STUDENT_PERSONAL_INFORMATION_ID];
		$this_class->school_last_attended_id 		= $record[C_STUDENT_SCHOOL_LAST_ATTENDED_ID];
		$this_class->inquiry_id 					= $record[C_STUDENT_INQUIRY_ID];
		$this_class->school_considered_id 			= $record[C_STUDENT_SCHOOL_CONSIDERED_ID];
		$this_class->sti_discovery_id 				= $record[C_STUDENT_STI_DISCOVERY_ID];
		$this_class->enrollment_detail_id 			= $record[C_STUDENT_ENROLLMENT_DETAIL_ID];
		$this_class->appointment_detail_id 			= $record[C_STUDENT_APPOINTMENT_DETAIL_ID];
		$this_class->datetime 						= $record[C_STUDENT_DATETIME];

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