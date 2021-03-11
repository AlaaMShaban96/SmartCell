<!doctype html>
<html class="no-js" lang="">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SmartCell</title>
    <meta name="description" content="SmartCell">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @include('Dashbord.layout.include.style')
   @yield('style')
  

</head>

<body style="background-color: #f1f2f7;">
    {{-- /loding  after clicked button --}}
    <div id="richList"></div>
    <div id="loader" class="lds-dual-ring hidden overlay text-center">
        <img  src="{{asset('images/logo.gif')}}" style="width: 11%;height: 2;margin-top: 16%;background-color: white;border-radius: 19px;" > 

    </div>
    {{-- end loging --}}
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ (\Request::route()->getName() == 'index') ? 'active' : '' }}">
                        <a href="{{url('/')}}" class=" button-overlay"><i class="menu-icon fa fa-laptop "></i>الرئيسية</a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'order') ? 'active' : '' }}">
                        <a href="{{url('/order')}}" class=" button-overlay"> <i class="menu-icon fa fa-book"></i>الطلبيات</a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'item') ? 'active' : '' }}">
                        <a href="{{url('/item')}}" class=" button-overlay"> <i class="menu-icon fa fa-qrcode"></i>المنتجات</a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'location') ? 'active' : '' }}">
                        <a href="{{url('/location')}}" class=" button-overlay"> <i class="menu-icon fa fa-map-marker"></i>الأماكن</a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'team') ? 'active' : '' }}">
                        <a href="{{url('/team')}}" class=" button-overlay"> <i class="menu-icon fa fa-users"></i>الموظفين</a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'setting') ? 'active' : '' }}">
                        <a href="{{url('/setting')}}" class=" button-overlay"> <i class="menu-icon fa fa-cog"></i>الإعدادات</a>
                    </li>
                    <li>
                        <a href="{{url('/logout')}}" class=" button-overlay"> <i class="menu-icon fa fa-sign-out"></i>تسجيل الخروج</a>
                    </li>
                 
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-right">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="{{asset('images/logo.svg')}}" alt="Logo"></a>
                    {{-- <a class="navbar-brand hidden" href="./"><img src="{{asset('images/logo2.png')}}" alt="Logo"></a> --}}
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>

        </header>
        <!-- /#header -->
        @yield('content')
        <!-- Content -->
        <!-- /.content -->
        <div class="clearfix"></div>

      
    </div>
  
    <div id="loader">
        <div class="loadingio-spinner-rolling-meno62sw6a"><div class="ldio-iv6kxree6la">
            <div></div>
            </div></div>
    </div>
    @include('Dashbord.layout.include.script')
    @yield('script')

</body>
</html>
     