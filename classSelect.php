<?php
	session_start();
	//

	require_once('JSON.php');
	$json = new Services_JSON();
 

	//




	include("libs.php");
	include("parse.php");

	$now = runtime();

	$_POST = $_SESSION["postData"];

	$criteria .= $_POST["required"];
	$criteria .= $_POST["wi"];
	$criteria .= $_POST["elective"];
	$criteria = "rwe";

	$suggestedClasses = array();


	$taken = array();
	
	foreach($_POST['check_list'] as $val){
		array_push($taken, $val);
	}


	echo($criteria ." search criteria.<br>");
	if(!empty($taken) && max($taken) >= 400){
		array_push($taken, "4XX");
	}

	//R & W have a higher priority.

	//E is general electives

	$classes = array(

	"201" => array(	"202" => "r"),

	"202" => array(	"203" => "r", 
					"304" => "w", 
					"484" => "e", 
					"486" => "e"),

	"203" => array(	"313" => "r", 
					"331" => "r", 	
					"341" => "r", 
					"451" => "e", 
					"452" => "e", 
					"457" => "e"),

	"313" => array(	"411" => "r",
					"421" => "r",
					"435" => "e"),

	"331" => array(	"431" => "e",
					"432" => "e",
					"433" => "e",
					"473" => "e"),

	"341" => array(	"421" => "r",
					"427" => "e",
					"431" => "e",
					"435" => "e",
					"436" => "e",
					"437" => "e",
					"441" => "r",
					"443" => "e",
					"453" => "e",
					"455" => "e",
					"456" => "e",
					"461" => "e",
					"471" => "e",
					"476" => "e",
					"475" => "e",
					"481" => "e"),

	"421" => array(	"426" => "e",
					"483" => "e",
					"487" => "e"),

	"435" => array(	"493" => "e"),

	"461" => array(	"465" => "e",
					"466" => "e"),

	"471" => array(	"493" => "e",
					"479" => "e",
					"478" => "e",
					"477" => "e"),

	"481" => array(	"465" => "e",
					"466" => "e",
					"487" => "e"),

	"4XX" => array(	"447" => "r",
					"448" => "e")

	);

	//taken is classes, iterator is current class taken
	//this checks if it needs to be printed
	foreach($taken as $class){
		if(array_key_exists($class, $classes)){
			foreach($classes[$class] as $key => $val){
				if(!in_array($key, $taken) && strpos($criteria, $val) !== false ){
					if(!in_array($key, $suggestedClasses)){
						array_push($suggestedClasses, $key);
					}
				}
			}
		}
	}

	sort($suggestedClasses);

	foreach ($suggestedClasses as $key) {
		echo($key . "<br>");
	}

	//START HERE
	$arr = getClassInfo("CMSC", $suggestedClasses);
 

  	$test =  $json->encode($arr[0]);

	$then = runtime();
	echo("Runtime: " . ($then - $now) . " Milliseconds");
	//Should do lower level electives first.
?>
<html>
<head>
<?php
	echo("

		<script>	
			function show(){	
			var info= '$test'; 
			 	document.getElementById('content').innerHTML= $test;
			}

			function hide(){
			  document.getElementById('content').innerHTML='';
			}
		</script>

	");
	?>
</head>
<body>
<?php

	echo("

		<div style='width:50px;height:50px;background-color:green;' onmouseover= 'show()' onmouseout= 'hide()'>

		</div>

		<div style='width:500px;height:75px;'>
		<p id='content'>Here</p>
		</div>


		");

?>


<br /><br />
<p id="content" style="overflow:auto;height:auto;width:100%"></p> 
<a href="index.php">Home</a>

</body>
</html>