<?
//the example of inserting data with variable from HTML form
//input.php
mysql_connect("localhost","d0169c2f","abutvS3f3yezBTsM");//database connection
mysql_select_db("d0169c2f");

// Define using data from form
$species = $_POST['inputSpecies'];
$GPSLat = $_POST['inputLatitudeDec'];
$GPSLon = $_POST['inputLongitudeDec'];
$sightingDate = $_POST['inputSightingDate'];
$sightingTime = $_POST['inputTime'];
$certainty = $_POST['inputCertainty'];
$image = $_POST['inputPhoto'];
$comments = $_POST['inputComments'];
$firstName = $_POST['inputFirstName'];
$lastName = $_POST['inputLastName'];
$email = $_POST['inputEmail'];
$phone = $_POST['inputPhone'];
$correspondence = $_POST['inputCorrespondence'];
$id = mysql_query("SELECT ID FROM data_input ORDER BY ID DESC LIMIT 1;") + 1;

//inserting data order
$order = "INSERT INTO data_input (
			species, GPSLat, GPSLon, sightingDate, sightingTime, 
			certainty, image, comments, firstName, lastName, 
			email, phone, correspondence)
			VALUES (
			'$species', '$GPSLat', '$GPSLon', '$sightingDate',
			'$sightingTime', '$certainty', '$image', '$comments',
			'$firstName', '$lastName', '$email', '$phone', '$correspondence')";

//declare in the order variable
$result = mysql_query($order);	//order executes
if($result){
	echo("<br>Data input has succeeded, however the image upload failed. \n
	Please submit your image(s) via email to: admin@HerpRepository.org. Kindly include your submission ID number in the email subject.
	SUBMISSION ID NUMBER: $id");
} else{
	echo("<br>Input data is fail");
}
?>