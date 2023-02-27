		// validate signup form on keyup and submit
		$("#loginForm").validate({
			rules: {
                loginEmail: {
					required: true,
					email: true
				},
                loginPassword: {
					required: true,
				},

			},
			messages: {
				loginEmail: "Email is required.",
                loginPassword: "Password is required"
			}
		});
