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

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="<?php echo URL; ?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo URL; ?>fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?php echo URL; ?>vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

	<!-- Layout styles -->  
	<link rel="stylesheet" href="<?php echo URL; ?>css/style.css">
	<!-- End layout styles -->

	<!-- core:js -->
	<script src="<?php echo URL; ?>vendors/core/core.js"></script>
	<!-- endinject -->

	<link rel="shortcut icon" href="<?php echo URL; ?>images/favicon.png" />
</head>
<body class="sidebar-dark">
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
			<div class="sidebar-header">
				<a href="#" class="sidebar-brand">
				S<span>C</span>
				</a>
				<div class="sidebar-toggler not-active">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="sidebar-body">
				<ul class="nav">
				<li class="nav-item nav-category">Categories</li>
				<li class="nav-item">
					<a href="<?php echo URL; ?>" class="nav-link">
						<i class="link-icon" data-feather="box"></i>
						<span class="link-title">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL; ?>users" class="nav-link">
						<i class="link-icon" data-feather="smile"></i>
						<span class="link-title">Users</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL; ?>servers" class="nav-link">
						<i class="link-icon" data-feather="server"></i>
						<span class="link-title">Servers</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL; ?>channels" class="nav-link">
						<i class="link-icon" data-feather="layers"></i>
						<span class="link-title">Channels</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL; ?>channel_groups" class="nav-link">
						<i class="link-icon" data-feather="grid"></i>
						<span class="link-title">Channel groups</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL; ?>scheduler" class="nav-link">
						<i class="link-icon" data-feather="list"></i>
						<span class="link-title">Scheduler</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL; ?>history" class="nav-link">
						<i class="link-icon" data-feather="calendar"></i>
						<span class="link-title">History</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="collapse" href="#settings" role="button" aria-expanded="false" aria-controls="settings">
						<i class="link-icon" data-feather="settings"></i>
						<span class="link-title">Settings</span>
						<i class="link-arrow" data-feather="chevron-down"></i>
					</a>
					<div class="collapse" id="settings">
						<ul class="nav sub-menu">
							<li class="nav-item">
								<a href="<?php echo URL; ?>graphic_presets" class="nav-link">Graphic presets</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo URL; ?>text_presets" class="nav-link">Text presets</a>
							</li>
						</ul>
					</div>
				</li>				
			</ul>
		</div>
    </nav>
</nav>
<!-- partial -->
<div class="page-wrapper">		
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar">
        <a href="#" class="sidebar-toggler">
            <i data-feather="menu"></i>
        </a>
        <div class="navbar-content">
            <ul class="navbar-nav">                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="wd-30 ht-30 rounded-circle" src="<?php echo URL; ?>images/ds.png" alt="profile">
                    </a>
                    <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                        <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                            <div class="mb-3">
                                <img class="wd-80 ht-80 rounded-circle" src="<?php echo URL; ?>images/ds.png" alt="">
                            </div>
                            <div class="text-center">
                                <p class="tx-16 fw-bolder">Admin</p>
                                <p class="tx-12 text-muted">amiahburton@gmail.com</p>
                            </div>
                        </div>
                        <ul class="list-unstyled p-1">                            
                            <li class="dropdown-item py-2">
                                <a href="javascript:;" class="text-body ms-0">
                                    <i class="me-2 icon-md" data-feather="log-out"></i>
                                    <span>Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        function objectifyForm(formArray) {
            //serialize data function
            var returnArray = {};
            for (var i = 0; i < formArray.length; i++){
                returnArray[formArray[i]['name']] = formArray[i]['value'];
            }
            return returnArray;
        }
    </script>
    <!-- partial -->
