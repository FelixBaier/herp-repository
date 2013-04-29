/*
 * Form Listener: waits for sumbit and gathers form data then
 * posts to PHP for SQL execution.
 *  :)
 */
var dataForm = {
	send : function () {
		$('button[type=submit]').click(function(event) {
			event.preventDefault();
			var species = $('form input#inputSpecies').val();
			var certainty = $('form input#inputCertainty').val();
			var GPSLat = $('form input#inputLatitudeDec').val();
			var GPSLon = $('form input#inputLongitudeDec').val();
			var sightingDate = $('form input#inputSightingDate').val();
			var sightingTime = $('form input#inputTime').val();
			var image = $('form input#inputPhoto').val();
			var comments = $('form input#inputComments').val();
			var firstName = $('form input#inputFirstName').val();
			var lastName = $('form input#inputLastName').val();
			var email = $('form input#inputEmail').val();
			var correspondence = $('form input#inputCorrespondence').val();
			var phone = $('form input#inputPhone').val();
			try {
				$.post('dataPostForm.php', {
					species: species,
					certainty: certainty,
					GPSLat: GPSLat,
					GPSLon: GPSLon,
					sightingDate: sightingDate,
					sightingTime: sightingTime,
					image: image,
					comments: comments,
					firstName: firstName,
					lastName: lastName,
					email: email,
					correspondence: correspondence,
					phone: phone,
					}, function(data) {
					//$('').text('Your sighting has been recorded successfully!');	
				});
			} catch (e) {
				//$('').text('There was a problem accepting your species sighting. Please refresh the page and try again.');
			}
			$("input[placeholder]").val('');
			setTimeout("$('div#myAlert').fadeIn(800);", 500);
			setTimeout("$('div#myAlert').fadeOut(800);", 3500);
		});
	}
}

$(document).ready(function() {
	dataForm.send();
});