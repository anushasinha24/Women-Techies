<!DOCTYPE html>
<html>

<body>

<?php

	$name = $_POST['name'];
	$email = $_POST['email'];
	$mob = $_POST['mob'];
	$dob = $_POST['dob'];
	$type = $_POST['type'];
	$pass = $_POST['conf-pwd'];
	
	$mysqlport = getenv('S2G_MYSQL_PORT');
	$dbhost = "localhost".$mysqlport;
	$dbuser = 'root';
	$dbpass = '';
	$connect = mysql_connect($dbhost, $dbuser, $dbpass);
	
	$flag=0;
	$active=1;
	
	mysql_select_db('girlgurus');
	$insertquery = "INSERT INTO Users (Name, Email, Mobile, Date Of Birth, Type, Password, Active) VALUES ('$name', '$email', '$mob', '$dob', '$type', '$pass', '$active')";
	if(mysql_query($insertquery , $connect))
			$flag=1;
	if($flag==1)
	{
		header('Location: login.php');
	}
	else
	{
		echo "Account with the given email id or registration number already exists. If you have forgotten your password, <a href='forgot.html'>click here</a>";
	}
	mysql_close($connect);
?>

</body>
</html>