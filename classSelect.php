<?php
	session_start();

	require_once('JSON.php');
	$json = new Services_JSON();
	include("libs.php");
	$_POST = $_SESSION["postData"];

	$classes = array(

		"CHEM101" => array("CHEM102" ),
		"CHEM102" => array("CHEM102L"),

 
		"MATH151" => array("MATH152" ),
		"MATH152" => array("MATH251" ),

 
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
<body>
<br><br>
<div id="wrapper">
	<div id="contain">
		<?php
			$now = runtime();
 			if(!empty($taken)){
				foreach($taken as $class){
					if(array_key_exists($class, $classes)){
						foreach($classes[$class] as $course){
							$suggestedClasses["$course"] = $course;
						} 
					}
				}	
			}
			sort($suggestedClasses);

			foreach($suggestedClasses as $val){
				$desc = $json->encode(getDesc(trim($val)));
				$course = $val;
				echo("<div class='generated' onmouseover= 'show($desc)' onmouseout= 'hide()'> $course </div>");
			}
			echo("<span style='color:white;'>Runtime: " . -$now + runtime() . " milliseconds</span> <br>");
		?>
	</div>
	<div id="info">
		<p id="content" style="overflow:auto;height:auto;width:100%">Here</p> 
	</div>
</div>

<a style="float:left;height:auto;" href="index.php">Home</a>
</body>
</html>