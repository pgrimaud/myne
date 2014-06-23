<?php
function fireLog($log_file, $message)
{
	$date_actuelle = new DateTime(null, new DateTimeZone('Europe/Paris'));
	$date_actuelle = $date_actuelle->format('d/m/Y-H:i:s');
	
	if (file_exists("../log/$log_file.log"))
		$filename = "../log/$log_file.log";
	else if (file_exists("log/$log_file.log"))
		$filename = "log/$log_file.log";
	else
		$filename = "$log_file.log";
	
	$fp = fopen($filename, 'a');
	        
	fputs($fp, '[' . $date_actuelle . '] ');
	fputs($fp, $message);
	fputs($fp, "\n");
	        
	fclose($fp);
}
