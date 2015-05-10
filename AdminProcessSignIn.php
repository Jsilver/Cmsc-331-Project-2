<?php
session_start();

include('../CommonMethods.php');
$debug = false;
$Common = new Common($debug);

$_SESSION["UserN"] = strtoupper($_POST["UserN"]);
$_SESSION["PassW"] = strtoupper($_POST["PassW"]);
$_SESSION["UserVal"] = false;

$user = $_SESSION["UserN"];
$pass = $_SESSION["PassW"];

$sql = "SELECT * FROM `Proj2Advisors` WHERE `Username` = '$user' AND `Password` = '$pass'";
$rs = $Common->executeQuery($sql, "Advising Appointments");
$row = mysql_fetch_row($rs);

if($row){
	header('Location: AdminUI.php');
}
else{
	$_SESSION["UserVal"] = true;
	header('Location: AdminSignIn.php');
}

?>