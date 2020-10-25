<?php
$uname = $_POST["uname"];
$pwd = $_POST["pwd"];

require ("functions.php");
$con = dbConnect();


/**connection to database 2nd method**/
$result = mysqli_query($con, "SELECT * FROM admin WHERE username = '$uname' and password = '$pwd'") or die("Failed to query dtabase".mysqli_error($con));
$row = mysqli_fetch_array($result);
	if($row['username'] == $uname && $row['password'] == $pwd){
		session_start();
		$_SESSION['user_name'] = $row['username'];
		header ("Location: adashboard.php");
	} else {
		header ("Location: alogin.php?msg=Username or password is incorrect");
	}

?>
