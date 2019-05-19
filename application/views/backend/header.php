<!doctype html>
<html class="loading" lang="zh-CN" data-textdirection="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<!--	<meta name="description" content="">-->
	<!--	<meta name="keywords" content="">-->
	<meta name="author" content="Lina - Senior Web Dev">

	<title><?=$title?> | <?=APPNAME?></title>

	<link rel="apple-touch-icon" href="public/backend/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="public/backend/images/ico/favicon.ico">

	<link rel="stylesheet" type="text/css" href="public/backend/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/backend/css/bootstrap-extended.min.css">
	<link rel="stylesheet" type="text/css" href="public/backend/css/colors.min.css">
	<link rel="stylesheet" type="text/css" href="public/backend/css/components.min.css">
	<link rel="stylesheet" type="text/css" href="public/backend/css/core/menu/menu-types/vertical-menu-modern.css">
	<link rel="stylesheet" type="text/css" href="public/backend/css/core/colors/palette-gradient.min.css">
	<link rel="stylesheet" type="text/css" href="public/backend/vendors/css/extensions/pace.css">

	<!-- Font Icons -->
	<?php
	if (isset($lineawesome))
		echo '<link rel="stylesheet" type="text/css" href="public/backend/fonts/line-awesome/css/line-awesome.min.css">';
	?>

	<style>
		.header-navbar .navbar-container ul.nav li a.nav-link-search, .header-navbar .navbar-container ul.nav li a.nav-link-expand {
			padding: 1.6rem 1rem 1.7rem 1rem;
		}

		@media (max-width: 767.98px) {
			.header-navbar .navbar-header .navbar-brand {
				top: -8px;
			}
		}
	</style>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">