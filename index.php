<?php
	
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Class picker</title>
	<link rel="stylesheet" href="styles.css" type="text/css"  media="all"  />
	<link rel="stylesheet"  href="classes.css" type="text/css" media="screen"  />
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body>
	<img id="img1" src="bg/bg3.png" />
	<img id="img2" src="bg/bg2.png" />
	<div id="container">
		<br />
	 	<div id="header"></div>

	 	<div id="body">
			<form method="POST" action="validate.php">
				<input type="text" name="firstName" class="top" placeholder="First Name"/>	<?php if($_SESSION["validFN"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				<input type="text" name="lastName" placeholder="Last Name" class="middle"/>	<?php if($_SESSION["validLN"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				<input type="text" name="umbcID" placeholder="UMBC ID" class="middle"/>		<?php if($_SESSION["validID"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				<input type="text" name="email" placeholder="Email" class="bottom"/>		<?php if($_SESSION["validE"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				<a class="button"  style="vertical-align:middle" href="#checkboxes"><span>Next &nbsp;</span></a>
		</div>
	</div>
	<div id="classBody">
		<div id="checkboxes">
		    <input type="checkbox" name="check_list[]" value="201" id="201" />
		    <input type="checkbox" name="check_list[]" value="202" id="202" />
		    <input type="checkbox" name="check_list[]" value="203" id="203" />
		    <input type="checkbox" name="check_list[]" value="304" id="304" />
		    <input type="checkbox" name="check_list[]" value="313" id="313" />
		    <input type="checkbox" name="check_list[]" value="331" id="331" />
		    <input type="checkbox" name="check_list[]" value="341" id="341" />
		    <input type="checkbox" name="check_list[]" value="411" id="411" />
		</div>

		<ul class="choice-list">
		    <label class="choice" for="201"><li class="checkbox _201 "></li></label>
		    <label class="choice" for="202"><li class="checkbox _202 "></li></label>
		    <label class="choice" for="203"><li class="checkbox _203 "></li></label>
		    <br />
		    <hr>

		    <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
		    <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
		    <label class="choice" for="331" ><li class="checkbox _331" ></li></label>
		    <label class="choice" for="341" ><li class="checkbox _341" ></li></label>
		    <br />
		    <hr>

		    <label class="choice" for="411" ><li class="checkbox _411" ></li></label>
		    <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
		    <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
		    <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
		    <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
		    <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
		    <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
		    <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
		    <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
		    <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
		    <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
		    <label class="choice" for="313" ><li class="checkbox _313" ></li></label>

		</ul>
		<button class="button"  style="vertical-align:middle"><span>Submit &nbsp;</span></button>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		 
		<br /><br /><br /><br /><br /><br />
		
		</form>
	</div>
	<div  id="footer"></div>
	<script src="js/jstyle.js"></script>
</body>
</html>