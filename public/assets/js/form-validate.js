		// validate signup form on keyup and submit
		$("#contactForm").validate({
			rules: {
				fullName: "required",
				email: {
					required: true,
					email: true
				},
				phoneNumber: "required",
				comment: "required"
			},
			messages: {
				fullName: "Enter your fullname",
				email: "Enter a valid email address",
                phoneNumber: "Enter your phone number",
				comment: "Describe your concern"
			}
		});
