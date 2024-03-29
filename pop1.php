<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="popup.css">
<style>


.modal{
	display: none;
	position: fixed;
	z-index: 1;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgba(0,0,0,0.4);
}
.modal-content{
	background-color: #fefefe;
	margin: 4% auto 15% auto;
	border: 1px solid #888;
	width: 40%;
	padding-bottom: 30px;
}

@keyframes zoom{
	from {transform: scale(0)}
	to {transform: scale(1)}
	}
	
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
<div id="fnt">
<h1 style="text-align:left; font-size:20px; color:#3b3a30"> User Details</h1>
<button onclick="document.getElementById('modal-wrapper').style.display='block'" id="btn" style="width:200px; margin-bottom:10px; margin-left:1000px;">
Add user</button>

<div id="modal-wrapper" class="modal">

<form class="modal-content animate" action="processn.php" method="POST" id="ani">
<span onclick="document.getElementById('modal-wrapper').style.display='none'" id="clo" title="close popup">&times;</span>

<h1 style="text-align:left" id="txt1">Add User</h1>

<div >
<input type="text" id="txt" placeholder="Enter UserName" name="user">
<input type="text" id="txt" placeholder="Enter UserCode" name="uscod">
<input type="text" id="txt" placeholder="Enter User Address" name="adres">
<input type="submit" id="btn1" value="Save">
<span onclick="document.getElementById('modal-wrapper').style.display='none'" id="btn2">cancel</span>
</div>
</form>
</div>
</div>

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


<script>

var modal = document.getELementById('modal-wrapper');
window.onclick = function(event)
{
	if(event.target == modal)
	{
		modal.style.display = "none";
	}
}
</script>

</body>
</html>