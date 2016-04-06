<html>
<head>
<link rel="stylesheet" type="text/css" href="design.css">
<div id="head">

</div>
<br>
</head>
<body>
<div id="main">
<?php

include('CommonMethods.php');
$COMMON = new COMMON($debug);
$debug = false;

$cmsc2xx = array("201", "202", "203", "232", "291", "299");

$cmsc3xx = array("304", "313", "331", "341", "352", "391");

$cmsc4xx = array("404", "411", "421", "426", "427", "431", "432", "433", "435", "436", "437", "441", "442", "443", "444", "446", "447", "448", "451", "452", "453", "455", "456", "457", "461", "465", "466", "471", "473", "475", "476", "477", "478", "479", "481", "483", "484", "487", "491", "493", "495", "498", "499");

$sql = "INSERT INTO `qq45691`.`2XX` (`USER`) VALUES ('$_POST[id]');
$rs = $COMMON->executeQuery($sql, $_SERVER["Script_Name"]);

$sql = "INSERT INTO `qq45691`.`3XX` (`USER`) VALUES ('$_POST[id]');
$rs = $COMMON->executeQuery($sql, $_SERVER["Script_Name"]);

$sql = "INSERT INTO `qq45691`.`4XX` (`USER`) VALUES ('$_POST[id]');
$rs = $COMMON->executeQuery($sql, $_SERVER["Script_Name"]);

//take names from pool and put into array
$id = $_POST['id'];
$taken = $_POST['taken'];
$req = $_POST['required'];
$wi = $_POST['wi'];
$elec = $_POST['elective'];

$cmsc = "CMSC";
$class = $cmsc . $taken;

//check if entered class exists

if (inarray($taken, $cmsc2xx)){
	echo "2xx";
	$sql = "UPDATE `qq45691`.`2XX` SET '$class' = 1 WHERE `USER` = '$id'";
	
	
}
else if(inarray($taken, $cmsc3xx)){
	echo"3xx";
	$sql = "UPDATE `qq45691`.`3XX` SET '$class' = 1 WHERE `USER` = '$id'";
	
}
else if(inarray($taken, $cmsc4xx)){
	echo"4xx";
	$sql = "UPDATE `qq45691`.`4XX` SET '$class' = 1 WHERE `USER` = '$id'";
	
}
else{
	echo "class does not exist\n";
	//redirect to fill out page with new message 
}

$rs = $COMMON->executeQuery($sql, $_SERVER["Script_Name"]);	
 
?>
</div>
</body>
<footer>
</footer>
</html>
