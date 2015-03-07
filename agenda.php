<?php
require 'class.iCalReader.php';

// How many lines to show
$HOWMANY = 30;

// Configuration
$calendars = [["#COLOR", 'https://www.google.com/calendar/ical/LINK1/basic.ics'], 
			  ["#COLOR", 'https://www.google.com/calendar/ical/LINK2/basic.ics'],
			  ];

// Name of the days to use
$jours = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];

// Define the Timezone
$timezone = 'Europe/Paris';

$events = array();

foreach($calendars as $cal){
	$ical = new ical($cal[1]);

	$array = $ical->eventsFromRange(time());
	date_default_timezone_set($timezone);

	for($i=0; $i<$HOWMANY && $i<count($array); $i++){
		$array[$i]['COLOR']=$cal[0];
		$events[] = $array[$i];
	}
}

$events = ICal::sortEventsWithOrder($events);


print "<meta http-equiv=Content-Type content=\"text/html; charset=utf-8\" />
<style type=\"text/css\">
 body {color:white;margin:0;padding:0;height:500px;width:600px;}
 .date {font-weight:bold;color:blue;text-align:center;}
 </style>
<script type=\"text/JavaScript\">
	setTimeout(\"location.reload(true);\", 900000);
</script>";

$datePasse = 0;

echo "<body>";
for($i=0; $i<$HOWMANY && $i<count($events); $i++){
	if(date("d/m/Y", $events[$i]['UNIX_TIMESTAMP_START']) != $datePasse){
		if(date("d/m/Y", $events[$i]['UNIX_TIMESTAMP_START']) == date("d/m/Y", time())){
			echo "<p class=\"date\">Aujourd'hui</p>\n";
		}else if(date("d/m/Y", $events[$i]['UNIX_TIMESTAMP_START']) == date("d/m/Y", time()+86400)){
			echo "<p class=\"date\">Demain</p>\n";
		}else{
			echo '<p class="date">Le '.$jours[date("w", $events[$i]['UNIX_TIMESTAMP_START'])]." ".date("d/m/Y", $events[$i]['UNIX_TIMESTAMP_START'])."</p>\n";
		}
		$datePasse = date("d/m/Y", $events[$i]['UNIX_TIMESTAMP_START']);
	}
	
	if($events[$i]['UNIX_TIMESTAMP_END']-$events[$i]['UNIX_TIMESTAMP_START'] == 86400){
		echo "<span style=\"font-weight:bold;color:".$events[$i]['COLOR']."\">".$events[$i]['SUMMARY']."</span><br>\n";
	}else{
		echo "<span style=\"font-weight:bold;color:".$events[$i]['COLOR']."\">".date("H:i", $events[$i]['UNIX_TIMESTAMP_START'])." - ".$events[$i]['SUMMARY']."</span><br>\n";
	}
}
echo "</body>";
?>