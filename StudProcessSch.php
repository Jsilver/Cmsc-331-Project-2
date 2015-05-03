<?php
session_start();
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

if($_POST["finish"] == 'Submit'){
	if($_SESSION["studExist"] == false){
		$firstn = $_SESSION["firstN"];
		$lastn = $_SESSION["lastN"];
		$studid = $_SESSION["studID"];
		$major = $_SESSION["major"];
		$email = $_SESSION["email"];
		$sql = "insert into Proj2Students (`FirstName`,`LastName`,`StudentID`,`Email`,`Major`) values ('$firstn','$lastn','$studid','$email','$major')";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	}
	$advisor = $_SESSION["advisor"];
	$apptime = $_SESSION["appTime"];
	if($_SESSION["advisor"] == 'Group'){
		$sql = "select * from Proj2Appointments where `Time` = '$apptime' and `AdvisorID` = 0";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
		$row = mysql_fetch_row($rs);
		$groupids = $row[4];
		$sql = "update `Proj2Appointments` set `EnrolledNum` = EnrolledNum+1, `EnrolledID` = '$groupids $studid' where `Time` = '$apptime' and `AdvisorID` = 0";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	}
	else{
		$sql = "update `Proj2Appointments` set `EnrolledNum` = EnrolledNum+1, `EnrolledID` = '$studid' where `AdvisorID` = '$advisor' and `Time` = '$apptime'";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	}
	$_SESSION["status"] = "complete";
	
}
else{
	$_SESSION["status"] = "none";
}
header('Location: 02StudHome.php');
//header('Location: 12StudExit.php');
//if stud DNE set student? here? {}
//if postFINISH = submit {
//if stud DNE set student? or here?
//set everything: stud info & update}
//header:Home
?>
