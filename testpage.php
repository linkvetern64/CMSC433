<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	 
	<style>

	.whatever{
    background-color: red;
    display: inline-block;
    width: 100px;
    height: 100px;
	}

	#checkboxes input[type=checkbox]{
	    display: none;
	}

	#checkboxes input[type=checkbox]:checked + .whatever{
	    background-color: green;
	}
	#checkboxes:checked{
	    -webkit-transform: scale(0.8);
        -ms-transform: scale(0.8);
        transform: scale(0.9);
        transition: all 1s ease-in-out;
}
	</style>
</head>
<body>
	
</body>
</html>