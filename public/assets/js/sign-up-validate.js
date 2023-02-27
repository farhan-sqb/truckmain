		// validate signup form on keyup and submit
		$("#signUpForm").validate({
			rules: {
				fname: "required",
                lname: "required",
                email: {
					required: true,
					email: true
				},
                mobileNumber: "required",
                password: {
					required: true,
					minlength: 5
				},

			},
			messages: {
				fname: "First Name is required.",
                lname: "Last Name is required.",
				email: "Email is required.",
                mobileNumber: "Phone is required.",
                password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				}
			}
		});
