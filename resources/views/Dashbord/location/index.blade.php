@extends('Dashbord/layout/master')
@section('style')

<link rel="stylesheet" href="{{asset('css/dashbord/location/index.css')}}">
@endsection

@section('content')

  @if(Session::has('message'))
      <div class="alert {{ Session::get('alert-class') }} text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <p class="h4" >{{ Session::get('message') }}</p> 
      </div>
  @endif

  @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
          <i class="feather icon-info mr-1 align-middle"></i>
          <span>{{ $error }}</span>
      </div>
    @endforeach
  @endif
  <div class="content">
    <div class="col-3 na-v mt-4  d-flex justify-content-center" style="text-align:center; ">

        <ul class="nav flex-column shadow pb-3" style="background-color: white;border-radius: 25px;">
            <h5 class="mb-4 p-2"  style="color: white;background-color: #10858b;width: 200px;border-radius: 10px 10px 0px 0px;">المدن الرئيسية</h5>
          @foreach ($loctions as $loction)
            @if ($loction[24]=="0")
            <li>
              <a class="btn" onclick="show('{{$loction[11]}}','0','{{$loction[11]}}')" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$loction[11]}}" aria-expanded="false" aria-controls="collapseExample{{$loction[11]}}"style="text-align: center;"> {{$loction[1]}}<span class="sign{{$loction[11]}}" id="sign"><span id="s1" class="s"></span><span id="s2" class="s"></span></span> </a>
              <div class="collapse" id="collapseExample{{$loction[11]}}">
                <div id="sub{{$loction[11]}}">   
                </div>
              </div>
            </li> 
            @endif
              
          @endforeach
          
        </ul>
    </div>
    <!-- Animated -->
    <div class="animated fadeIn">
        <div class="orders mr-2 pr-5">
            <div class="row">
                <div class="col-9 col-xs-4">
                    <div class="card-body d-flex justify-content-center"style="width: 105%; margin-left: -15px;height: 68px;"> 
                        <h4 class="box-title w-100 mt-1 mx-auto" style="background-color: #7648E6;color: wheat;text-align: center;    position: absolute;top: 20px;border-radius: 10px 10px 0px 0px;">الأصناف   </h4>
                    </div>
                    <div class="card">
                        <div class="row"> 
                            <div id="category" style="width: 100%;padding-top: 3%;" class="row">
                              <div class="col-4  d-flex justify-content-center pl-4 pr-4">
                                <div class="card ml-4 mr-4 pl-4 pr-4 d-flex justify-content-center" style="min-width: 130px; border-radius: 25px;">
                                        <button  id="showAddCategory" class="btn btn-success fa fa-plus pt-3 d-flex justify-content-center mx-auto" style="border-radius: 8vh;width: 50px;height: 50px;"></button>
                                </div> 
                              </div> 
                              @foreach ($loctions as $key=> $loction)
                                @if ($loction[24]=="0")
                                  <div class=' col-4  d-flex justify-content-center'>
                                    <div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'>
                                      <div class='text-center'>
                                            <img class='img-fluaid' src='{{$loction[4]}}' style="width:12vh;border-radius: 5px;"></img>
                                      </div>
                                      <p class='card-title  d-flex justify-content-center mt-2'> {{$loction[1]}} </p> 
                                      <div class="row">
                                        <div class="col-6">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                @endif
                              @endforeach
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
    </div>

  </div>

  <div id="icon-3" class="icon">
    <div id="dropdown-3" class="dropdown"></div>
  </div>

 
  <div id="editLocationModel" class="modal">
    <!-- Modal content -->
      <div class="modal-content">
        <span class="closeEditLocationModel">&times;</span>
        <div class="row" style="padding-left: 10%;">
            <form id="locationForm"  action="{{url('/setLocation')}}" dir="rtl"  method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" id="locationId">
                <div class="form-row" dir="rtl">
                  <div class="form-group col-md-3 text-center">
                    <label for="#" style="display: flex;">تحديد نوع البيانات</label>
                    <input onchange="onchangeCitiecs()" selected type="radio" id="subTitel1" name="type" value="1">
                    <label for="age1">منطقة</label>
                    <input onchange="onchangeCitiecs()" type="radio" id="subTitel2" name="type" value="2">
                    <label for="age2">مدينة</label>  
                  </div>
                  <div class="form-group col-md-3">
                    <label for="#" style="display: flex;">اسم </label>
                    <input type="text" id="nameLocation" name="name" class="form-control"  required placeholder="اسم المنطقة او المدينة">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="#" style="display: flex;">سعر التوصيل</label>
                    <input type="number" id="priceLocation" name="price" class="form-control"  required placeholder="سعر التوصيل">
                  </div>
                  <div class="form-group col-md-3" style="text-align: right;">
                    <label for="#" > المنطقة</label>
                    <select onchange="onchangeCitiecs()" name="titel" id="titelLocation" style="width: 200px;text-align: center;" required>  
                      @foreach ($loctions as $key=> $loction)
                        @if ($loction[24]=="0")
                          <option value="{{$loction[11]}}#{{$loction[1]}}">{{$loction[1]}}</option>
                        @endif
                      @endforeach
            
                    </select>
                  </div>
                  <div class="form-group col-md-3" id="subTitelLocationDiv" style="text-align: right; display:none;">
                    <select name="titel" disabled id="subTitelLocation" style="width: 200px;text-align: center;" >  
                    </select>
                  </div>
                  <div class="form-group col-md-3" style="text-align: right;">
                    <label for="#" >تفعيل المنطقة</label>

                    <label class="form-switch">
                      <input name="show" id="showLocation" type="checkbox"><i></i>
                    </label>
                  </div>
                  <div class="form-group col-md-3" style="text-align: right;">
                    <label for="#" > صورة</label>

                    {{-- <label class="form-switch"> --}}
                      <input name="image" type="file" style="width: 200px;">
                    {{-- </label> --}}
                  </div>
                </div>  
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-info mt-3" style="display: grid;width: 300px; border-radius: 22px;"> حفظ </button>
                </div>
            </form>
        </div>
  
      </div>
  </div>

  <form style="display: none" id="deleteLocationForm" action="" method="post">
    @method('delete')
    @csrf

  </form>
  <div id="richList"></div>
  <div id="loader" class="lds-dual-ring hidden overlay text-center">
      <img  src="{{asset('images/logo.gif')}}" style="width: 11%;height: 2;margin-top: 16%;background-color: white;border-radius: 19px;" > 
  
  </div>
  
@endsection

@section('script')  

  <script>var loctions = @json($loctions,JSON_PRETTY_PRINT);</script>
  <script src="{{asset('js/dashbord/location/index.js')}}"></script>

@endsection