<?php 
/* 
** Desc: Connects user to database, with static credentials
*/
function connect(){

	$db ="jstand1";
	$conn = mysql_connect("studentdb-maria.gl.umbc.edu", "jstand1", "jstand1");
	if(!$conn){
		echo("Could not connect to MySQL");
	}

	$er = mysql_select_db("jstand1");
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

