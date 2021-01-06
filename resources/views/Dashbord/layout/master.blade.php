{{-- <!doctype html>
<html lang="en" dir="rtl" >

<head>
  <title>Hello, world!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  @include('Dashbord.layout.include.style')
  @yield('style')

  
</head>
 
<body dir="rtl">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <div class="logo">
        <img width="22%" src="https://images.theconversation.com/files/93616/original/image-20150902-6700-t2axrz.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1000&fit=clip" alt="" srcset="">
      </div>
      <div class="sidebar-wrapper"> 
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{url('/')}}">
              <i class="material-icons">dashboard</i>
              <p>لوحة التحكم</p>
            </a>
          </li>
          <li class="nav-item   ">
            <a class="nav-link" href="{{url('/item')}}">
              <i class="material-icons">dashboard</i>
              <p>المنتجات</p>
            </a>
          </li>
          <li class="nav-item   ">
            <a class="nav-link" href="#">
              <i class="material-icons">dashboard</i>
              <p>المستخمين</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <p class="navbar-brand">{{Session::get('store_name').$link}}</p>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <span class="bmd-form-group"><div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div></span>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                <div class="ripple-container"></div></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
          <!-- your content here -->
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Smart Cell
                </a>
              </li>
            </ul>
          </nav>
       
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>

  @include('Dashbord.layout.include.script')
  @yield('script')

</body>

</html> --}}
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
                        <a href="{{url('/')}}"> <i class="menu-icon fa fa-book"></i>الطلبيات</a>
                    </li>
                    <li>
                        <a href="{{url('/item')}}"> <i class="menu-icon fa fa-qrcode"></i>المنتجات</a>
                    </li>
                    <li>
                        <a href="{{url('/')}}"> <i class="menu-icon fa fa-map-marker"></i>الأماكن</a>
                    </li>
                    <li>
                        <a href="{{url('/')}}"> <i class="menu-icon fa fa-users"></i>الموظفين</a>
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
     