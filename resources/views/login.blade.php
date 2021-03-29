<!DOCTYPE html>
<html lang="en">
<head>
	<title>SmartCell</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
     --}}
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>	
	/* // loding */

	.lds-dual-ring.hidden {
			display: none;
		}

		/*Add an overlay to the entire page blocking any further presses to buttons or other elements.*/
		.overlay {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100vh;
			background: rgba(0,0,0,.8);
			z-index: 999;
			opacity: 1;
			transition: all 0.5s;
		}

		/*Spinner Styles*/
		.lds-dual-ring {
			display: inline-block;
			/* width: 80px;
			height: 80px; */
		}
	</style>
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url({{asset('images/logo/1.png')}});">
			
			</div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50" style=" background-image: url({{asset('images/logo/bg.png')}});">
				<div class="row " style="margin-top: 20%; ">
					<img src="{{asset('images/logo/logo.png')}}" class="img-fluaid" style="width: 50%; margin-left: 27%;">

				</div>
				<div id="richList"></div>
				<div id="loader" class="lds-dual-ring hidden overlay text-center">
					<img  src="{{asset('images/logo.gif')}}" style="width: 11%;height: 2;margin-top: 16%;background-color: white;border-radius: 19px;" > 
			
				</div>
				<form action="{{url('/login')}}" method="post">
					@csrf
					@if (Session::has('message'))
						<div class="alert alert-danger text-center" role="alert">
							{{ Session::get('message') }}
						</div>
				 	@endif
							<button type="submit" class="button-overlay btn btn-primary" style=" background-color:#1dc5ca;color: white; border-radius: 26px; width: 57%;margin-left: 24%;font-size: 20px;"><i class="fa fa-google mr-3 fa-lg">  </i>تسجيل الدخول</button>

				</form>
				<br>
				{{-- <div class="row"> --}}
					<p style="  text-align: center;margin-top: 37%;font-size: 20px;">ليس لديك حساب ؟ <a href="https://m.me/smartcell.ly" style="color:#10858b ;font-size: 20px;">تواصل معنا</a></p>
				{{-- </div> --}}
				
			</div>
			
		</div>
	</div>
	<div id="richList"></div>
<div id="loader" class="lds-dual-ring hidden overlay text-center">
    <img  src="{{asset('images/logo.gif')}}" style="width: 11%;height: 2;margin-top: 16%;background-color: white;border-radius: 19px;" > 

</div>
<!-- ManyChat -->
{{-- <div class="mcwidget-embed" data-widget-id="14822328"></div> --}}

{{-- <script src="//widget.manychat.com/123716295980818.js" defer="defer"></script>
<script>
	window.mcAsyncInit = function() {
	  // MC variable is available now
	  console.log(MC);
	};
  </script> --}}
	<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>

<!--===============================================================================================-->
<script>
	 jQuery(document).ready(function($) {
            $(document).ajaxSend(function() {
                $("#overlay").fadeIn(300);
                $('#loader').removeClass('hidden')　
            });
                    
            $('.button-overlay').click(function(){
                $.ajax({
                type: 'GET',
                success: function(data){
                    console.log(data);
                }
                }).done(function() {
                setTimeout(function(){
                    $("#overlay").fadeOut(300);
                },500);
                $('#loader').removeClass('hidden')
                });
            });
            });

</script>

</body>
</html>