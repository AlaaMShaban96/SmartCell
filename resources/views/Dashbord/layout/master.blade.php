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

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{url('/')}}"><i class="menu-icon fa fa-laptop"></i>الرئيسية</a>
                    </li>
                    <li>
                        <a href="{{url('/order')}}"> <i class="menu-icon fa fa-book"></i>الطلبيات</a>
                    </li>
                    <li>
                        <a href="{{url('/item')}}"> <i class="menu-icon fa fa-qrcode"></i>المنتجات</a>
                    </li>
                    <li>
                        <a href="{{url('/location')}}"> <i class="menu-icon fa fa-map-marker"></i>الأماكن</a>
                    </li>
                    <li>
                        <a href="{{url('/team')}}"> <i class="menu-icon fa fa-users"></i>الموظفين</a>
                    </li>
                    <li>
                        <a href="{{url('/')}}"> <i class="menu-icon fa fa-cog"></i>الإعدادات</a>
                    </li>
                    <li>
                        <a href="{{url('/')}}"> <i class="menu-icon fa fa-sign-out"></i>تسجيل الخروج</a>
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
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="{{asset('images/logo.svg')}}" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="{{asset('images/logo2.png')}}" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button id="myBtn" class="fa fa-plus mt-3" style="border: none; background-color: white;color: #10858b;"></button>

                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <div class="row">

                                    <div class="col-xs-12 col-md-6 col-6 mt-2">
                                        <a href="#">     <img style="width: 10%;" src="{{asset('images/Component 3 – 1.svg')}}">
                                            
                                        تم التوصيل </a>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-6 mt-2">
                                        <a href="#">    <img style="width: 13%;" src="{{asset('images/Component 2 – 1.svg')}}">
                                        قيد التوصيل   </a>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-6 mt-4">
                                        <a href="#">   <img style="width: 10%;" src="{{asset('images/Component 4 – 1.svg')}}">
                                        تم إلغائها    </a>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-6 mt-4">
                                        <a href="#">    <img style="width: 7%;" src="{{asset('images/from shop.svg')}}">
                                        إستلام شخصي   </a>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-6 mt-4">
                                        <a href="#">   <img style="width: 10%;" src="{{asset('images/recovary icon.svg')}}">
                                        تم إسترجاعها   </a>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-6 mt-4">
                                        <a href="#">   <img style="width: 10%;" src="{{asset('images/Mask Group 1.svg')}}">
                                            مجموع المبيعات 
                                        </a>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
            <div class="form-inline">
            </div>
            </div>
        </header>
        <!-- /#header -->
        @yield('content')
        <!-- Content -->
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; SmarCell
                    </div>

                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
            </div>
    <!-- /#right-panel -->
    @include('Dashbord.layout.include.script')
    @yield('script')

</body>
</html>
     