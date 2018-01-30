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

// random demo event days for each month
switch ( $_POST['currentMonth'] ) {

	case 1:
		echo "7,13,16";
		break;
	case 2:
		echo "9,20";
		break;
	case 3:
		echo "5,21,24,25";
		break;
	case 4:
		echo "4,14,16,19,23,27,28";
		break;
	case 5:
		echo "3,5,8,17,23,27,30";
		break;
	case 6:
		echo "7,9,20,26,28";
		break;
	case 7:
		echo "4,8,16";
		break;
	case 8:
		echo "1,23,28";
		break;
	case 9:
		echo "7,13";
		break;
	case 10:
		echo "4,14,15,26,30";
		break;
	case 11:
		echo "2,8,13,19,24,30";
		break;
	case 12:
		echo "1,17,19,25,29";
		break;

}

?>