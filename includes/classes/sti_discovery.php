<?php 

/* 
	BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

require_once(INCLUDES_PATH.DS."config.php");
require_once(CLASSES_PATH.DS."database.php");

class StiDiscovery extends DatabaseObject
{
	protected static $table_name 	= T_STI_DISCOVERIES;
	protected static $col_id 		= C_STI_DISCOVERY_ID;

	protected static $fields = array
									(
										C_STI_DISCOVERY_STUDENTID, 
										C_STI_DISCOVERY_TV, 
										C_STI_DISCOVERY_RADIO,
										C_STI_DISCOVERY_PRINT, 
										C_STI_DISCOVERY_WEBSITE, 
										C_STI_DISCOVERY_SEMINAR, 
										C_STI_DISCOVERY_CAREERFACTOR,
										C_STI_DISCOVERY_EVENT, 
										C_STI_DISCOVERY_FLYERS, 
										C_STI_DISCOVERY_BILLBOARDS, 
										C_STI_DISCOVERY_POSTERS,
										C_STI_DISCOVERY_STIMULI, 
										C_STI_DISCOVERY_REFERRALS, 
										C_STI_DISCOVERY_OTHERS, 
										C_STI_DISCOVERY_DATETIME
									);

	public $id;
	public $studentid 			= "";
	public $tv 					= "";
	public $radio 				= "";
	public $print 				= "";
	public $website 			= "";
	public $seminar 			= "";
	public $careerfactor 		= "";
	public $event 				= "";
	public $flyers 				= "";
	public $billboards 			= "";
	public $posters 			= "";
	public $stimuli 			= "";
	public $referrals 			= "";
	public $others 				= "";
	public $datetime;

	protected static function instantiate($record)
	{
		$this_class = new self;

		$this_class->id 							= $record[C_STI_DISCOVERY_ID];
		$this_class->studentid 						= $record[C_STI_DISCOVERY_STUDENTID];
		$this_class->tv 							= $record[C_STI_DISCOVERY_TV];
		$this_class->radio 							= $record[C_STI_DISCOVERY_RADIO];
		$this_class->print 							= $record[C_STI_DISCOVERY_PRINT];
		$this_class->website 						= $record[C_STI_DISCOVERY_WEBSITE];
		$this_class->seminar 						= $record[C_STI_DISCOVERY_SEMINAR];
		$this_class->careerfactor 					= $record[C_STI_DISCOVERY_CAREERFACTOR];
		$this_class->event 							= $record[C_STI_DISCOVERY_EVENT];
		$this_class->flyers 						= $record[C_STI_DISCOVERY_FLYERS];
		$this_class->billboards 					= $record[C_STI_DISCOVERY_BILLBOARDS];
		$this_class->posters 						= $record[C_STI_DISCOVERY_POSTERS];
		$this_class->stimuli 						= $record[C_STI_DISCOVERY_STIMULI];
		$this_class->referrals 						= $record[C_STI_DISCOVERY_REFERRALS];
		$this_class->others 						= $record[C_STI_DISCOVERY_OTHERS];
		$this_class->datetime 						= $record[C_STI_DISCOVERY_DATETIME];

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