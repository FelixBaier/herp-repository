<?
//the example of inserting data with variable from HTML form
//input.php
mysql_connect("localhost","d0169c2f","abutvS3f3yezBTsM");//database connection
mysql_select_db("d0169c2f");

// Define using data from form
$species		= $_POST['inputSpecies'];
$GPSLat 		= $_POST['inputLatitudeDec'];
$GPSLon 		= $_POST['inputLongitudeDec'];
$sightingDate	= $_POST['inputSightingDate'];
$sightingTime	= $_POST['inputTime'];
$certainty		= $_POST['inputCertainty'];
//$image		= $_POST['inputPhoto'];
$comments		= $_POST['inputComments'];
$firstName		= $_POST['inputFirstName'];
$lastName		= $_POST['inputLastName'];
$email			= $_POST['inputEmail'];
$phone			= $_POST['inputPhone'];
$correspondence = $_POST['inputCorrespondence'];

$sql 			= "SELECT ID FROM data_input ORDER BY ID DESC LIMIT 1";
$id				= mysql_query($sql);

//inserting data order
$order =	"INSERT INTO data_input (
			species, GPSLat, GPSLon, sightingDate, sightingTime, 
			certainty, comments, firstName, lastName, 
			email, phone, correspondence)
			VALUES (
			'$species', '$GPSLat', '$GPSLon', '$sightingDate',
			'$sightingTime', '$certainty', '$comments',
			'$firstName', '$lastName', '$email', '$phone', '$correspondence')";

//declare in the order variable
$result = mysql_query($order);	//order executes



// Upload and save Image:

// First security measure: test extension
$allowedExts	= array("gif", "jpeg", "jpg", "png");
$extension		= end(explode(".", $_FILES["file"]["name"]));
$today			= date("Ymd");
$ext 			= pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000) // Seccond security meausre - size limit: 20 Mb
&& in_array($extension, $allowedExts))
	{
	
	// Check if there is an error with the file:
	if ($_FILES["file"]["error"] > 0)
		{
			$file_upload_error = "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
	
	// Upload the file:
	else
		{
		// Following code block is used for debugging:
		// echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		// echo "Type: " . $_FILES["file"]["type"] . "<br>";
		// echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		// echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
		
		// Set the file path and name to upload/*date*-*id*."extension"
		// Check if the file name already exists in the directory of the server:
		if (file_exists("upload/" . $today . "-" . $id ."." . $ext))
		{
			$file_upload_error = $_FILES["file"]["name"] . " already exists. ";
		}
		
		// Move files into place:
		else
		{
			move_uploaded_file($_FILES["file"]["tmp_name"],
			"upload/" . $today . "-" . $id ."." . $ext);
			$file_success_message = 
			"
			<h2> Success! The image and data were accepted and we will let you know how it goes. </h2>
			<p> Thank you for your contribution. You may now: 
			<br> <a href=submitPhotoForm.html> Upload a photo </a>
			<a href=submitPhotoForm.html> Report a sighing using scientific name </a>
			<br> <a href=index.html> Home </a> </b>
			";
		}
	}
}
	
// Inform the user that the file type was unacceptable:
else
{
	$file_upload_error = "Invalid file";
}


if($result)
	&&($file_upload_error){
	echo("<br><p>Oops! Data input has succeeded, however the image upload seems to have failed. \n
	Please submit your image(s) via email to: admin@HerpRepository.org. Kindly include your 
	submission ID number in the email subject. </p> <br>
	SUBMISSION ID NUMBER: " . $id);
} else{
	echo("<br>Input data has failed, please contact admin@HerpRepoistory.org. Apologies.");
}

?>






