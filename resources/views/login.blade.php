<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V13</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>	
	</style>
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url({{asset('image2/1.png')}});">
			
			</div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50" style=" background-image: url({{asset('image2/bg.png')}});">
				<div class="row " style="margin-top: 20%; ">
					<img src="{{asset('image2/logo.png')}}" class="img-fluaid" style="width: 50%; margin-left: 27%;">

				</div>
				<form action="{{url('/login')}}" method="post">
					@csrf
					@if (Session::has('message'))
						<div class="alert alert-danger" role="alert">
							{{ Session::get('message') }}
						</div>
				 	@endif
							<button type="submit" class="btn btn-primary" style=" background-color:#1dc5ca;color: white; border-radius: 26px; width: 57%;margin-left: 24%;font-size: 20px;"><i class="fa fa-google mr-3 fa-lg">  </i>تسجيل الدخول</button>

				</form>
				<br>
				{{-- <div class="row"> --}}
					<p style="  text-align: center;margin-top: 37%;font-size: 20px;">ليس لديك حساب ؟ <a href="#" style="color:#10858b ;font-size: 20px;">تواصل معنا</a></p>
				{{-- </div> --}}
				
			</div>
			
		</div>
	</div>
	
<!--===============================================================================================-->


</body>
</html>