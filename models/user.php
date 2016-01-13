
<?php

session_start();

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "ukm";

try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}


//include_once 'class.user.php';
$user = new USER($DB_con);
?>


<?php


				//class USER
class USER
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	
	
	
	public function login($uname,$upass,$admtype)
	{
		
			try
		{
			$stmt = $this->db->prepare("SELECT * FROM superadmin WHERE username=:uname ");
			$stmt->execute(array(':uname'=>$uname));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				if(MD5($upass)==$userRow['password'])
				{
					$_SESSION['super_session'] = $userRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}

			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		}

		

			
	

	public function loginukm($uname,$upass,$admtype)
	{
		
		
			try
		{
			$stmt = $this->db->prepare("SELECT * FROM adminukm WHERE username=:uname ");
			$stmt->execute(array(':uname'=>$uname));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				if(MD5($upass)==$userRow['password'])
				{
					$_SESSION['ukm_session'] = $userRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}

			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		}

		
	
	
	public function super_is_loggedin()
	{
		if(isset($_SESSION['super_session']))
		{
			return true;
		}
	}

	public function ukm_is_loggedin()
	{
		if(isset($_SESSION['ukm_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>



