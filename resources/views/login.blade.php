<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
          <h2 class="active"> Login </h2>
          <!-- Login Form -->
          <form action="{{url('/redirect')}}" method="GET">
            {{-- <input type="text" id="login" class="fadeIn second" name="login" placeholder="login"> --}}
            {{-- <input type="text" id="password" class="fadeIn third" name="login" placeholder="password"> --}}
            <input type="submit" class="fadeIn fourth" value="Login Vie Google">
          </form>
      
          <!-- Remind Passowrd -->
          <div id="formFooter">
            @if (Session::has('message'))
            <div class="underlineHover">{{ Session::get('message') }}</div>
             @endif
            {{-- <a class="underlineHover" href="#">Forgot Password?</a> --}}
          </div>
      
        </div>
      </div>
</body>
</html>