<?php
session_start();

$_SESSION["UserN"] = strtoupper($_POST["UserN"]);
$_SESSION["PassW"] = strtoupper($_POST["PassW"]);

header('Location: AdminUI.php');
?>