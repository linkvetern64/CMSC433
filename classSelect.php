<?php
	session_start();

	require_once('JSON.php');
	$json = new Services_JSON();
	include("libs.php");
	$_POST = $_SESSION["postData"];

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

	//Make this associative array
	$suggestedClasses = array();

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
				$course = preg_replace("/[A-z]{3,4}/i", "", $val);
				$major = preg_replace("/\d+./","",$val);
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
				$course = preg_replace("/[A-z]{3,4}/i", "", $val);
				$major = preg_replace("/\d+./","",$val);
				if(preg_replace("/\d+./","",$val) == "MATH"){
				echo("<div class='generated' onmouseover= 'show($desc)' onmouseout= 'hide()'> $course </div>");
				}
			}


			
			echo("
				<br><br>
				<span style='color:white;font-size:3em;vertical-align: middle;'>SCI: </span><br>
				<hr>

				");

			foreach($suggestedClasses as $val){
				$desc = $json->encode(getDesc(trim($val)));
				$course = preg_replace("/[A-z]{3,4}/i", "", $val);
				$major = preg_replace("/\d+./","",$val);
				
				if(strval($desc) == "null"){
					$desc = $json->encode("No description available");
				}


				if($major != "CMSC" && $major != "MATH"){
				echo("<div class='generated' onmouseover= 'show($desc)' onmouseout= 'hide()'> $course </div>");
				}
			}

		?>
	</div>
	</div>
	<div id="info">
		<p id="content" style="overflow:auto;height:auto;width:50%"></p> 
	</div>
</div>
<br><br><br><br><br><br>
<a style="vertical-align: middle;" href="index.php">Home</a>
</body>
</html>