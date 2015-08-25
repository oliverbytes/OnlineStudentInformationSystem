<?php 

/* 
	BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

require_once(INCLUDES_PATH.DS."config.php");
require_once(CLASSES_PATH.DS."database.php");

class AppointmentDetail extends DatabaseObject
{
	protected static $table_name 	= T_APPOINTMENT_DETAILS;
	protected static $col_id 		= C_APPOINTMENT_DETAIL_ID;

	protected static $fields = array
									(
										C_APPOINTMENT_DETAIL_STUDENTID, 
										C_APPOINTMENT_DETAIL_VISITSCHEDULE, 
										C_APPOINTMENT_DETAIL_VISITPURPOSE,
										C_APPOINTMENT_DETAIL_OFFICER, 
										C_APPOINTMENT_DETAIL_DATETIME
									);

	public $id;
	public $studentid 			= "";
	public $visitschedule 		= "";
	public $visitpurpose 		= "";
	public $officer 			= "";
	public $datetime;

	protected static function instantiate($record)
	{
		$this_class = new self;

		$this_class->id 			= $record[C_APPOINTMENT_DETAIL_ID];
		$this_class->studentid 		= $record[C_APPOINTMENT_DETAIL_STUDENTID];
		$this_class->visitschedule 	= $record[C_APPOINTMENT_DETAIL_VISITSCHEDULE];
		$this_class->visitpurpose 	= $record[C_APPOINTMENT_DETAIL_VISITPURPOSE];
		$this_class->officer 		= $record[C_APPOINTMENT_DETAIL_OFFICER];
		$this_class->datetime 		= $record[C_APPOINTMENT_DETAIL_DATETIME];

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