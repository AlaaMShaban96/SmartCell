<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width-device-width">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>login page</title>

</head>
<style>
@media (max-width: 1005px) {
    .col-8 {
         display: none;
    }
    .col-4 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}




    

</style>
<body style=" background-size:cover;">
    <div  >
        <div class="row" style="width:100%; margin-top: 5%;">
        <div class="col-8" >
            <img src="{{asset('image/1.png')}}" style="width: 100%;">

        </div>
        <div class="col-4" style="padding-top: 9%; background-image: url({{asset('image/bg.png')}})">
            <div class="row">
                <img src="{{asset('image/logo.png')}}" class="img-fluaid" style="width: 50%; margin-left: 20%;">
            </div>
            <form action="{{url('/login')}}" method="post">
                @csrf
                    <div class="row">
                        <button type="submit" class="btn btn-primary" style=" background-color:#1dc5ca;color: white;width: 40%;margin-left: 27%; border-radius: 26px;"><i class="fa fa-google mr-3 fa-lg">  </i>تسجيل الدخول</button>

                    </div>
            </form>
            <div class="row">
                <p style="  margin-left: 30%;">ليس لديك حساب ؟ <a href="#" style="color:#10858b ;">تواصل معنا</a></p>
            </div>


        </div>

    </div>
    </div>
</body>
<style>
    
</style>
</html>