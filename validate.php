<?php
	session_start();
	
	$_SESSION["firstName"] = $_POST["firstName"];
	$_SESSION["lastName"] = $_POST["lastName"];
	$_SESSION["email"] = $_POST["email"];
	$_SESSION["umbcID"] = $_POST["umbcID"];

	$_SESSION["postData"] = $_POST;

	$_SESSION["validFN"] = "";
	$_SESSION["validLN"] = "";
	$_SESSION["validE"] = "";
	$_SESSION["validID"] = "";

	if(!preg_match("/[a-zA-Z]+/",$_POST["firstName"])){
		$_SESSION["validFN"] = true;
	}
	else{
		$_SESSION["validFN"] = false;
	}
	
	if(!preg_match("/[a-zA-Z]+/",$_POST["lastName"])){
		$_SESSION["validLN"] = true;
	}
	else{
		$_SESSION["validLN"] = false;
	}

	if(!preg_match("/.+@.+\..+/",$_POST["email"])) {
	  $_SESSION["validE"] = true;
	} else {
	  $_SESSION["validE"] = false;
	}

	if(!preg_match("/[a-zA-Z]+/",$_POST["umbcID"])){
		$_SESSION["validID"] = true;
	}
	else{
		$_SESSION["validID"] = false;
	}	


	if($_SESSION["validFN"] || $_SESSION["validLN"] || $_SESSION["validE"] || $_SESSION["validID"])
	{
		$_POST = array();
		header("Location:index.php");
	}
	else{
		header("Location:classSelect.php");
	}
?>