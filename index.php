
<?php
	include 'db.php';
	
	$query2 = $mysqli->query("SELECT * FROM `sleepInfo`");
	while($row = $query2->fetch_assoc()) 
	{ 
	    $allrooms[]=$row['room'];
	}

	if(isset($_POST['SUBMIT']))
	{
		$room=$_POST['room'];
		$state=$_POST['state'];
		$error;
		if (!is_numeric($room) OR !strlen((string)$room) == 3)
		{
			$error[]="Invalid Room";
		}
		if ($state == "")
		{
			$error[]="No Option Selected";
		}
		if (!in_array($room, $allrooms))
		{
			$error[]="Room Not Part Of Experiment";
		}
		if (empty($error))
		{
			$query = $mysqli->query("UPDATE `sleepInfo` SET state = '$state' WHERE room = $room");
		}
	}

?>

<!doctype html>
<html>
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
		<h1>Keep It Down!</h1>
		<div id="mainDiv">
		<h4 class="error">
		<?php
			if(isset($error))
			{
				foreach ($error as $key => $value) 
				{
					print($value);
					print("</br>");
				}
			}
		?>
		</h4>
		<!-- forms are what we use to submit data to the database-->
		
		<form method="POST">
			<h5>
			Welcome to Keep It Down! This is the quiet time notification system for sections 203 - 208 and 210-218 of Howell. 
			</h5>
			<h5>
			Please select your room number, enter your current activity, and press submit in order to alert people of how much noise you want in your section of the hall.
			</h5>
			</br>
			<input type="text" name="room" placeholder="Room Number">
			<ul class="stateSelect">
				<!-- Sleep Button -->
				<li>
					<input type="radio" class="button" id="SLEEP" name="state" value="SLEEP">
					<label for="SLEEP">SLEEP</label>
					</br>
				</li>
				<!-- Study Button -->
				<li>
					<input type="radio" class="button" id="STUDY" name="state" value="STUDY">
					<label for="STUDY">STUDY</label>
					</br>
				</li>
				<!-- Social Button -->
				<li>
					<input type="radio" class="button" id="SOCIAL" name="state" value="SOCIAL">
					<label for="SOCIAL">SOCIAL</label>
					</br>
				</li>
				<!-- Off Button -->
				<li>
					<input type="radio" class="button" id="OFF" name="state" value="OFF">
					<label for="OFF">OFF</label>
				</li>
			</ul>
			</br>
			<!-- Submit Button --> 
			<input type="submit" class="button" value="SUBMIT" name="SUBMIT">
		</form>
		</div>
	</body>
</html>