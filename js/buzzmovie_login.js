var Login = function() {
	return {
		init: function() {
			$.backstretch([
				"images/7c91891d540b46f6a72def2f7992ec23.jpg",
				"images/3576a730411d466abe9d2fda69080737.jpg",
				"images/d6998a7f91b244f3ab2b69482e61ea60.jpg"], { fade: 1000, duration: 4000 });
		}
	};
}();

function submitValidForm() {
	var id = document.forms["signUpForm"]["id"].value;
	var email = document.forms["signUpForm"]["email"].value;
	var studentCode = document.forms["signUpForm"]["studentCode"].value;
	var name = document.forms["signUpForm"]["name"].value;

	var password = document.forms["signUpForm"]["password"].value;
	var password_onemore = document.forms["signUpForm"]["rpt_password"].value;

	if(id == null || email == null || name == null || studentCode == null || password == null || password_onemore == null || id == "" || email == "" || name == "" || studentCode == "" || password == "" || password_onemore == "") {
		Materialize.toast('Fill out this!', 4000);
		return false;
	}

	if(password != password_onemore) {
		Materialize.toast('Your password and re-password should be same.', 4000);
		return false;
	}

	//document.getElementById("signUpForm").submit();
}
