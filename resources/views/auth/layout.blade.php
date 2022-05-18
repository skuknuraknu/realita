<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--favicon-->
		<link rel="icon" href="{{asset('assets')}}/images/favicon-32x32.png" type="image/png" />
		<!-- loader-->
		<link href="{{asset('assets')}}/css/pace.min.css" rel="stylesheet" />
		<script src="{{asset('assets')}}/js/pace.min.js"></script>
		<!-- Bootstrap CSS -->
		<link href="{{asset('assets')}}/css/bootstrap.min.css" rel="stylesheet">
		<link href="{{asset('assets')}}/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
		<link href="{{asset('assets')}}/css/app.css" rel="stylesheet">
		<link href="{{asset('assets')}}/css/icons.css" rel="stylesheet">
		<title>{{config('app.name', 'Realita')}}</title>
</head>
<body class="bg-theme bg-theme2">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="assets/images/logo-img.png" width="180" alt="" />
						</div>
						@yield('content')
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->


	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
</body>
</html>
