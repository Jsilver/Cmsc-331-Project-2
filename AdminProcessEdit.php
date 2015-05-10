<?php
session_start();

if ($_POST["next"] == "Group"){
	$_SESSION["advisor"] = $_POST["next"];
	header('Location: AdminEditGroup.php');
}
elseif ($_POST["next"] == "Individual"){
	header('Location: AdminEditInd.php');
}

?>