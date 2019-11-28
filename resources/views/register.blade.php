<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				 <form action="/register" method="post" class="login100-form validate-form flex-sb flex-w">
                          {{ csrf_field() }}
					<span class="login100-form-title p-b-51">
						Register
					</span>


					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input name="email" required class="input100" type="email" name="username" placeholder="Email">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input name="password" required class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-24">

						<div>
							<a href="/login" class="txt1">
								Have Account Signin ?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit">
							Register
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<script src="js/login.js"></script>

</body>
</html>
