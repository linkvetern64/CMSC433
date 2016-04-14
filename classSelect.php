<?php
	session_start();

	require_once('JSON.php');
	$json = new Services_JSON();
	include("libs.php");
	$_POST = $_SESSION["postData"];
	require("addClass.php");


	function getCourse($course){
		return preg_replace("/[A-z]{3,4}/i", "", $course);
	}

	function getMajor($course){
		return preg_replace("/\d+./","",$course);
	}

	$classes = array(

		"CHEM101" => array("CHEM102" ),
		"CHEM102" => array("CHEM102L", "BIOL141"),
		"CHEM102L" => array("GES110"),

		"BIOL141" => array("BIOL142", "BIOL100L", "PHYS121L", ),
 
		"BIOL100L" => array("PHYS121"),

		"MATH151" => array("MATH152", "MATH221"),
		"MATH152" => array("MATH251", "STAT355"),

 		"PHYS121" => array("PHYS122", "PHYS122L"),
 		"PHYS122" => array("PHYS122L", "GES286L"),
 		"PHYS122L" => array("MATH251"),

		"CMSC201" => array(	"CMSC202" ),
		"CMSC202" => array(	"CMSC203" ,"CMSC304" ,"CMSC484" ,"CMSC486"),
		"CMSC203" => array(	"CMSC313" ,"CMSC331" ,"CMSC341" ,"CMSC451" ,"CMSC452" ,"CMSC457" ),
		"CMSC313" => array(	"CMSC411" ,"CMSC421" ,"CMSC435" ),
		"CMSC331" => array(	"CMSC431" ,"CMSC432" ,"CMSC433" ,"CMSC473" ),
		"CMSC341" => array(	"CMSC421" ,"CMSC427" ,"CMSC431" ,"CMSC435" ,"CMSC436" ,"CMSC437" ,"CMSC441" ,"CMSC443" ,
							"CMSC453" ,"CMSC455" ,"CMSC456" ,"CMSC461" ,"CMSC471" ,"CMSC476" ,"CMSC475" ,"CMSC481" ),
		"CMSC421" => array(	"CMSC426" ,"CMSC483" ,"CMSC487" ),
		"CMSC435" => array(	"CMSC493" ),
		"CMSC461" => array(	"CMSC465" ,"CMSC466" ),
		"CMSC471" => array(	"CMSC493" ,"CMSC479" ,"CMSC478" ,"CMSC477" ),
		"CMSC481" => array(	"CMSC465" ,"CMSC466" ,"CMSC487" ),
		"CMSC4XX" => array(	"CMSC447" ,"CMSC448"));

	$taken = $_POST['check_list'];
	$suggestedClasses = array();
	if(!in_array("MATH151", $taken)){
		array_push($suggestedClasses, "MATH151");
	}
	if(!in_array("CMSC201", $taken)){
		array_push($suggestedClasses, "CMSC201");
	}
	if(!in_array("PHYS121", $taken)){
		array_push($suggestedClasses, "PHYS121");
	}
	//Make this associative array
	

	if(!empty($taken) && max($taken) >= 400){
		array_push($taken, "CMSC4XX");
	}

	

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/classStyles.css" />
	<script>	
		function show(desc){	
		 	document.getElementById('content').innerHTML= desc;
		}
		function hide(){
			document.getElementById('content').innerHTML='';
		}
	</script>
</head>
<body style="background-image:url(images/bg.png);">
<br><br>
<div id="wrapper">
	<div id="max">
	<div id="contain">
		<?php
 			if(!empty($taken)){
				foreach($taken as $class){
					if(array_key_exists($class, $classes)){
						foreach($classes[$class] as $course){
							if(!in_array($course, $suggestedClasses) && !in_array($course, $taken)){
								$suggestedClasses["$course"] = $course;
							}
						} 
					}
				}	
			}
			sort($suggestedClasses);



			echo("
				<span style='color:white;font-size:3em;vertical-align: middle;'>CMSC: </span><br>
				<hr>

				");

			foreach($suggestedClasses as $val){
				$desc = $json->encode(getDesc(trim($val)));
				if(strlen($desc) < 1){ $desc = "No description available";}
				$major = getMajor($val);
				$course = $major . "<br>" . getCourse($val);
				if(preg_replace("/\d+./","",$val) == "CMSC"){
				echo("<div class='generated' onmouseover= 'show($desc)' onmouseout= 'hide()'> $course </div>");
				}
			}



			echo("
				<br><br>
				<span style='color:white;font-size:3em;vertical-align: middle;'>MATH: </span><br>
				<hr>

				");

			foreach($suggestedClasses as $val){
				$desc = $json->encode(getDesc(trim($val)));
				if(strlen($desc) < 1){ $desc = "No description available";}
				$major = getMajor($val);
				$course = $major . "<br>" . getCourse($val);
				if(preg_replace("/\d+./","",$val) == "MATH" || preg_replace("/\d+./","",$val) == "STAT") {
				echo("<div class='generated' onmouseover= 'show($desc)' onmouseout= 'hide()'> $course </div>");
				}
			}


			
			echo("
				<br><br>
				<span style='color:white;font-size:3em;vertical-align: middle;'>SCI: </span><br>
				<hr>

				");

			//Pulls the class as $val and sets the description 
			foreach($suggestedClasses as $val){
				$desc = $json->encode(getDesc(trim($val)));
				$major = getMajor($val);
				$course = $major . "<br>" . getCourse($val);
				if(strval($desc) == "null"){
					$desc = $json->encode("No description available");
				}


				if($major != "CMSC" && $major != "MATH"  && $major != "STAT"){
				echo("<div class='generated' onmouseover= 'show($desc)' onmouseout= 'hide()'> $course </div>");
				}
			}

		?>
	</div>
	</div>
	<div id="info">
		<p id="content" style="vertical-align:middle;height:100px;width:95%"></p> 
	</div>
</div>
<span style="bottom:0;left:0;float:left;display:inline-block;position:absolute;">
	<a href="index.php">
		<button class="button">
			<< Home
		</button>
	</a>
</span>
</body>
</html>

<?php
//session_start();
$pst = $_POST;
 
//runs algorithm to add classes to DBs
	//connect to server
	connect("qq45691");

	clearEmpties();
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

	$pst = $_POST['check_list'];
	insertID($first, $last, $user, $email);
	foreach($pst as $value){
	 
		//check for submit, do nothing if found
		if($value == "Submit"){
			continue;
		}
		else if(in_array($value, $cmsc2xx)){
			//call updateEntry if value is 2XX
			updateEntry("2XX", $value, $user);
		}
		else if(in_array($value, $cmsc3xx)){
			//call updateEntry if value is 3XX
			updateEntry("3XX", $value, $user);
		}
		else if(in_array($value, $cmsc4xx)){
			//call updateEntry if value is 4XX
			updateEntry("4XX", $value, $user);
		}
		else if(in_array($value, $science)){
			//call updateEntry if value is science
			updateEntry("SCIENCE", $value, $user);
		}
		else if(in_array($value, $maths)){
			//call updateEntry if value is math
			updateEntry("MATH", $value, $user);
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

function insertID($first, $last, $user, $email){

	//add ID to all tables for later updating, no duplicate (IGNORE)
	$rs = mysql_query("INSERT INTO `2XX` (`USER`) VALUES ('$user')");
	$rs = mysql_query("INSERT INTO `3XX` (`USER`) VALUES ('$user')");
	$rs = mysql_query("INSERT INTO `4XX` (`USER`) VALUES ('$user')");
	$rs = mysql_query("INSERT INTO `MATH` (`USER`) VALUES ('$user')");
	$rs = mysql_query("INSERT INTO `SCIENCE` (`USER`) VALUES ('$user')");
	//insert all info into USERINFO DB
	$rs = mysql_query("INSERT INTO `USERINFO` (`FIRST`, `LAST`, `USER`, `EMAIL`) VALUES ('$first','$last','$user','$email')");
	


}
clearEmpties();
disconnect("qq45691");
?>