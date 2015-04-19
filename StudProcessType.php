<?php
session_start();
if ($_POST["type"] == "Group"){
	$_SESSION["advisor"] = $_POST["type"];
	header('Location: 08StudSelectTime.php');
}
elseif ($_POST["type"] == "Individual"){
	header('Location: 07StudSelectAdvisor.php');
}
?>