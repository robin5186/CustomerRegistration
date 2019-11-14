<?php

$username = filter_input(INPUT_POST, 'user');
$usercode = filter_input(INPUT_POST, 'uscod');
$address = filter_input(INPUT_POST,'adres');
if(!empty($username))
{
	if(!empty($usercode))
	{
		if(!empty($address))
		{
			$host = "localhost";
			$dbusername = "root";
			$dbusercode = "";
			$dbaddress = "";
			$dbname = "youtube";
		
			$conn = new mysqli ($host, $dbusername, $dbusercode, $dbname);
			
			if(mysqli_connect_error())
			{
				die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
			}
			else
			{
				$sql = "INSERT INTO user (username, usercode, address) values ('$username','$usercode','$address')";
				if($conn->query($sql))
				{
					echo "new record is inserted succesfully";
					echo '<a href="http://localhost/web/pop1.php">click here to see the records</a>';
				}
				else
				{
					echo "error: ".$sql ."<br>".$conn->error;
				}
				$conn->close();
			}
		}
		else
		{
			echo "Address should not be empty";
			die();
		}
	}
	else
	{
		echo "usercode should not be empty";
		die();
	}
}
else
{
	echo "username shoud not be empty";
	die();
}

?>