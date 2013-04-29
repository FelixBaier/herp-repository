<?
/*	the example of inserting data with variable from HTML form
	input.php */


/* database user info */
$user = "d0169c2f"
$password = "abutvS3f3yezBTsM"
$database = "d0169c2f"

/* database connection */
$mysqli = new mysqli("localhost", $user, $password, $database);
// mysql_connect("localhost","root","admin");
// mysql_select_db("employees");


/* check connection */
if (mysqli_connect_errno()) {
  printf('Connect failed: %s\n', mysqli_connect_error());
  exit();
}



/* inserting data into table */
$query = 'INSERT INTO data_input VALUES(
	$inputSpecies, 
	$inputCertainty, 
	$inputLatitudeDec, 
	$inputLongitudeDec,
	$inputSightingDate,
	$inputTime,
	$inputPhoto,
	$inputComments,
	$inputFirstName,
	$inputLastName,
	$inputEmail,
	$inputCorrespondence,
	$inputPhone,
	)';
$mysqli->query($query);

printf ('New Record has id %d.\n', $mysqli->insert_id);

/* close connection */
$mysqli->close();


/* $order = "INSERT INTO data_employees
            (name, address)
            VALUES
            ('$name',
            '$address')"; */

?>
