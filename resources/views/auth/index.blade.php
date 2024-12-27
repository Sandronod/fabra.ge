<!DOCTYPE html>


<!--


Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5


Version: 4.5.1


Author: KeenThemes


Website: http://www.keenthemes.com/


Contact: support@keenthemes.com


Follow: www.twitter.com/keenthemes


Like: www.facebook.com/keenthemes


Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes


License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.


-->


<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->


<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->


<!--[if !IE]><!-->


<html lang="en">


<!--<![endif]-->


<!-- BEGIN HEAD -->


<head>


    @include('auth/partials/head')


</head>


<!-- END HEAD -->


<body class="auth">


	<div class="logo">


	    <a href="?">


	     <!--  <img src="{{ url('assets/nn_cms/layouts/layout/img/logo-orien-medium-size.png') }}" width="88" height="23" alt="">-->


	    </a>


	</div>


	<!-- BEGIN CONTENT -->





	@include('auth/login')


	


	<!-- END CONTENT -->


	<!-- BEGIN FOOTER -->


	@include('auth/partials/footer')


	<!-- END FOOTER -->


</body>


</html>
