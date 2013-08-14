/**
 * @author Aidan Quinn
 */

/***********************************************
* This is the form checker: It ensures         *
* the requisite variables  are valid before    *
* allowing the user to submit the form         *
***********************************************/

function multiFormChecker(fName){
	alert("Im Running!");
	return false;
	
	/*
	var species 			= fName["inputSpecies"].value;
	var inputLatitudeDec 	= fName["inputLatitudeDec"].value;
	var inputLatitudeDec 	= fName["inputLatitudeDeg"].value;
	var inputLongitudeDec 	= fName["inputLongitudeDec"].value;
	var inputLongitudeDeg 	= fName["inputLongitudeDeg"].value;
	var inputSightingDate 	= fName["inputSightingDate"].value;
	var inputFirstName 		= fName["inputFirstName"].value;
	var inputLastName 		= fName["inputLastName"].value;
	var inputEmail 			= fName["inputEmail"].value;
	
	
	
	if(species == '' || species == null) {
    alert("The species is required, please check the form and try again.");
    // sciNameForm.inputSpecies.focus();
    return false;
 	}
	else if(inputLatitudeDec == '' || inputLatitudeDec == null) {
		if(inputLatitudeDeg == '' || inputLatitudeDeg == null) {
			alert("The GPS coordinates are required (either decimal or degree). If you do not know them you may zoom in then left-click on the map to automatically populate these fields.");
		    // sciNameForm.inputLatitudeDec.focus();
	    	return false;
	    }
	  }
	else if(inputLongitudeDec == '' || inputLongitudeDec == null){
		if(inputLongitudeDeg == '' || inputLongitudeDeg == null) {
			alert("The GPS coordinates are required (either decimal or degree). If you do not know them you may zoom in then left-click on the map to automatically populate these fields.");
		    // sciNameForm.inputLongitudeDec.focus();
		    return false;
		  }
	  }
	else if(inputSightingDate == '' || inputSightingDate == null) {
		alert("The sighting date is required, please check the form and try again.");
	    // sciNameForm.inputSightingDate.focus();
	    return false;
	  }
	else if(inputFirstName == '' || inputFirstName == null) {
			if(inputLastName == '' || inputLastName == null) {
		      alert("Please submit your name, it helps us keep track of the total number of users. Don't worry, we wont share your personal information with anyone.");
		      // sciNameForm.inputFirstName.focus();
		      return false;
		      }
			}
	else if(inputEmail == '' || inputEmail == null) {
		alert("A valid email address is required, please check the form and try again. Don't worry, we wont share your personal information with anyone.");
	    // sciNameForm.inputEmail.focus();
	    return false;
	}
	return true;
}


*/