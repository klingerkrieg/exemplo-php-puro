<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['email'] == "") {
	Header("Location:index.php");
}


include 'menu.php';
?>
