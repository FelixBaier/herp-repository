/**
 * @author Aidan Quinn
 */

/***********************************************
* This is the photo form checker: It ensures         *
* the requisite variables on the photo page are valid before    *
* allowing the user to submit the form         *
***********************************************/

function formChecker(){

    ///if(photoForm.fileupload.value == '' || photoForm.fileupload.value == null) {
    ///alert("A photo is required, please check the form and try again.");
    ///photoForm.fileupload.focus();
    ///return false;
 	///} else
  	
  if(photoForm.inputLatitudeDec.value == '' || photoForm.inputLatitudeDec.value == null) {
	  if(photoForm.inputLatitudeDeg.value == '' || photoForm.inputLatitudeDeg.value == null) {
	    alert("The GPS coordinates are required (either decimal or degree). If you do not know them you may zoom in then left-click on the map to automatically populate these fields.");
	    photoForm.inputLatitudeDec.focus();
    	  return false;
    }
  }
  else if(photoForm.inputLongitudeDec.value == '' || photoForm.inputLongitudeDec.value == null){
	  if(photoForm.inputLongitudeDeg.value == '' || photoForm.inputLongitudeDeg.value == null) {
	    alert("The GPS coordinates are required (either decimal or degree). If you do not know them you may zoom in then left-click on the map to automatically populate these fields.");
	    photoForm.inputLongitudeDec.focus();
	    return false;
	  }
  }
  else if(photoForm.inputSightingDate.value == '' || photoForm.inputSightingDate.value == null) {
    alert("The sighting date is required, please check the form and try again.");
    photoForm.inputSightingDate.focus();
    return false;
  }
				else if(photoForm.inputFirstName.value == '' || photoForm.inputFirstName.value == null) {
					if(photoForm.inputLastName.value == '' || photoForm.inputLastName.value == null) {
	    alert("Please submit your name, it helps us keep track of the total number of users. Don't worry, we won't share your personal information with anyone.");
	    photoForm.inputFirstName.focus();
	    return false;
	 }
				}
				else if(photoForm.inputEmail.value == '' || photoForm.inputEmail.value == null) {
    alert("A valid email address is required, please check the form and try again. Don't worry, we wont share your personal information with anyone.");
    photoForm.inputEmail.focus();
    return false;
 }
};