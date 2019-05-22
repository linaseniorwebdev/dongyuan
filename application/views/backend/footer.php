<footer class="footer footer-static footer-light navbar-border navbar-shadow">
	<p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
		<span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2019 <a class="text-bold-800 grey darken-2" href="#">Senior</a>, All rights reserved. </span>
		<span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"></span>
	</p>
</footer>

<script src="public/backend/vendors/js/vendors.min.js"></script>
<script src="public/backend/js/core/app-menu.js"></script>
<script src="public/backend/js/core/app.js"></script>
<script src="public/backend/vendors/js/extensions/sweetalert.min.js"></script>

<!-- Switchery -->
<?php
if (isset($switchery)) {
	echo '<script src="public/backend/vendors/js/forms/toggle/switchery.min.js"></script>';
}
?>

<?php
if (isset($name)) {
	echo '<script src="public/backend/custom/' . $name . '.js"></script>';
}
?>

</body>
</html>