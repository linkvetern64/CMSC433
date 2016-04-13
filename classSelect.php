<?php
	session_start();

	require_once('JSON.php');
	$json = new Services_JSON();
	include("libs.php");
	include("parse.php");

	$now = runtime();

	$_POST = $_SESSION["postData"];
	$criteria .= $_POST["required"];
	$criteria .= $_POST["wi"];
	$criteria .= $_POST["elective"];

	$criteria = "rwe";

	//Make this associative array
	$suggestedClasses = array();

	//TEST
	echo("DEBUG <br>");
	echo(getDesc("CMSC201") . "<br>");
	echo("DEBUG <br>");
	//TEST


	$taken = array();
	if(!empty($_POST['check_list'])){
		foreach($_POST['check_list'] as $val){
			//$val = preg_replace("/\D+/", "", $val);
			echo(getDesc($val) . "<br>");
			array_push($taken, $val);
		}
	}
	else{

	}
	$taken = array(); //DELETETHIS


	echo($criteria ." search criteria.<br>");
	if(!empty($taken) && max($taken) >= 400){
		array_push($taken, "CMSC4XX");
	}

	//R & W have a higher priority.

	//E is general electives
	$CHEM = array(
		"CHEM101" => array("CHEM102" => "e"),
		"CHEM102" => array("CHEM102L" => "e")
		);

	$MATH = array(

		"MATH151" => array("MATH152" => "e"),
		"MATH152" => array("MATH251" => "e")

		);

	$CMSC = array(

	"CMSC201" => array(	"CMSC202" => "r"),

	"CMSC202" => array(	"CMSC203" => "r", 
						"CMSC304" => "w", 
						"CMSC484" => "e", 
						"CMSC486" => "e"),

	"CMSC203" => array(	"CMSC313" => "r", 
						"CMSC331" => "r", 	
						"CMSC341" => "r", 
						"CMSC451" => "e", 
						"CMSC452" => "e", 
						"CMSC457" => "e"),

	"CMSC313" => array(	"CMSC411" => "r",
						"CMSC421" => "r",
						"CMSC435" => "e"),

	"CMSC331" => array(	"CMSC431" => "e",
						"CMSC432" => "e",
						"CMSC433" => "e",
						"CMSC473" => "e"),

	"CMSC341" => array(	"CMSC421" => "r",
						"CMSC427" => "e",
						"CMSC431" => "e",
						"CMSC435" => "e",
						"CMSC436" => "e",
						"CMSC437" => "e",
						"CMSC441" => "r",
						"CMSC443" => "e",
						"CMSC453" => "e",
						"CMSC455" => "e",
						"CMSC456" => "e",
						"CMSC461" => "e",
						"CMSC471" => "e",
						"CMSC476" => "e",
						"CMSC475" => "e",
						"CMSC481" => "e"),

	"CMSC421" => array(	"CMSC426" => "e",
						"CMSC483" => "e",
						"CMSC487" => "e"),

	"CMSC435" => array(	"CMSC493" => "e"),

	"CMSC461" => array(	"CMSC465" => "e",
						"CMSC466" => "e"),

	"CMSC471" => array(	"CMSC493" => "e",
						"CMSC479" => "e",
						"CMSC478" => "e",
						"CMSC477" => "e"),

	"CMSC481" => array(	"CMSC465" => "e",
						"CMSC466" => "e",
						"CMSC487" => "e"),

	"CMSC4XX" => array(	"CMSC447" => "r",
						"CMSC448" => "e")

	);
/*
	//taken is classes, iterator is current class taken
	//this checks if it needs to be printed
	foreach($taken as $class){
		$major = preg_replace("/\d+/", "", $class);
		$num = preg_replace("/\D+/","", $class);
		$searchToken = $major . " " . $num;


		switch($major){
			case "CMSC":
				foreach($CMSC[$class] as $key => $val){
					$suggestedClasses[$key] = getClassInfo("CMSC", $searchToken);
				}
				echo("CMSC <br>");
			break;

			case "MATH":
				foreach($MATH[$class] as $key => $val){
					$suggestedClasses[$key] = getClassInfo("MATH", $searchToken);
				}	
				echo("MATH <br>");
			break;

			default:

			break;
		}		
*/


/*
		if(array_key_exists($class, $classes)){
			foreach($classes[$class] as $key => $val){
				if(!in_array($key, $taken) && strpos($criteria, $val) !== false ){
					$i = 0;
					if(!in_array($key, $suggestedClasses)){
						//$key = preg_replace("/\D+/", "", $key);
						array_push($suggestedClasses, $key);
					}
				}
			}
		}*/
	//}

	sort($suggestedClasses);

	//Array of classes that are suggested	
	$arr = $suggestedClasses;//getClassInfo("CMSC", $suggestedClasses);
	//Strips away illegal characters
  	
  	//
	$then = runtime();
	echo("Runtime: " . ($then - $now) . " Milliseconds");
 
	/** TEST STUFF ENDS ABOVE **/
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
<body>
<br><br>
<div id="wrapper">
	<div id="contain">
		<?php
			//Procedurally generates div blocks
			$now = runtime();

			foreach($suggestedClasses as $key => $val){
				$test =  $json->encode($val);
			echo("
				
				<div class='generated' onmouseover= 'show($test)' onmouseout= 'hide()'>
					" . key($val) . "
				</div>
				");
			}
				$then = runtime();
		?>

	</div>
	<?php 	echo("<span style='color:black;'><br><br>Runtime: " . (-$now + $then) . "</span> Milliseconds"); ?>
	<div id="info">
		<p id="content" style="overflow:auto;height:auto;width:100%">Here</p> 
	</div>
</div>
<br /><br />
 
<a style="float:left;height:auto;" href="index.php">Home</a>

</body>
</html>