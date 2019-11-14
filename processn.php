<!DOCTYPE html>
<html>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<body>
<table>
<tr>
<th>Username</th>
<th>Usercode</th>
<th>User Address</th>
</tr>

<?php
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
	else{
	$sql = "SELECT username, usercode, address FROM user";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["username"]. "</td><td>" . $row["usercode"] . "</td><td>" . $row["address"]. "</td></tr>";
		}
		echo "</table>";
	} else { echo "0 results"; }
	}
	$conn->close();

?>
</table>
</body>
</html>
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