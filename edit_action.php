<?php

require ("functions.php");
session_start();

if(isset($_SESSION["user_name"]) && $_SESSION["user_name"]!=""){
} else {
	header ("Location: index.php");
}

$name = $_REQUEST["name"];
$gender = $_REQUEST["gender"];
$designation = $_REQUEST["designation"];
$phone = $_REQUEST["phone"];
$salary = $_REQUEST["salary"];
$user = $_SESSION['user_name'];
//
// echo $name;
// echo $gender;
// echo $phone ;
// echo $salary;
// echo $user;

$con = dbConnect();

$edit_sql= "UPDATE `employee` SET `name`='$name',`gender`='$gender',`post`='$designation',`salary`='$salary',`contact`='$phone' WHERE `employee`.`name`='$user'";


// var_dump($edit_sql);

$edit_query = $con->query($edit_sql);

// echo $edit_query;

header("Location:etables.php");
?>
