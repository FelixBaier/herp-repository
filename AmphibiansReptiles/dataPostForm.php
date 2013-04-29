<?php
// dataPostForm.php
// This page receives the data from the user input form (js) and executes the SQL to store it


// Address error handling
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

// Connect and select
if (@mysql_connect('localhost', 'd0169c2f', 'abutvS3f3yezBTsM'))
{
	if (!@mysql_select_db ('d0169c2f'))
	{
		die (print mysql_error());
	}
}
else
{
	die (print mysql_error());
}

// Define the query
$query = "INSERT INTO data_input (
species, GPSLat, GPSLon, sightingDate, 
sightingTime, certainty, image, 
comments, firstName, lastName, email, 
phone, correspondence)
VALUES (
'{$_POST['species']}',
'{$_POST['GPSLat']}', 
'{$_POST['GPSLon']}',
'{$_POST['sightingDate']}',
'{$_POST['sightingTime']}', 
'{$_POST['certainty']}',
'{$_POST['image']}', 
'{$_POST['comments']}',
'{$_POST['firstName']}', 
'{$_POST['lastName']}',
'{$_POST['email']}', 
'{$_POST['phone']}',
'{$_POST['correspondence']}',
)";


// Execute the query
if (@mysql_query ($query))
{
	;
}
else
{
	print mysql_error();
}
mysql_close();
phpinfo();
?>