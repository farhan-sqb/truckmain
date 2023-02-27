		// validate signup form on keyup and submit
		$("#forgotPassForm").validate({
			rules: {
                forgotEmail: {
					required: true,
					email: true
				}
			},
			messages: {
				forgotEmail: "Email is required.",
			}
		});
