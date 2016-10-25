<?php
	include "db.php";
	$query = $mysqli->query("SELECT * FROM `sleepInfo`");
	while($row = $query->fetch_assoc()) 
	{ 
	    $room[]=$row['room'];
		$state[]=$row['state'];
	}
	$sleep="";
	$study="";
	$social="";
	$off="";
	foreach ($room as $key => $value){
		if ($state[$key] == "SLEEP")
		{
			$sleep=$sleep.$value." ";
		}
		if ($state[$key]== "STUDY")
		{
			$study=$study.$value." ";
		}
		if ($state[$key] == "SOCIAL")
		{
			$social=$social.$value." ";
		}
		if ($state[$key] == "OFF")
		{
			$off=$off.$value." ";
		}
	}
	$time=date('H:i');
	$query = $mysqli->query("INSERT INTO `sleepLog` (`time`,`sleep`,`study`,`social`,`off`) VALUES ('".$time."','".$sleep."','".$study."','".$social."','".$off."')");
	print($sleep);
	print($time);
?>