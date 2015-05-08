<?php
session_start();
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

if($_POST["finish"] == 'Cancel'){
	$_SESSION["status"] = "none";
}
else{
	$firstn = $_SESSION["firstN"];
	$lastn = $_SESSION["lastN"];
	$studid = $_SESSION["studID"];
	$major = $_SESSION["major"];
	$email = $_SESSION["email"];
	$advisor = $_SESSION["advisor"];
	$apptime = $_SESSION["appTime"];
	if($_SESSION["studExist"] == false){
		$sql = "insert into Proj2Students (`FirstName`,`LastName`,`StudentID`,`Email`,`Major`) values ('$firstn','$lastn','$studid','$email','$major')";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	}
	
	//regular new schedule
	if($_POST["finish"] == 'Submit'){
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
		
		//update stud status to ''
		$sql = "update `Proj2Students` set `Status` = '' where `StudentID` = '$studid'";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
		
		$_SESSION["status"] = "complete";
	}
	elseif($_POST["finish"] == 'Reschedule'){
		//remove stud from EnrolledID
		$sql = "select * from Proj2Appointments where `EnrolledID` like '%$studid%'";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
		$row = mysql_fetch_row($rs);
		$oldAdvisorID = $row[2];
		$oldAppTime = $row[1];
		$newIDs = str_replace($studid, "", $row[4]);
		
		$sql = "update `Proj2Appointments` set `EnrolledNum` = EnrolledNum-1, `EnrolledID` = '$newIDs' where `AdvisorID` = '$oldAdvisorID' and `Time` = '$oldAppTime'";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
		
		//schedule new app
		if($_SESSION["advisor"] == 'Group'){
			$sql = "select * from Proj2Appointments where `Time` = '$apptime' and `AdvisorID` = 0";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			$row = mysql_fetch_row($rs);
			$groupids = $row[4];
			$sql = "update `Proj2Appointments` set `EnrolledNum` = EnrolledNum+1, `EnrolledID` = '$groupids $studid' where `Time` = '$apptime' and `AdvisorID` = 0";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
		}
		else{
			$sql = "update `Proj2Appointments` set `EnrolledNum` = EnrolledNum+1, `EnrolledID` = '$studid' where `Time` = '$apptime' and `AdvisorID` = '$advisor'";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
		}
		
		//update stud status to ''
		$sql = "update `Proj2Students` set `Status` = '' where `StudentID` = '$studid'";
		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
		
		$_SESSION["status"] = "resch";
	}
}
header('Location: 12StudExit.php');
?>
