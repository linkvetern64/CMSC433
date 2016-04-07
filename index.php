<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Class picker</title>
	<link rel="stylesheet" type="text/css" href="styles.css" />
	<style>
		input.button:checked{
			background-color:red;
		}

	</style>
</head>
<body class="bg">
	<div id="container">
		<br />
	 	<div id="header"></div>

	 	<div id="body">
			<form method="POST" action="validate.php">
				<input type="text" name="firstName" class="top" placeholder="First Name"/>	<?php if($_SESSION["validFN"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				<input type="text" name="lastName" placeholder="Last Name" class="middle"/>	<?php if($_SESSION["validLN"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				<input type="text" name="umbcID" placeholder="UMBC ID" class="middle"/>		<?php if($_SESSION["validID"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				<input type="text" name="email" placeholder="Email" class="bottom"/>		<?php if($_SESSION["validE"]){echo("<span style='color:red;'>*Only #'s, or not empty</span>");} ?><br />
				<button class="button"  style="vertical-align:middle"><span>Submit &nbsp;</span></button>
			</form>
		</div>
	</div>
	
	<div id="footer"></div>
	<!-- TEST STUFF -->

	<!-- END TEST STUFF-->

</body>
</html>