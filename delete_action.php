<?php
session_start();

if(isset($_SESSION["user_name"]) && $_SESSION["user_name"]!=""){
} else {
	header ("Location: index.html");
}
/** getting id for deleting the record from user **/
$id = $_REQUEST["id"];
//echo $id;

/** database connection **/
require ("functions.php");
$con = dbConnect();

$del_sql = "DELETE FROM `employee` WHERE `employee`.`id` = '$id'";
//var_dump($del_sql);

$del_data = $con->query($del_sql);
//var_dump($del_data);

header("Location:atables.php");

?>
