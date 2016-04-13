<?php
	session_start();
	function getClassInfo($fName, $class){
		$classInfo = array();

		$file = fopen("desc/$fName.txt", 'r') or die("No $fName.txt Found");

		flock($file, LOCK_EX); //Locks the file from concurrent useage
	//	if(!empty($classes)){
			//foreach($classes as $class){
					$desc = "";
			 		while(!feof($file)){ //Loops through file until EOF is found
			 			$line = fgets($file); // gets the next line in the file for analysis
			 			if(strstr($line, strval($class))){ //If the line contains string with class name
			 				while(!preg_match("/\^/", $line)){
			 					$desc .= $line . " <br>";
			 					$line = fgets($file);
			 				}
			 				rewind($file); // sets read pointer back to BOF
			 				return $desc;
			 				break;
			 			}
			 		}
			 		//$classInfo[$class] = $desc;
				//rewind($file); // sets read pointer back to BOF
			//}
		flock($file, LOCK_UN); // Unlocks the file after read through
		//}
		//return $classInfo;
	}
	
?>