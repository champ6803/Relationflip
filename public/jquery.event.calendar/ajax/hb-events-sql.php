<?php
/*
 *  jQuery Event Calendar 1.0
 *  Demo's and documentation:
 *	ecalendar.ozkanozturk.me
 *
 *	Copyright © 2014 Özkan Öztürk
 *	www.ozkanozturk.me
 *
 * 	Post variables: $_POST['currentDay'] , $_POST['currentMonth'] , $_POST['currentYear']
 *	Select event list from your db in this php file
 * 	After selecting events create the view in your own style and print in this php file
 * 	Plug-in will insert this view in default or selected events container
 *
 */

$servername	= "localhost";
$username	= "root";
$password	= "root";
$dbname		= "ecalendar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	return false;
}

$sql	= "SELECT title, description FROM events WHERE day = " . $_POST['currentDay'] . " AND month = " . $_POST['currentMonth'] . " AND year = " . $_POST['currentYear'];
$result = $conn->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_object()) {
		?>
		<div class="event">
			<h3>
				<?=$i+1?>. <?=$row->title?>
				<small><?=$_POST['currentDay'] . '.' . $_POST['currentMonth'] . '.' . $_POST['currentYear']?></small>
			</h3>
			<p><?=$row->description?></p>
		</div>
	<?php
	}
}else{
	return false;
}

// Close connection
$conn->close();

?>