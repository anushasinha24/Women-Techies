<?php 
	session_start(); 


    $username = $_POST["UserName"];
    $password = $_POST["Password"];
	$type = $_POST["type"];
	$mysqlport = getenv('S2G_MYSQL_PORT');
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";

    $connect = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_select_db('girlgurus');
	
	$_SESSION['error'] = 0;
 
    $search_query = "SELECT * FROM Users WHERE RegNO = '$username' AND Password = '$password' AND Type='$type'";

    $result = mysql_query($search_query,$connect);
	
	$row = mysql_fetch_assoc($result);
	
	if(empty($row)
	{
		$_SESSION['error']=1;	
		header("Location:login.php");
	}
    else if(!empty($row)&&($type=="V"))
	{
		$_SESSION['id'] = $row1['ID'];
		$_SESSION['volunteer']==1;
		$_SESSION['learner']==0;
	}
	else if(!empty($row)&&($type=="L"))
	{
		$_SESSION['id'] = $row1['ID'];
		$_SESSION['volunteer']==0;
		$_SESSION['learner']==1;
	}
	header("Location:dashboard.php");
	
	mysql_close($connect);
?>
