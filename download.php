<?php
//echo "download.php file";
/** database connection **/
require ("functions.php");
session_start();
if(isset($_SESSION["user_name"]) && $_SESSION["user_name"]!=""){
} else {
	header ("Location: index.php");
}

$con = dbConnect();
/** end database connection **/

/** hard code **/
/*
//data to be downloaded
$data = [
			["sr.no.", "name", "conact"],
			["1", "abc", "325"],
			["2", "xyz", "976"],
];
//echo "<pre>";
//print_r($data);

$filename = 'student.csv'; //file creation

$file = fopen($filename, "w"); //open file in write mode

//puting array in file
foreach($data as $row){
		fputcsv($file, $row);
}


fclose($file); //close  file

//download file
header("Content-Discription: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/csv; ");

readfile($filename);

//deleting file
unlink($filename);
exit();
*/
/** end hard code **/

/** dynamic code **/

//getting download data from database
$select_sql = "SELECT * FROM `employee`";

//	echo $select_sql;

$res = $con->query($select_sql);
//var_dump($res);
//$row_count = mysqli_num_rows($res); //count the no of rows
//echo $row_count;

$filename = 'employees.csv'; //file creation

$file = fopen($filename, "w"); //open file in write mode

fputcsv($file, ["id", "username", "password", "name", "gender", "post", "salary", "password", "contact", "date-of-joining"]);

if (mysqli_num_rows($res) > 0){

	while($row = $res->fetch_row()){

		fputcsv($file, $row);
	}
}

fclose($file); //close  file

//download
header("Content-Discription: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/csv; ");

readfile($filename);

//deleting file
unlink($filename);
exit();

/** end dynamic code **/

?>
