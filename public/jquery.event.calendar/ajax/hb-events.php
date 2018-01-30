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

// random events with demo view
$eventCount = ( rand(1, 1000) % 8 ) + 1;

for( $i = 0; $i < $eventCount; $i++ ) {

	?>

	<div class="event">
		<h3>
			<?=$i+1?>. Event Title
			<small><?=$_POST['currentDay'] . '.' . $_POST['currentMonth'] . '.' . $_POST['currentYear']?></small>
		</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti eos et fugiat molestiae reprehenderit, similique! Exercitationem inventore ipsum quis.</p>
	</div>

	<?php

}

?>
