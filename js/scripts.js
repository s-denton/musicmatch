///////// Contact Modal Toggle ///////////
$("#contactLink").click(function() {
	$("#contact").modal('toggle');
});

$("#contactForm").submit(function(event) {
	// cancels the form submission
	event.preventDefault();
	submitForm();
});

function submitForm() {
	var name = $("#contact_name").val();
	var email = $("#contact_email").val();
	var message = $("#contact_msg").val();

	$.ajax({
		type: "POST", 
		url: "includes/contact.php", 
		data: "name=" + name + "&email=" + email + "&message=" + message, 
		success: function(text) {
			$("#contact").modal('toggle');
			$("#responseModal").modal('toggle');
			setTimeout(function() {
				$("#responseModal").modal('toggle');
			}, 5000);
		}, 
		error: function(text) {
			alert("Error occurred");
		}
	});
}

function formSuccess() {
	$("#msgSubmit").removeClass('hidden');
}
///////////////////////////////////////////
///////////// Browsing Song Functions////////////
function showSongsByGenre(str) {
	if(str == "") {
		document.getElementById("browse_results").innerHTML = "";
		return;
	} else {
		if(window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			ajaxRequest = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
		}
		ajaxRequest.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				document.getElementById("browse_results").innerHTML = this.responseText;
				audiojs.events.ready(function() {
					var as = audiojs.createAll();
				});
			}
		};
		ajaxRequest.open("GET", "includes/getSongsByGenre.php?q=" + str, true);
		ajaxRequest.send();
	}
}

function showSongsByUser(str) {
	if(str == "") {
		document.getElementById("browse_results").innerHTML = "";
		return;
	} else {
		if(window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			ajaxRequest = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
		}
		ajaxRequest.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				document.getElementById("browse_results").innerHTML = this.responseText;
				audiojs.events.ready(function() {
					var as = audiojs.createAll();
				});
			}
		};
		ajaxRequest.open("GET", "includes/getSongsByUser.php?q=" + str, true);
		ajaxRequest.send();
	}
}

function showSongsByPrice(str) {
	if(str == "") {
		document.getElementById("browse_results").innerHTML = "";
		return;
	} else {
		if(window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			ajaxRequest = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
		}
		ajaxRequest.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				document.getElementById("browse_results").innerHTML = this.responseText;
				audiojs.events.ready(function() {
					var as = audiojs.createAll();
				});
			}
		};
		ajaxRequest.open("GET", "includes/getSongsByPrice.php?q=" + str, true);
		ajaxRequest.send();
	}
}
///////////////////////////////////////////////////////////////

////////// Delete Song on Trash Icon Click //////////////
$("#delete_icon").click(function() {
	var songId = $("#delete_icon").val();

	$.ajax({
		type: "POST",
		url: "includes/deleteSong.php",
		data: "song_id=" + song_id,
		success: function(text) {
			msgModalView("Success", "The song was deleted successfully!");
			setTimeout(function() {
				$("#msgModal").modal('toggle');
			}, 5000);
		},
		error: function(text) {
			alert("Error occurred")
		}
	});
});
////////////////////////////////////////////////////////

////////////////Forgot Password /////////////////////
$("#forgotPassword").click(function() {
	$("#forgotPasswordModal").modal('toggle');
});

$("#forgotPasswordForm").submit(function() {
	// cancels the form submission
	event.preventDefault();
	mailPassword();
});

function mailPassword() {
	// store the email address from the modal form
	var email = $("#forgotEmail").val();

	$.ajax({
		type: "POST", 
		url: "includes/forgotPassword.php", 
		data: "email=" + email, 
		success: function(text) {
			$("#forgotPasswordModal").modal('toggle');
			msgModalView("Check Your Email", "We have sent your password to the specified email address");
			setTimeout(function() {
				$("#msgModal").modal('toggle');
			}, 5000);

		}, 
		error: function(text) {
			alert("Error occurred");
		}
	});
}
/////////////////////////////////////////////////////

//////////////// Mailing List Subscription//////////////////
$("#landingEmail").submit(function() {
	// cancels the form submission
	event.preventDefault();
	subscribe();
});

function subscribe() {
	// store the email address from the modal form
	var email = $("#mailing").val();

	$.ajax({
		type: "POST", 
		url: "includes/subscribe.php", 
		data: "email=" + email, 
		success: function(text) {
			msgModalView("Thank You", "You have been added to the mailing list!");
			setTimeout(function() {
				$("#msgModal").modal('toggle');
			}, 5000);

		}, 
		error: function(text) {
			alert("Error occurred");
		}
	});
}
////////////////////////////////////////////////////////////

//////////// Generic Modal Script //////////////
function msgModalView(header, body) {
	$("#msgModal").modal('toggle');
	$("#msgHeader").html(header);
	$("#msgBody").html(body);
}
////////////////////////////////////////////////

