<?php
/** database connection **/
require ("functions.php");

session_start();
//echo "Hello ".$_SESSION["user_name"];

if(isset($_SESSION["user_name"]) && $_SESSION["user_name"]!=""){
} else {
	header ("Location: index.php");
}
$uname = $_REQUEST["uname"];
$pwd = $_REQUEST["pwd"];
$name = $_REQUEST["name"];
$gender = $_REQUEST["gender"];
$designation = $_REQUEST["designation"];
$phone = $_REQUEST["phone"];
$salary = $_REQUEST["salary"];
$doj = date("Y-m-d");
//
// echo $u_name;
// echo $pwd;
// echo $name;
// echo $gender;
// echo $phone ;
// echo $salary;
// echo $doj;

 //var_dump($add_phn);

$con = dbConnect();
// print_r($con)

$add_sql = "INSERT INTO `employee`(`id`,`username`, `password`, `name`, `gender`, `post`, `salary`, `contact`, `dateofjoining`) VALUES (NULL,'$uname', '$pwd', '$name', '$gender', '$designation', '$salary', '$phone' ,'$doj')";
//var_dump($read_sql);

$add_data = $con->query($add_sql);
// echo "<pre>";
var_dump($add_data);
header("Location:atables.php");

?>
