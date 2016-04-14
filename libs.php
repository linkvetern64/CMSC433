<?php 
/* 
** Desc: Connects user to database, with static credentials
*/
function connect($user){

	$db ="$user";
	$conn = mysql_connect("studentdb-maria.gl.umbc.edu", "$user", "$user");
	if(!$conn){
		echo("Could not connect to MySQL");
	}

	$er = mysql_select_db("$user");
	if(!$er){
		echo("Could not find table name");
	}
	return $conn;
}

/* 
** Desc: Disconnects MYSQL object 
*/
function disconnect($conn){
	mysql_close($conn);
}

/*
** Desc: Gets current time in milliseconds
**		 - Used for runtime purposes
*/
function runtime(){
	return round(microtime(true) * 1000);
}

function getDesc($class){	 
	connect();
	$result = mysql_fetch_assoc(mysql_query("SELECT * FROM descriptions WHERE course = '$class'"));
	return $result["desc"];
}
