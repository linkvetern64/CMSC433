<?php
	//To do 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Class Selector</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<div id="container">
		<div id="header">
		Header stuff
		</div>
		<div id="body">
			<form method="POST" action="classSelect.php">
			Classes: <input type="text" class="inputStyle" name="taken" /><br />
			<input type="submit" name="submit" />
			Required:<input type="checkbox" name="required" value="r"><br />
			Writing intensive:<input type="checkbox" name="wi" value="w"><br />
			Elective:<input type="checkbox" name="elective" value="e"><br />
			</form>
		</div>
	</div>
</body>
</html>