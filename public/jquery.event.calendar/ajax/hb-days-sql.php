<?php
/*
 *  jQuery Event Calendar 1.0
 *  Demo's and documentation:
 *	ecalendar.ozkanozturk.me
 *
 *	Copyright © 2014 Özkan Öztürk
 *	www.ozkanozturk.me
 *
 * 	Post variables: $_POST['currentMonth'] , $_POST['currentYear']
 *  Select event days from your db in this php file
 *  After selecting days print them comma seperated (etc: echo "2,14,21,30")
 * 	Plug-in will show days on the calendar
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

$sql	= "SELECT day FROM events WHERE month = " . $_POST['currentMonth'] . " AND year = " . $_POST['currentYear'];
$result = $conn->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_object()) {
		echo $row->day . ",";
	}
}else{
	return false;
}

// Close connection
$conn->close();

?>