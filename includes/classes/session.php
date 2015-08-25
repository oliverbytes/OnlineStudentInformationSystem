<?php 

/* 
	BY NEMORY OLIVER MARTINEZ - nemoryoliver@gmail.com
*/

class Session
{
	private $logged_in;
	public $userid;

	function __construct()
	{
		session_start();
		$this->check_login();
	}

	private function check_login()
	{
		if(isset($_SESSION[C_USER_ID]))
		{
			$this->userid 		= $_SESSION[C_USER_ID];
			$this->logged_in 	= true;
		}
		else
		{
			unset($this->userid);
			
			$this->logged_in = false;
		}
	}
	
	public function is_logged_in()
	{
		return $this->logged_in;
	}
	
	public function login($user)
	{
		if($user)
		{
			$this->userid = $_SESSION[C_USER_ID] = $user->id;
			$this->check_login();
		}
	}
	
	public function logout()
	{
		unset($_SESSION[C_USER_ID]);
		unset($this->userid);

		$this->logged_in = false;
	}
}

$session = new Session();

?>