<html>
<head>
<div id="head">

</div>
<br>
</head>
<body>
<div id="main">
<?php
//session_start();


include("libs.php");
echo "page being used <br>";
//runs algorithm to add classes to DBs
function addClasses($pst){
	//connect to server
	connect("qq45691");

	clearEmpties();
	echo "running addClasses <br>";
	//array of 2XX classes
	$cmsc2xx = array("CMSC201", "CMSC202", "CMSC203", "CMSC232", "CMSC291", "CMSC299");

	//array of 3XX classes
	$cmsc3xx = array("CMSC304", "CMSC313", "CMSC331", "CMSC341", "CMSC352", "CMSC391");

	//array of 4XX classes
	$cmsc4xx = array("CMSC404", "CMSC411", "CMSC421", "CMSC426", "CMSC427", "CMSC431", "CMSC432", "CMSC433", "CMSC435", "CMSC436", "CMSC437", "CMSC441", "CMSC442", "CMSC443", "CMSC444", "446", "CMSC447", "CMSC448", "CMSC451", "CMSC452", "CMSC453", "CMSC455", "CMSC456", "CMSC457", "CMSC461", "CMSC465", "CMSC466", "CMSC471", "CMSC473", "CMSC475", "CMSC476", "CMSC477", "478", "CMSC479", "CMSC481", "CMSC483", "CMSC484", "CMSC487", "CMSC491", "CMSC493", "CMSC495", "CMSC498", "CMSC499");

	//array of math classes
	$maths = array("MATH151","MATH152","MATH221","MATH251","MATH301","MATH430","MATH441","MATH452","MATH475","MATH481","MATH483","STAT355","STAT451");
	//array of science classes
	$science = array("BIOL141", "BIOL142", "CHEM101", "CHEM102", "PHYS121", "PHYS122",
		"BIOL251", "BIOL251L", "BIOL252", "BIOL252L", "BIOL275", "BIOL275L", "BIOL301", "BIOL302L", "BIOL303", "BIOL303L", "BIOL304", "BIOL304L", "BIOL305", "BIOL305L", "CHEM102L", "GES110", "GES111", "GES120", "PHYS122L", "PHYS224", "PHYS304");

	//user ID
	$user = $pst['umbcID'];
	$first = $pst['firstName'];
	$last = $pst['lastName'];
	$email = $pst['email'];


	foreach($pst as $value){
		//check for submit, do nothing if found
		if($value == "Submit"){
			continue;
		}
		else if(in_array($value, $cmsc2xx)){
			//call updateEntry if value is 2XX
			updateEntry("2XX", $value, $user);
			echo "echo 2xx <br>";


		}
		else if(in_array($value, $cmsc3xx)){
			//call updateEntry if value is 3XX
			updateEntry("3XX", $value, $user);
			echo "echo 3xx <br>";

		}
		else if(in_array($value, $cmsc4xx)){
			//call updateEntry if value is 4XX
			updateEntry("4XX", $value, $user);
			echo "echo 4xx <br>";


		}
		else if(in_array($value, $science)){
			//call updateEntry if value is science
			updateEntry("science", $value, $user);
			echo "echo science <br>";


		}
		else if(in_array($value, $maths)){
			//call updateEntry if value is math
			updateEntry("maths", $value, $user);
			echo "echo maths <br>";


		}
		else{
			//value is not class or submit, enter ID num into all tables for updating
			insertID();
		}

		}
}
function clearEmpties(){
	//remove blanks from all tables
	$rs = mysql_query("DELETE FROM `2XX` WHERE `USER`=''");
	$rs = mysql_query("DELETE FROM `3XX` WHERE `USER`=''");
	$rs = mysql_query("DELETE FROM `4XX` WHERE `USER`=''");
	$rs = mysql_query("DELETE FROM `SCIENCE` WHERE `USER`=''");
	$rs = mysql_query("DELETE FROM `MATH` WHERE `USER`=''");
	$rs = mysql_query("DELETE FROM `USERINFO` WHERE `USER`=''");
}

function updateEntry($db, $col, $key){
	//run update query to siginify taken class
	$rs = mysql_query("UPDATE  `$db` SET  `$col` = 1 WHERE  `USER` =  '$key'");
		if(!rs){
 		 die("Invalid query<br>");
		}

}

function insertID(){
	//add ID to all tables for later updating, no duplicate (IGNORE)
	$rs = mysql_query("INSERT INTO `2XX` (`USER`) VALUES ('$user')");
	$rs = mysql_query("INSERT IGNORE INTO `3XX` (`USER`) VALUES ('$user')");
	$rs = mysql_query("INSERT IGNORE INTO `4XX` (`USER`) VALUES ('$user')");
	$rs = mysql_query("INSERT IGNORE INTO `MATH` (`USER`) VALUES ('$user')");
	$rs = mysql_query("INSERT IGNORE INTO `SCIENCE` (`USER`) VALUES ('$user')");
	//insert all info into USERINFO DB
	$rs = mysql_query("INSERT IGNORE INTO `USERINFO` (`FIRST`, `LAST`, `USER`, `EMAIL`) VALUES ('$first','$last','$user','$email')");
	


}
clearEmpties();
disconnect("qq45691");
?>
</div>
</body>
<footer>
</footer>
</html>
