<!doctype html>
<html class="loading" lang="zh-CN" data-textdirection="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<!--	<meta name="description" content="">-->
	<!--	<meta name="keywords" content="">-->
	<meta name="author" content="Lina - Senior Web Dev">

	<title>管理后台登录 | <?php echo APPNAME; ?></title>

	<link rel="apple-touch-icon" href="public/backend/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="public/backend/images/ico/favicon.ico">

	<link rel="stylesheet" type="text/css" href="public/backend/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/backend/css/bootstrap-extended.min.css">
	<link rel="stylesheet" type="text/css" href="public/backend/css/colors.min.css">
	<link rel="stylesheet" type="text/css" href="public/backend/css/components.min.css">
	<link rel="stylesheet" type="text/css" href="public/backend/css/core/menu/menu-types/vertical-menu-modern.css">
	<link rel="stylesheet" type="text/css" href="public/backend/css/core/colors/palette-gradient.min.css">
	<link rel="stylesheet" type="text/css" href="public/backend/vendors/css/extensions/pace.css">

	<link rel="stylesheet" type="text/css" href="public/backend/fonts/line-awesome/css/line-awesome.min.css">
</head>
<body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-body">
			<section class="flexbox-container">
				<div class="col-12 d-flex align-items-center justify-content-center">
					<div class="col-md-4 col-10 box-shadow-2 p-0">
						<div class="card border-grey border-lighten-3 px-1 py-1 m-0">
							<div class="card-header border-0">
								<div class="card-title text-center">
									<img src="public/backend/images/logo/logo.png" alt="logo" style="width: 40px; display: inline-block;" />
									<h3 class="brand-text" style="display: inline-block !important; vertical-align: middle; margin-bottom: 0;"><?php echo APPNAME; ?></h3>
								</div>
							</div>
							<div class="card-content">
								<?php
								if (isset($message)) {
									echo '<h3 class="text-center text-danger">' . $message . '</h3>';
								}
								?>
								<div class="card-body">
									<form class="form-horizontal" action="<?php echo base_url('admin/signin'); ?>" method="post" novalidate>
										<fieldset class="form-group position-relative has-icon-left">
											<input type="text" class="form-control" name="username" placeholder="账户" <?php if (isset($username)) echo 'value="' . $username . '"'; ?> required />
											<div class="form-control-position">
												<i class="la la-user"></i>
											</div>
										</fieldset>
										<fieldset class="form-group position-relative has-icon-left">
											<input type="password" class="form-control" name="password" placeholder="密码" required>
											<div class="form-control-position">
												<i class="la la-key"></i>
											</div>
										</fieldset>
										<button type="submit" class="btn btn-outline-info btn-block">Login</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<script src="public/backend/vendors/js/vendors.min.js"></script>
<script src="public/backend/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
<script src="public/backend/js/core/app-menu.js"></script>
<script src="public/backend/js/core/app.js"></script>

<script>
	$(document).ready(function(){
		'use strict';
		if ($("form.form-horizontal").attr("novalidate") !== undefined) {
			$("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
		}
	});
</script>

</body>
</html>