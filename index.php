<?php
	
	session_start();
	$errorFName = "Enter only letters";
	$errorLName = "Enter only letters";
	$errorEmail = "Enter as format xxx@umbc.edu";
	$errorID = "Enter ID as AD12345";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Class picker</title>
	<link rel="stylesheet" href="css/styles.css" type="text/css"  media="all"  />
	<link rel="stylesheet"  href="css/checkboxStyles.css" type="text/css" media="screen"  />
	<link rel="stylesheet"  href="css/classes.css" type="text/css" media="screen"  />

</head>
<body>
	<div id="navbar">
		<div class="navItemTop"><a href="#CMSC">CMSC</a></div>
		<div class="navItem"><a href="#BIOL">BIOL</a></div>
		<div class="navItem"><a href="#PHYS">PHYS</a></div>
		<div class="navItem"><a href="#MATH">MATH</a></div>
		<div class="navItem"><a href="#STAT">STAT</a></div>
		<div class="navItemBottom"><a href="#CHEM">CHEM</a></div>
	</div>

	<img id="img1" src="images/bg3.png" />
	<img id="img2" src="images/bg2.png" />
	<div id="container">
		<br />
	 	<div id="header"></div>
	 	<div id="body">
	 		<div id="staticInput">
			<form method="POST" action="validate.php">
				<input type="text" name="firstName" class="top" placeholder="First Name"/>	
				<?php if($_SESSION["validFN"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				<input type="text" name="lastName" placeholder="Last Name" class="middle"/>	
				<?php if($_SESSION["validLN"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				<input type="text" name="umbcID" placeholder="UMBC ID" class="middle"/>		
				<?php if($_SESSION["validID"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				<input type="text" name="email" placeholder="Email" class="bottom"/>		
				<?php if($_SESSION["validE"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				
			</div>
				 <a class="button"  style="vertical-align:middle;" href="#checkboxes"><span>Next &nbsp;</span></a>
				
		</div>
	</div>
	<div id="classBody">
		<div id="checkboxes">
		    <input type="checkbox" name="check_list[]" value="CMSC201" id="201" />
		    <input type="checkbox" name="check_list[]" value="CMSC202" id="202" />
		    <input type="checkbox" name="check_list[]" value="CMSC203" id="203" />
 
		    <input type="checkbox" name="check_list[]" value="CMSC304" id="304" />
		    <input type="checkbox" name="check_list[]" value="CMSC313" id="313" />
		    <input type="checkbox" name="check_list[]" value="CMSC331" id="331" />
		    <input type="checkbox" name="check_list[]" value="CMSC341" id="341" />
 
		    <input type="checkbox" name="check_list[]" value="CMSC411" id="411" />
		    <input type="checkbox" name="check_list[]" value="CMSC421" id="421" />
		    <input type="checkbox" name="check_list[]" value="CMSC427" id="427" />
		    <input type="checkbox" name="check_list[]" value="CMSC431" id="431" />
		    <input type="checkbox" name="check_list[]" value="CMSC432" id="432" />
		    <input type="checkbox" name="check_list[]" value="CMSC433" id="433" />
		    <input type="checkbox" name="check_list[]" value="CMSC435" id="435" />
		    <input type="checkbox" name="check_list[]" value="CMSC436" id="436" />
		    <input type="checkbox" name="check_list[]" value="CMSC437" id="437" />
		    <input type="checkbox" name="check_list[]" value="CMSC441" id="441" />
		    <input type="checkbox" name="check_list[]" value="CMSC442" id="442" />
		    <input type="checkbox" name="check_list[]" value="CMSC443" id="443" />
		    <input type="checkbox" name="check_list[]" value="CMSC444" id="444" />
		    <input type="checkbox" name="check_list[]" value="CMSC446" id="446" />
		    <input type="checkbox" name="check_list[]" value="CMSC447" id="447" />
		    <input type="checkbox" name="check_list[]" value="CMSC448" id="448" />
		    <input type="checkbox" name="check_list[]" value="CMSC451" id="451" />
		    <input type="checkbox" name="check_list[]" value="CMSC452" id="452" />
		                     
		    <input type="checkbox" name="check_list[]" value="CMSC453" id="453" />
		    <input type="checkbox" name="check_list[]" value="CMSC455" id="455" />
		    <input type="checkbox" name="check_list[]" value="CMSC456" id="456" />
		    <input type="checkbox" name="check_list[]" value="CMSC457" id="457" />
		    <input type="checkbox" name="check_list[]" value="CMSC461" id="461" />
		    <input type="checkbox" name="check_list[]" value="CMSC465" id="465" />
		    <input type="checkbox" name="check_list[]" value="CMSC466" id="466" />
		    <input type="checkbox" name="check_list[]" value="CMSC471" id="471" />
		    <input type="checkbox" name="check_list[]" value="CMSC473" id="473" />
		    <input type="checkbox" name="check_list[]" value="CMSC475" id="475" />
		    <input type="checkbox" name="check_list[]" value="CMSC476" id="476" />
		    <input type="checkbox" name="check_list[]" value="CMSC477" id="477" />
		    <input type="checkbox" name="check_list[]" value="CMSC478" id="478" />
		    <input type="checkbox" name="check_list[]" value="CMSC479" id="479" />
		    <input type="checkbox" name="check_list[]" value="CMSC481" id="481" />
		    <input type="checkbox" name="check_list[]" value="CMSC483" id="483" />
		    <input type="checkbox" name="check_list[]" value="CMSC484" id="484" />
		    <input type="checkbox" name="check_list[]" value="CMSC486" id="486" />

		   	<input type="checkbox" name="check_list[]" value="CMSC487" id="487" />
		    <input type="checkbox" name="check_list[]" value="CMSC491" id="491" />
		    <input type="checkbox" name="check_list[]" value="CMSC493" id="493" />
		    <input type="checkbox" name="check_list[]" value="CMSC495" id="495" />
		    <input type="checkbox" name="check_list[]" value="CMSC498" id="498" />
		    <input type="checkbox" name="check_list[]" value="CMSC499" id="499" />

		    <input type="checkbox" name="check_list[]" value="MATH151" id="MATH151" />
		    <input type="checkbox" name="check_list[]" value="MATH152" id="MATH152" />

		    <input type="checkbox" name="check_list[]" value="CHEM101" id="CHEM101" />
		    <input type="checkbox" name="check_list[]" value="CHEM102" id="CHEM102" />		  
		    <input type="checkbox" name="check_list[]" value="CHEM102L" id="CHEM102L" />

		    <input type="checkbox" name="check_list[]" value="BIOL100L" id="BIOL100L" />
		    <input type="checkbox" name="check_list[]" value="BIOL141" id="BIOL141" />		  
		    <input type="checkbox" name="check_list[]" value="BIOL142" id="BIOL142" />

		    <input type="checkbox" name="check_list[]" value="PHYS121" id="PHYS121" />
		    <input type="checkbox" name="check_list[]" value="PHYS122" id="PHYS122" />		  
		    <input type="checkbox" name="check_list[]" value="PHYS122L" id="PHYS122L" />

		    <input type="checkbox" name="check_list[]" value="STAT355" id="STAT355" />		  
		    <input type="checkbox" name="check_list[]" value="STAT451" id="STAT451" />

		</div>
		<span style="font-style: italic;font-size:1.3em;text-decoration: underline;">Click on courses you've taken.</span>
		<ul class="choice-list">
			<a id="CMSC"></a>
			<span style="color:white;font-size:3em;vertical-align: middle">CMSC</span><br>
		    <label class="choice" for="201"><li class="checkbox _CMSC200 _201"></li></label>
		    <label class="choice" for="202"><li class="checkbox _CMSC200 _202"></li></label>
		    <label class="choice" for="203"><li class="checkbox _CMSC200 _203"></li></label>
		    <br />
	 
			
		    <label class="choice" for="304" ><li class="checkbox _CMSC300 _304" ></li></label>
		    <label class="choice" for="313" ><li class="checkbox _CMSC300 _313" ></li></label>
		    <label class="choice" for="331" ><li class="checkbox _CMSC300 _331" ></li></label>
		    <label class="choice" for="341" ><li class="checkbox _CMSC300 _341" ></li></label>
		    <br />
		     
	    
		    <label class="choice" for="411" ><li class="checkbox _CMSC400 _411" ></li></label>
		    <label class="choice" for="421" ><li class="checkbox _CMSC400 _421" ></li></label>
		    <label class="choice" for="427" ><li class="checkbox _CMSC400 _427" ></li></label>
		    <label class="choice" for="431" ><li class="checkbox _CMSC400 _431" ></li></label>
		    <label class="choice" for="432" ><li class="checkbox _CMSC400 _432" ></li></label>
		    <label class="choice" for="433" ><li class="checkbox _CMSC400 _433" ></li></label>

		    <label class="choice" for="435" ><li class="checkbox _CMSC400 _435" ></li></label>
		    <label class="choice" for="436" ><li class="checkbox _CMSC400 _436" ></li></label>
		    <label class="choice" for="437" ><li class="checkbox _CMSC400 _437" ></li></label>
		    <label class="choice" for="441" ><li class="checkbox _CMSC400 _441" ></li></label>
		    <label class="choice" for="442" ><li class="checkbox _CMSC400 _442" ></li></label>
		    <label class="choice" for="443" ><li class="checkbox _CMSC400 _443" ></li></label>

		    <label class="choice" for="444" ><li class="checkbox _CMSC400 _444" ></li></label>
		    <label class="choice" for="446" ><li class="checkbox _CMSC400 _446" ></li></label>
		    <label class="choice" for="447" ><li class="checkbox _CMSC400 _447" ></li></label>
		    <label class="choice" for="448" ><li class="checkbox _CMSC400 _448" ></li></label>
		    <label class="choice" for="451" ><li class="checkbox _CMSC400 _451" ></li></label>
		    <label class="choice" for="452" ><li class="checkbox _CMSC400 _452" ></li></label>

		    <label class="choice" for="453" ><li class="checkbox _CMSC400 _453" ></li></label>
		    <label class="choice" for="455" ><li class="checkbox _CMSC400 _455" ></li></label>
		    <label class="choice" for="456" ><li class="checkbox _CMSC400 _456" ></li></label>
		    <label class="choice" for="457" ><li class="checkbox _CMSC400 _457" ></li></label>
		    <label class="choice" for="461" ><li class="checkbox _CMSC400 _461" ></li></label>
		    <label class="choice" for="465" ><li class="checkbox _CMSC400 _465" ></li></label>

		    <label class="choice" for="466" ><li class="checkbox _CMSC400 _466" ></li></label>
		    <label class="choice" for="471" ><li class="checkbox _CMSC400 _471" ></li></label>
		    <label class="choice" for="473" ><li class="checkbox _CMSC400 _473" ></li></label>
		    <label class="choice" for="475" ><li class="checkbox _CMSC400 _475" ></li></label>
		    <label class="choice" for="476" ><li class="checkbox _CMSC400 _476" ></li></label>
		    <label class="choice" for="477" ><li class="checkbox _CMSC400 _477" ></li></label>

		    <label class="choice" for="478" ><li class="checkbox _CMSC400 _478" ></li></label>
		    <label class="choice" for="479" ><li class="checkbox _CMSC400 _479" ></li></label>
		    <label class="choice" for="481" ><li class="checkbox _CMSC400 _481" ></li></label>
		    <label class="choice" for="483" ><li class="checkbox _CMSC400 _483" ></li></label>
		    <label class="choice" for="484" ><li class="checkbox _CMSC400 _484" ></li></label>

		    <label class="choice" for="486" ><li class="checkbox _CMSC400 _486" ></li></label>		    
		    <label class="choice" for="487" ><li class="checkbox _CMSC400 _487" ></li></label>
		    <label class="choice" for="491" ><li class="checkbox _CMSC400 _491" ></li></label>
		    <label class="choice" for="493" ><li class="checkbox _CMSC400 _493" ></li></label>
		    <label class="choice" for="495" ><li class="checkbox _CMSC400 _495" ></li></label>
		    <label class="choice" for="498" ><li class="checkbox _CMSC400 _498" ></li></label>
		    <label class="choice" for="499" ><li class="checkbox _CMSC400 _499" ></li></label>
		    <br />
		    <hr>
		    
		   	<a id="MATH"></a>
		   	<span style="color:white;font-size:3em;vertical-align: middle">MATH</span><br>
			<label class="choice" for="MATH151"><li class="checkbox _MATH _M151"></li></label>
		    <label class="choice" for="MATH152"><li class="checkbox _MATH _M152"></li></label>		    
		    <br />
		    <hr>

		    <a id="CHEM"></a>		    
		   	<span style="color:white;font-size:3em;vertical-align: middle">CHEM</span><br>
			<label class="choice" for="CHEM101"><li class="checkbox _CHEM _C101"></li></label>
		    <label class="choice" for="CHEM102"><li class="checkbox _CHEM _C102"></li></label>	
		    <label class="choice" for="CHEM102L"><li class="checkbox _CHEM _C102L"></li></label>		    
		    <br />
		    <hr>

		    <a id="BIOL"></a>		    
		   	<span style="color:white;font-size:3em;vertical-align: middle">BIOL</span><br>
			<label class="choice" for="BIOL141"><li class="checkbox _BIOL _B141"></li></label>
		    <label class="choice" for="BIOL142"><li class="checkbox _BIOL _B142"></li></label>	
		    <label class="choice" for="BIOL100L"><li class="checkbox _BIOL _B100L"></li></label>		    
		    <br />
		    <hr>

			<a id="PHYS"></a>		    
		   	<span style="color:white;font-size:3em;vertical-align: middle">PHYS</span><br>
			<label class="choice" for="PHYS121"><li class="checkbox _PHYS _P121"></li></label>
		    <label class="choice" for="PHYS122"><li class="checkbox _PHYS _P122"></li></label>	
		    <label class="choice" for="PHYS122L"><li class="checkbox _PHYSL _P122L"></li></label>		    
		    <br />
		    <hr>

		    <a id="STAT"></a>		    
		   	<span style="color:white;font-size:3em;vertical-align: middle">STAT</span><br>
			<label class="choice" for="STAT355"><li class="checkbox _STAT _S355"></li></label>	
			<label class="choice" for="STAT451"><li class="checkbox _STAT _S451"></li></label>	
		    <br />
		    <hr>

		</ul>
		<button class="button"  style="vertical-align:middle"><span>Submit &nbsp;</span></button>
		</form>
	</div>
	<!--<div  id="footer"></div>-->
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="js/jstyle.js"></script>
</body>
</html>