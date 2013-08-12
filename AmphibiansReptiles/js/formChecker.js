/**
 * @author Aidan Quinn
 */

/***********************************************
* This is the form checker: It ensures         *
* the requisite variables  are valid before    *
* allowing the user to submit the form         *
***********************************************/

function formChecker(){
	if(sciNameForm.inputSpecies.value == '' || sciNameForm.inputSpecies.value == null) {
    alert("The species is required, please check the form and try again.");
    sciNameForm.inputSpecies.focus();
    return false;
 	}
  else if(sciNameForm.inputLatitudeDec.value == '' || sciNameForm.inputLatitudeDec.value == null) {
	  if(sciNameForm.inputLatitudeDeg.value == '' || sciNameForm.inputLatitudeDeg.value == null) {
	    alert("The GPS coordinates are required (either decimal or degree). If you do not know them you may zoom in then left-click on the map to automatically populate these fields.");
	    sciNameForm.inputLatitudeDec.focus();
    	  return false;
    }
  }
  else if(sciNameForm.inputLongitudeDec.value == '' || sciNameForm.inputLongitudeDec.value == null){
	  if(sciNameForm.inputLongitudeDeg.value == '' || sciNameForm.inputLongitudeDeg.value == null) {
	    alert("The GPS coordinates are required (either decimal or degree). If you do not know them you may zoom in then left-click on the map to automatically populate these fields.");
	    sciNameForm.inputLongitudeDec.focus();
	    return false;
	  }
  }
  else if(sciNameForm.inputSightingDate.value == '' || sciNameForm.inputSightingDate.value == null) {
    alert("The sighting date is required, please check the form and try again.");
    sciNameForm.inputSightingDate.focus();
    return false;
  }
				else if(sciNameForm.inputFirstName.value == '' || sciNameForm.inputFirstName.value == null) {
					if(sciNameForm.inputLastName.value == '' || sciNameForm.inputLastName.value == null) {
	    alert("Please submit your name, it helps us keep track of the total number of users. Don't worry, we wont share your personal information with anyone.");
	    sciNameForm.inputFirstName.focus();
	    return false;
	 }
				}
				else if(sciNameForm.inputEmail.value == '' || sciNameForm.inputEmail.value == null) {
    alert("A valid email address is required, please check the form and try again. Don't worry, we wont share your personal information with anyone.");
    sciNameForm.inputEmail.focus();
    return false;
 }
};