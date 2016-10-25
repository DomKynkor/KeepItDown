<?php
	include "db.php";
	$query = $mysqli->query("SELECT * FROM `sleepInfo`");
	while($row = $query->fetch_assoc()) 
	{ 
	    $room[]=$row['room'];
		$state[]=$row['state'];
	}
	//Math goes header
	//maybe 1pt to sleeping 1/2pt to studying 0pt to social and off doesnt get included in sample
	//then sleepscore=# of points divided by total number of people who arent off
	//then sleep score of 40% - yellow 70% -green 
	$sleep = 0;
	$study = 0;
	$social = 0;
	$off = 0;
	foreach ($state as $key => $value) {
		if ($value == "SLEEP")
		{
			$points=$points+1;
			$participants=$participants+1;
			$sleep+=1;
		}
		if ($value == "STUDY")
		{
			$points=$points+.5;
			$participants=$participants+1;
			$study+=1;
		}
		if ($value == "SOCIAL"){
			$points=$points+0;
			$participants=$participants+1;
			$social+=1;
		}
		if ($value == "OFF")
		{
			$off+=1;
		}
	}
	//calculating percentage
	if (!$participants == 0) {
		$percentage=$points/$participants;
	}
	else {
		$percentage = 0; 
	}
	//Measuring quiet time
	if ($percentage > .3) 
	{
		$quietState = "red";
	}
	if ($percentage >= .2 AND $percentage <= .3)
	{
		$quietState = "yellow";
	}
	if ($percentage < .2)
	{
		$quietState = "green";
	}
?>
<!doctype html>
<html style="
<?php
	if ($quietState == "red") {
		print("background-color:red;");
	}
	if ($quietState == "yellow") {
		print("background-color:yellow;");
	}
	if ($quietState == "green") {
		print("background-color:green;");
	}
?>
">
	<head>
		<meta charset="UTF-8">
		<title>Keep it down!</title>
		<!-- Style Sheets-->
		<link rel="button" type="text/css" href="sleep.css" media="screen" />
		<link rel="button" type="text/css" href="study.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<!-- Nifty fonts -->
		<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	</head>
	<body>
		<?php
			if ($quietState == "red") 
			{
				print("<h1 style='color:black;'>PLEASE BE QUIET!</h1>");
			}
			if ($quietState == "yellow") 
			{
				print("<h1 style='color:black;'>BE SORT OF QUIET!</h1>");
			}
			if ($quietState == "green") {
				print("<h1 style='color:black;'>DON'T WORRY ABOUT NOISE!</h1>");
			}
		?>
		<div style=" text-align:center; margin:auto;">
		<?php
			if ($quietState == "red") {
				print("<img src='img/signal.png'>");
			}
			if ($quietState == "yellow") {
				print("<img src='img/danger.png'>");
			}
			if ($quietState == "green") {
				print("<img src='img/hands.png'>");
			}
		?>
		</div>
		<div style="
			width:400px;
	    	height:60px;
	    	margin:auto;
	    	text-align:center;
	    	background-color:#000B29;
	    	border-radius:10px;
    	">

		<?php
			/*
			foreach ($room as $key=>$value) 
			{
				print($value);
				print("</br>");
				print($state[$key]);
				print("</br>");
			}
			*/
			print($sleep);
			print(" Rooms Are Trying to Sleep </br>");
			print($study);
			print(" Rooms Are Trying to Study </br>");
			print($social);
			print(" Rooms Would Like to Socialize </br>");
			//print($quietState);
		
		?>
		</div>
	</body>
</html>