<?
//the example of inserting data with variable from HTML form
//input.php
mysql_connect("localhost","d0169c2f","abutvS3f3yezBTsM");//database connection
mysql_select_db("d0169c2f");

// Define using data from form
$channel		= $_POST['inputchannel'];
$species		= $_POST['inputSpecies'];
$GPSLat 		= $_POST['inputLatitudeDec'];
$GPSLon 		= $_POST['inputLongitudeDec'];
$sightingDate		= $_POST['inputSightingDate'];
$sightingTime		= $_POST['inputTime'];
$certainty		= $_POST['inputCertainty'];
//$image		= $_POST['inputPhoto'];
$comments		= $_POST['inputComments'];
$firstName		= $_POST['inputFirstName'];
$lastName		= $_POST['inputLastName'];
$email			= $_POST['inputEmail'];
$phone			= $_POST['inputPhone'];
$correspondence 	= $_POST['inputCorrespondence'];


$GPSLatDeg		= $_POST['inputLatitudeDeg'];
$GPSLatMin		= $_POST['inputLatitudeMin'];
$GPSLatSec		= $_POST['inputLatitudeSec'];

$GPSLonDeg 		= $_POST['inputLongitudeDeg'];
$GPSLonMin 		= $_POST['inputLongitudeMin'];
$GPSLonSec 		= $_POST['inputLongitudeSec'];

// Check if the user input Decimal, if not try to calculate based on Deg/Min/Sec fields
if ((is_null($GPSLat))
|| ($GPSLat == 0.00000)){
	$GPSLat = round(($GPSLatDeg + ($GPSLatMin / 60) + ($GPSLatSec / 3600)), 5);
};

if ((is_null($GPSLon))
|| ($GPSLon == 0.00000)){
	$GPSLon = round(($GPSLonDeg + ($GPSLonMin / 60) + ($GPSLonSec / 3600)), 5);
};

// Get the ID from the database for use in PHP as a variable:
$sql 			= "SELECT ID FROM `data_input` ORDER BY ID DESC LIMIT 1";
$id 			= mysql_result(mysql_query($sql),0);
$photoID		= $id + 1;


//inserting data order
$order =	"INSERT INTO data_input (
			channel, species, GPSLat, GPSLon, sightingDate, sightingTime, 
			certainty, comments, firstName, lastName, 
			email, phone, correspondence)
			VALUES (
			'$channel', '$species', '$GPSLat', '$GPSLon', '$sightingDate',
			'$sightingTime', '$certainty', '$comments',
			'$firstName', '$lastName', '$email', '$phone', '$correspondence')";

//declare in the order variable
$result = mysql_query($order);	//order executes


// Upload and save Image:

// First security measure: test extension
$allowedExts	= array("gif", "jpeg", "jpg", "png");
$extension		= end(explode(".", $_FILES["inputPhoto"]["name"]));
$today			= date("Ymd");
$ext 			= pathinfo($_FILES['inputPhoto']['name'], PATHINFO_EXTENSION);

if ((($_FILES["inputPhoto"]["type"] == "image/gif")
|| ($_FILES["inputPhoto"]["type"] == "image/jpeg")
|| ($_FILES["inputPhoto"]["type"] == "image/jpg")
|| ($_FILES["inputPhoto"]["type"] == "image/pjpeg")
|| ($_FILES["inputPhoto"]["type"] == "image/x-png")
|| ($_FILES["inputPhoto"]["type"] == "image/png"))
&& ($_FILES["fiinputPhotole"]["size"] < 15000000) // Seccond security meausre - size limit: 15 Mb
&& in_array($extension, $allowedExts))
	{
	
	// Check if there is an error with the file:
	if ($_FILES["inputPhoto"]["error"] > 0)
		{
			$file_upload_error = "Return Code: " . $_FILES["inputPhoto"]["error"] . "<br>";
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
		if (file_exists("upload/" . $today . "-" . $photoID ."." . $ext))
		{
			$file_upload_error = $_FILES["inputPhoto"]["name"] . " already exists. ";
		}
		
		// Move files into place:
		else
		{
			move_uploaded_file($_FILES["inputPhoto"]["tmp_name"],
			"upload/" . $today . "-" . $photoID ."." . $ext);
		}
	}
}


// Inform the user that the file type was unacceptable:
else
{
	$file_upload_error = "Invalid file";
}


if(($channel == P)
&&($result)
&&($file_upload_error)){
	echo "<link rel='stylesheet' type='text/css' href='css/bootstrap.css' />";
	echo "<link rel='stylesheet' type='text/css' href='css/bootstrap-responsive.css' />";
	echo "<div class='container'>
		<div class='row'>
			<h2 class='text-success'>Data input has succeeded!</h2>
				<div class='span11 offset1'>
					<p class='lead' align='justify'>
						Data input has succeeded, however the image upload seems to have failed.
						Please submit your image(s) via email to: info@HerpRepository.org. Kindly include your 
						submission ID number in the email subject. <br>
						SUBMISSION ID NUMBER: " . $photoID . "<br> error code: " . $file_upload_error . "<br>
						Thank you for your submission to the Herp Repository of Cyprus. Please 
						choose from one of the options below:
					</p>
				</div>
				<div class='row span12'>
					<a class='btn btn-large btn-primary span2 offset1' href='submitPhotoForm.html'>Submit Photo &raquo;</a>
					<a class='btn btn-large btn-danger span2' href='scientificNameForm.html'>Report Sighting &raquo;</a>
					<a class='btn-large btn-success span2' href='educate.html'>Learn &raquo;</a>
					<a class='btn-large btn-info span2' href='index.html'>Home &raquo;</a>
				</div>
			</div>
		</div>";
	}


else{
	// header("Refresh: 3; url=http://www.herprepository.org");
	echo "<link rel='stylesheet' type='text/css' href='css/bootstrap.css' />";
	echo "<link rel='stylesheet' type='text/css' href='css/bootstrap-responsive.css' />";
	echo "<div class='container'>
		<div class='row'>
			<h2 class='text-success'>Success!</h2>
				<div class='span11 offset1'>
					<p class='lead' align='justify'>
						Thank you for your submission to the Herp Repository of Cyprus. Please choose from one of the options below:
					</p>
				</div>
				<div class='row span12'>
					<a class='btn btn-large btn-primary span2 offset1' href='submitPhotoForm.html'>Submit Photo &raquo;</a>
					<a class='btn btn-large btn-danger span2' href='scientificNameForm.html'>Report Sighting &raquo;</a>
					<a class='btn-large btn-success span2' href='educate.html'>Learn &raquo;</a>
					<a class='btn-large btn-info span2' href='index.html'>Home &raquo;</a>
				</div>
			</div>
		</div>";
}
?>
