<?php
session_start();

if($_POST["selection"] == 'Signup'){
	header('Location: 03StudSelectType.php');
}
elseif($_POST["selection"] == 'View'){
	header('Location: 04StudViewApp.php');
}
elseif($_POST["selection"] == 'Reschedule'){
	header('Location: 03StudSelectType.php');
}
elseif($_POST["selection"] == 'Cancel'){
	header('Location: 05StudCancelApp.php');
}
elseif($_POST["selection"] == 'Edit'){
	header('Location: 06StudEditInfo.php');
}

?>