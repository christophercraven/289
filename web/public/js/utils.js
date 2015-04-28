$(document).ready(function () {
	/**
 * 
 * 
 * 
 */ first hide all the hard-coded error and alert divs
	Init.hide();
	/**
 * 
 * 
 * 
 */ move serverside error messages closer to the submit button for better UI/UX
	Init.move();
	/**
 * 
 * 
 * 
 */ prevent default behavior of form submit buttons to validate
	Init.submit("#registerForm");
	Init.submit("#loginForm");
	Init.warning();

});

/**
 * 
 * 
 * 
 */ Initial functions to hide alerts and prevent form submit buttons
var Init = {
	hide: function () {
	    $("#loginForm .alert").hide();
		$("#registerForm .alert").hide();
		$("div.profile .alert").hide();
	},
	submit: function (id) {
		$(id).submit(function(event){ 
			event.preventDefault(); 
			if ("#registerForm" == id) Register.validate();
			else if ("#loginForm"    == id) Login.validate();
			else if ("#profileForm"  == id) Profile.validate();
		}) 
	},
	move: function () {
		submit = $('#loginForm').find('input[type="submit"]');
		$('.errorMessage').addClass('alert');
		submit.before($('.errorMessage'));
		
	},
	warning: function() {
		sign = '<span class="sign"><svg version="1.2" baseProfile="tiny" xmlns="http:/**
 * 
 * 
 * 
 */www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21.171 15.398l-5.912-9.854c-.776-1.293-1.963-2.033-3.259-2.033s-2.483.74-3.259 2.031l-5.912 9.856c-.786 1.309-.872 2.705-.235 3.83.636 1.126 1.878 1.772 3.406 1.772h12c1.528 0 2.77-.646 3.406-1.771.637-1.125.551-2.521-.235-3.831zm-9.171 2.151c-.854 0-1.55-.695-1.55-1.549 0-.855.695-1.551 1.55-1.551s1.55.696 1.55 1.551c0 .854-.696 1.549-1.55 1.549zm1.633-7.424c-.011.031-1.401 3.468-1.401 3.468-.038.094-.13.156-.231.156s-.193-.062-.231-.156l-1.391-3.438c-.09-.233-.129-.443-.129-.655 0-.965.785-1.75 1.75-1.75s1.75.785 1.75 1.75c0 .212-.039.422-.117.625z"/></svg> </span>';
		$('.errorMessage, .alert').prepend(sign);
	}
	
	
}

var Profile = {
    check: function (id) {
        if ($.trim($("#" + id)[0].value) != 'demo@demo.com') {
            $("#" + id)[0].focus();
            $("#" + id + "_alert").html('<strong>Sorry!</strong> Demo account cannot be changed at this time');
            $("#" + id + "_alert").show();

            return false;
        };

        return true;
    },
    validate: function () {
        if (Empty.check("name")) {
            return false;
        }
        if (Empty.check("email")) {
            return false;
        }
        if (Profile.check("email") == false) {
            return false;
        }
        $("#profileForm")[0].submit();
    }
};

var Register = {
    validate: function () {
	console.log('register form activated');
        if (Empty.check("name")) {
            return false;
        }
/*         if (Empty.check("username")) {
            return false;
        } */
        if (Empty.check("email")) {
            return false;
        }
      /*   if (Empty.check("password")) {
            return false;
        } */
/*         if ($("#password")[0].value != $("#repeatPassword")[0].value) {
            $("#repeatPassword")[0].focus();
            $("#repeatPassword_alert").show();

            return false;
        } */
		console.log('sign up clicked');
        $("#registerForm")[0].submit();
    }
}

var Login = {
	validate: function () {

	    if (Empty.check("email")) {
            return false;
        }
        if (Empty.check("password")) {
            return false;
        }
		
        $("#loginForm")[0].submit();
	}
}

/**
 * 
 * 
 * 
 */ check if text field is empty or not
var Empty = {
	check: function (id) {
	console.log(id, "-> Empty checking");
		if ($.trim($("#" + id)[0].value) == '') {
			$("#" + id)[0].focus();
			$(".alert").hide();
			$("#" + id + "_alert").show();
            console.log("#" + id + "_alert is empty");
			return true;
		};
	return false;
	}
}

