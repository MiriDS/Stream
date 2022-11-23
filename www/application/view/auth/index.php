<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Stream Control">
	<meta name="author" content="MiriDS">

	<title>Stream control</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>	
	<link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="<?php echo URL; ?>vendors/core/core.css">
	<!-- endinject -->

	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo URL; ?>fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?php echo URL; ?>vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="<?php echo URL; ?>css/style.css?v=2">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="<?php echo URL; ?>images/favicon.png" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
               					<div class="col-md-4 pe-md-0">
									<div class="auth-side-wrapper">

									</div>
                				</div>
                				<div class="col-md-8 ps-md-0">
                  					<div class="auth-form-wrapper px-4 py-5">
                    					<a href="#" class="noble-ui-logo d-block mb-2">S<span>C</span></a>
                    					<h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
										<?php if (isset($loginState) && $loginState == 'error') { print '<div class="alert alert-danger" role="alert">Username or password is incorrect. Please try again.</div>'; } ?>										
                    					<form class="forms-sample" action="<?php echo URL; ?>auth" method="post">
											<div class="mb-3">
												<label for="username" class="form-label">Login</label>
												<input type="text" class="form-control" name="username" placeholder="Login">
											</div>
											<div class="mb-3">
												<label for="password" class="form-label">Password</label>
												<input type="password" class="form-control" name="password" autocomplete="current-password" placeholder="Password">
											</div>
											<button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Login</button>
										</form>
                  					</div>
                				</div>
              				</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="<?php echo URL; ?>vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="<?php echo URL; ?>vendors/feather-icons/feather.min.js"></script>
	<script src="<?php echo URL; ?>js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

</body>
</html>