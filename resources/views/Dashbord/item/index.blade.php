@extends('Dashbord/layout/master')
@section('style')

{{-- <link rel="stylesheet" href="{{asset('css/dashbord/item/index.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/dashbord/item/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('css/dashbord/item/style.css')}}">





@endsection
@section('content')

  @if(Session::has('message'))
      <div class="alert {{ Session::get('alert-class') }} text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">x</i>
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
    

{{-- 
  <div class="content">
    <div class="col-3 na-v mt-4  d-flex justify-content-center" style="text-align:center; ">
        <ul class="nav flex-column shadow pb-3" style="background-color: white;border-radius: 25px;">
            <h5 class="mb-4 p-2"  style="color: white;background-color: #10858b;width: 200px;border-radius: 10px 10px 0px 0px;">الأصناف الرئيسية</h5>
          @foreach ($items as $item)
            @if (isset($item[28])&& ($item[28]=="1") && ($item[7]==0.0))
            <li>
              <a class="btn" onclick="show('{{$item[1]}}','0')" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$item[1]}}" aria-expanded="false" aria-controls="collapseExample{{$item[1]}}"style="text-align: center;"> {{$item[3]}}<span class="sign{{$item[1]}}" id="sign"><span id="s1" class="s"></span><span id="s2" class="s"></span></span> </a>
              <div class="collapse" id="collapseExample{{$item[1]}}">
               
                <div id="sub{{$item[1]}}">   
                </div>
                
                 
              </div>
            </li> 
            @endif   
          @endforeach          
        </ul>
    </div>
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        

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
                              
                              @foreach ($items as $key=> $item)
                                @if (isset($item[28]) && ($item[28]=="1")&& ($item[7]==0.0))
                                <div class=' col-4  d-flex justify-content-center'>
                                  <div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'>
                                    <div class='text-center'>
                                          <img class='img-fluaid' src='{{$item[6]}}' style="width:12vh;border-radius: 5px;"></img>
                                    </div>
                                    <p class='card-title  d-flex justify-content-center mt-2'> {{$item[3]}} </p> 
                          
                                    <div class="row">
                                      <div class="col-6">
                                        <button onclick="deleteItem('{{$item[1]}}')" class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button>

                                      </div>
                                      <div class="col-6">
                                        <button  onclick='editCategory("{{$item[1]}}")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @endif
                              @endforeach
                           
                            </div>
                        </div>
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->
        </div>
        <div class="orders mr-2 pr-5">
            <div class="row">
                <div class="col-9 col-xs-4">
                    <div class="card-body d-flex justify-content-center"style="    width: 105%;
                    margin-left: -15px;
                    height: 68px;"> 
                        <h4 class="box-title w-100 mt-1 mx-auto" style="background-color: #7648E6;color: wheat;text-align: center;    position: absolute;
                        top: 20px;
                        ;border-radius: 10px 10px 0px 0px;">العناصر </h4>
                    </div>
                    <div class="card">
    
                        <div class="row"> 
                            <div id="item" style="width: 100%;padding-top: 3%;" class="row">
                              @foreach ($items as $key=> $item)
                              @if ($key==0)
                              <div class=' col-4  d-flex justify-content-center'>
                                <div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'>
                                  <button id="showAddItem" class="btn btn-success fa fa-plus pt-3 d-flex justify-content-center mx-auto" style="border-radius: 8vh;width: 50px;height: 50px;"></button>
  
                                </div>
                              </div>
                              @endif
                              @if (isset($item[28])&& ($item[28]=="0"))
                              <div class=' col-4  d-flex justify-content-center'>
                                <div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'>
                                  <div class='text-center'>
                                        <img class='img-fluaid' src='{{$item[6]}}' style="width:12vh;border-radius: 5px;"></img>
                                  </div>
                                  <p class='card-title  d-flex justify-content-center mt-2'> {{$item[3]}} </p> 
                                  <span class='w-100 flex-fill bd-highlight' style='display:flex;position: inherit;right: 18.5px;'>
                                   
                                 </span>
                                 <div class="row">
                                  <div class="col-6">
                                    <button onclick="deleteItem('{{$item[1]}}')" class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button>
                                  </div>
                                  <div class="col-6">
                                    <button  onclick='editItem("{{$item[1]}}")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button>
                                  </div>
                                 </div>
                                </div>
                              </div>
                              @endif
                            @endforeach
                              
                            </div>
                        
                        </div>
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->
        </div>

    </div>
        <!-- /Widgets -->
  </div>

  <div id="icon-3" class="icon">
    <div id="dropdown-3" class="dropdown"></div>
  </div>

  <div id="addCategory" class="modal">
    <!-- Modal content -->
      <div class="modal-content">
        <span class="closesModelCategory">&times;</span>
        <div class="row" style="padding-left: 10%;">
          <form id="categoryForm" action="{{url('/category')}}" dir="rtl" class="mx-auto" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-row" dir="rtl">
                <div class="form-group col-md-6">
                  <label for="#" style="display: flex;">إسم الصنف</label>
                  <input type="text" name="name" class="form-control" id="categoryName" placeholder="أدخل إسم الصنف">
                </div>
                <div class="form-group col-md-6">
                  <label for="#">تحت تصنيف:</label>
                 
                  <select name="titel" id="categoryTitel" style="width: 200px;text-align: center;">
                    <option value="0" selected >ليس تحت تصنيف</option>

                    @foreach ($items as $item)
                      @if (isset($item[28])&& ($item[28]=="1"))
                        <option value="{{$item[1]}}">{{$item[3]}}</option>
                      @endif
                    @endforeach
          
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="#"style="display: flex;"">  إضافة التفاصيل صغيرة</label>
                <textarea class="form-control" name="subtitle" id="categorySubtitle" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="#"style="display: flex;"">إضافة التفاصيل</label>
                <textarea class="form-control" name="info" id="categoryInfo" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="#"style="display: flex;"">كلمات مفتاحية</label>
                <textarea class="form-control" name="keywords" id="categoryKeywords" rows="3"></textarea>
              </div>
              
                  <label>
                      عرض الصنف
                  </label>
                  <label class="form-switch">
                      <input name="show" id="categoryShow" type="checkbox"><i></i>
                    </label>
                  <label class="mr-2 ml-3">
                    رفع الصورة
                  </label>
                  
                      <input type="file" onchange="ValidateSize(this)" id="myFile" name="image" >  
                  
                <div class="d-flex justify-content-center">
                  <button id="button"  onclick='checkInpuCategoryForm()'  class="btn btn-info mt-3" style="display: block ruby;width: 300px; border-radius: 22px;"> حفظ 
                    <span id="imgCategory" style='display:none;'>
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; shape-rendering: auto; animation-play-state: running; animation-delay: 0s;"
                       width="30px" height="30px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <circle cx="50" cy="50" fill="none" stroke="#93dbe9" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138" style="animation-play-state: running; animation-delay: 0s;">
                          <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1" style="animation-play-state: running; animation-delay: 0s;"></animateTransform>
                        </circle>
                      </svg>
                    </span>
                    </button>
                </div>
          </form>
        </div>

      </div>
  </div>

  <div id="addItem" class="modal">
      <div class="modal-content" id='modal-content-select-item' style="display: none;">
        <span class="closesModelItem">&times;</span>
        <div class="row" style="padding-left: 10%;">
          <form id="itemForm" action="{{url('/item')}}" dir="rtl" class="mx-auto" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-row" dir="rtl">
                <div class="form-group col-md-6">
                  <label for="#" style="display: flex;">إسم المنتج</label>
                  <input type="text" name="name" class="form-control" id="itemName" placeholder="أدخل إسم المنتج" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="#"style="display: flex;">سعر المنتج</label>
                  <input type="text" name="price" class="form-control" id="itemPrice" placeholder="سعر المنتج" required >
                </div>
              </div>
              <div class="form-group">
                <label for="#"style="display: flex;"">إضافة وصف قصير</label>
                <textarea class="form-control" name="subtitle" id="itemSubtitle" rows="3" maxlength="60"></textarea>
              </div>
              <div class="form-group">
                <label for="#"style="display: flex;"">إضافة التفاصيل</label>
                <textarea class="form-control" name="info" id="itemInfo" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="#"style="display: flex;"">كلمات مفتاحية</label>
                <textarea class="form-control" name="keywords" id="itemKeywords" rows="3"></textarea>
              </div>
                  <label for="#">تحت تصنيف:</label>
                  <select name="titel" id="itemTitel" style="width: 200px;text-align: center;">
                    <option value="0">ليس تحت تصنيف</option>

                    @foreach ($items as $item)
                      @if (isset($item[28])&& ($item[28]=="1"))
                        <option value="{{$item[1]}}">{{$item[3]}}</option>
                      @endif
                    @endforeach
          
                  </select>
                  <label>
                      عرض المنتج
                  </label>
                  <label class="form-switch">
                      <input type="checkbox" name="show" id="itemShow"><i></i>
                    </label>
                  <label class="mr-2 ml-3">
                    رفع الصورة
                  </label>
                  
                      <input type="file"  onchange="ValidateSize(this)" id="myFile" name="image" >  
                  
                <div class="d-flex justify-content-center">
                  <button id="button"  onclick='checkInputitemForm()'  class="btn btn-info mt-3" style="display: block ruby;width: 300px; border-radius: 22px;"> حفظ 
                    <span id="imgItem" style='display:none;'>
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; shape-rendering: auto; animation-play-state: running; animation-delay: 0s;"
                       width="30px" height="30px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <circle cx="50" cy="50" fill="none" stroke="#93dbe9" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138" style="animation-play-state: running; animation-delay: 0s;">
                          <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1" style="animation-play-state: running; animation-delay: 0s;"></animateTransform>
                        </circle>
                      </svg>
                    </span>
                    </button>
                </div>
          </form>
        </div>

      </div>
      <div class="modal-content " id='modal-content-select-option'>
        <span class="closesModeloption">&times;</span>
        <div class='row text-center'>
          <div class="card t col-5  ml-4 mr-4 pl-4 pr-4 d-flex justify-content-center" style=" border-radius: 25px;">
            
          <div class='text-center'>
            <svg width="50%" height="50%" viewBox="0 0 13 8" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                <g transform="matrix(1,0,0,1,-2.16378e-05,-1.78153e-05)">
                    <g transform="matrix(1,0,0,1,-9.64803,-5.3376)">
                        <g transform="matrix(1,0,0,1,9.64803,5.3376)">
                            <path d="M5.883,0C7.675,0 9.093,0.549 10.381,1.927C10.54,2.097 10.53,2.363 10.361,2.521C10.191,2.68 9.926,2.67 9.767,2.501C8.639,1.294 7.439,0.84 5.883,0.84C3.881,0.84 2.038,1.935 0.908,3.782C2.038,5.628 3.881,6.723 5.883,6.723C7.957,6.723 9.863,5.546 10.979,3.575C11.094,3.372 11.351,3.301 11.552,3.416C11.754,3.53 11.825,3.787 11.711,3.989C10.443,6.227 8.264,7.563 5.883,7.563C3.501,7.563 1.322,6.227 0.055,3.989C-0.018,3.86 -0.018,3.703 0.055,3.575C1.322,1.337 3.501,0 5.883,0ZM5.883,5.883C7.041,5.883 7.984,4.94 7.984,3.782C7.984,2.623 7.041,1.681 5.883,1.681C4.724,1.681 3.782,2.623 3.782,3.782C3.782,4.94 4.724,5.883 5.883,5.883ZM5.883,2.521C6.578,2.521 7.143,3.087 7.143,3.782C7.143,4.477 6.578,5.042 5.883,5.042C5.188,5.042 4.622,4.477 4.622,3.782C4.622,3.087 5.188,2.521 5.883,2.521Z" style="fill:rgb(0,174,166);fill-rule:nonzero;"/>
                        </g>
                        <g transform="matrix(0.844337,0,0,0.753495,-2.65108,-3.465)">
                            <ellipse cx="27.395" cy="15.028" rx="2.218" ry="2.474" style="fill:rgb(0,174,166);"/>
                        </g>
                        <g transform="matrix(0.532802,-0.532802,0.532802,0.532802,10.5395,10.7549)">
                            <path d="M12.788,5.126L13.53,5.868L12.788,6.61L13.53,7.352L12.788,8.094L12.046,7.352L11.304,8.094L10.561,7.352L11.304,6.61L10.561,5.868L11.304,5.126L12.046,5.868L12.788,5.126Z" style="fill:white;"/>
                        </g>
                    </g>
                </g>
            </svg>
            <h3>اضافة عرض</h3>
            <p>لعرض الخدمات المتوفرة لديك </p>
            <button onclick='selectInformtion()'  class='btn btn-success w-50  justify-content-center mr-1' style='height: 40px;border-radius: 85px;' >اضافة تفاصيل</button>

          </div>
          
          </div>
          <div class="card  col-5 ml-4 mr-4 pl-4 pr-4 d-flex justify-content-center" style=" border-radius: 25px;">
           
          <div class='text-center'>
            <svg width="50%" height="50%" viewBox="0 0 11 11" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
                <g transform="matrix(1,0,0,1,-4.9144e-05,1.07295e-05)">
                    <g transform="matrix(1,0,0,1,4.9144e-05,-1.07295e-05)">
                        <path d="M9.995,9.337L9.618,9.604C9.28,9.797 8.893,9.916 8.475,9.916C8.17,9.916 7.88,9.853 7.613,9.747L5.316,10.972L5.316,5.562L10.171,3.064L10.171,6.015C10.557,6.43 10.799,6.982 10.799,7.593C10.799,8.291 10.483,8.91 9.995,9.337ZM-0,3.034L4.855,5.561L4.855,10.972L-0,8.382L-0,3.034ZM10.336,7.593C10.336,6.567 9.501,5.732 8.475,5.732C7.45,5.732 6.615,6.567 6.615,7.593C6.615,8.618 7.45,9.454 8.475,9.454C9.501,9.454 10.336,8.618 10.336,7.593ZM8.08,6.407L8.871,6.407L8.871,7.197L9.662,7.197L9.662,7.988L8.871,7.988L8.871,8.779L8.08,8.779L8.08,7.988L7.289,7.989L7.29,7.197L8.08,7.197L8.08,6.407ZM2.363,1.485L0.245,2.64L5.086,5.161L7.268,4.039L2.363,1.485ZM9.927,2.67L5.085,0L2.852,1.218L7.772,3.779L9.927,2.67Z" style="fill:rgb(0,174,166);"/>
                    </g>
                </g>
            </svg>
            <h3>اضافة منتح</h3>
            <p> لإضافة المنتاجات و السلع التي تريد بيعها </p>
            <button onclick='selectItem()'   class='btn btn-success w-50  justify-content-center mr-1'  style='height: 40px;border-radius: 85px;'>اضافة منتج</button>
          </div>

          </div>
        </div>
      </div>
      <div class="modal-content " id='modal-content-select-informtion' style="display: none;">
        <span class="closesModelInformtion">&times;</span>
        <div class="row" style="padding-left: 10%;">
          <form id="itemFormInformtion" action="{{url('/item')}}" dir="rtl" class="mx-auto" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-row" dir="rtl">
                <div class="form-group col-md-12">
                  <label for="#" style="display: flex;">إسم العرض</label>
                  <input type="text" name="name" class="form-control" id="itemNameInformtion" placeholder="أدخل إسم العرض" required>
                </div>
              </div>
              <div class="form-group">
                <label for="#"style="display: flex;"">إضافة وصف قصير</label>
                <textarea class="form-control" name="subtitle"  id="itemSubtitleInformtion" rows="3" maxlength="60" required></textarea>
              </div>
              <div class="form-group">
                <label for="#"style="display: flex;"">إضافة التفاصيل</label>
                <textarea class="form-control" name="info" id="itemInfoInformtion" rows="3" required></textarea>
              </div>
              <div class="form-group">
                <label for="#"style="display: flex;"">كلمات مفتاحية</label>
                <textarea class="form-control" name="keywords" id="itemKeywordsInformtion" rows="3"></textarea>
              </div>
                  <label for="#">تحت تصنيف:</label>
                  <select name="titel" id="itemTitelInformtion" style="width: 200px;text-align: center;">
                    <option value="0">ليس تحت تصنيف</option>

                    @foreach ($items as $item)
                      @if (isset($item[28])&& ($item[28]=="1"))
                        <option value="{{$item[1]}}">{{$item[3]}}</option>
                      @endif
                    @endforeach
          
                  </select>
                  <label>
                      عرض العرض
                  </label>
                  <label class="form-switch">
                      <input type="checkbox" name="show" id="itemShowInformtion"><i></i>
                    </label>
                  <label class="mr-2 ml-3">
                    رفع الصورة
                  </label>
                      <input type="file" onchange="ValidateSize(this)" id="myFile" name="image" >  
                  
                <div class="d-flex justify-content-center">
          
                  <button id="button"  onclick='checkInputitemFormInformtion()'  class="btn btn-info mt-3" style="display: block ruby;width: 300px; border-radius: 22px;"> حفظ 
                  <span id="imgInformtion" style='display:none;'>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; shape-rendering: auto; animation-play-state: running; animation-delay: 0s;"
                     width="30px" height="30px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                      <circle cx="50" cy="50" fill="none" stroke="#93dbe9" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138" style="animation-play-state: running; animation-delay: 0s;">
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1" style="animation-play-state: running; animation-delay: 0s;"></animateTransform>
                      </circle>
                    </svg>
                  </span>
                  </button>
                </div>
          </form>
        </div>
      </div>
  </div>
  <form style="display: none" id="deleteItemForm" action="" method="post">
    @method('delete')
    @csrf

  </form> --}}










  {{-- <div class="container">

    <nav aria-label="breadcrumb" class="position-relative">
        <div class="breadcrumb bg-dark" id="breadcrumbsContainer" >
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
        </div>

        <button class="btn btn-primary fav-button fav-button-digram" id="toggleDiagram" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
            </svg>
        </button>
        <button class="btn btn-primary fav-button" id="toggleDirectory" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
            </svg>
        </button>
        <button class="btn btn-primary fav-button fav-button-search" id="toggleSearch" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </nav>

    <div class="row " id="productsContainer" >

    </div>
    <div class="row " id="searchContainer" style="display:none;">

    </div>
    <div class="row" id="treeContainer" style="display:none; overflow-x: auto;">
        <ul class="tree col-md-12"></ul>
    </div>
    <div id="editFormModal" style="z-index:1050;" class="modal" role="dialog">
        <div class="modal-dialog modal-lg"  role="document">
            <div class="modal-content">
                <form action="{{url('/item')}}" method='post' enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="create" id="product-create" value="1" />
                        <input type="hidden" name="productId" id="product-productId" value="" />
                        <input type="hidden" name="parentId" id="product-parentId" value="" />
                        <div class="container row">
                            <div class="col-md-6 rounded-top" >
                                <div class="card" id="card-preview"  style="max-height: 600px;background:#3a3b3c; border-width: 0; color:white;border-radius: 20px;">
                                    <img id="imagePreview" src="https://via.placeholder.com/150" style="height:350px;border-radius: 20px 20px 0 0 ;" class="card-img-top">
                                    <input type="file" id="product-image" name="image" class="form-control" style="visibility:hidden;" />

                                    <label  for="product-image" class="btn btn-primary d-flex justify-content-center align-items-center" style="background:#4e4f50;border-width: 0;width:50px;height:50px;border-radius: 99px;position: absolute; top:20px;right:20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                        </svg>
                                    </label>
                                    <div class="card-body">
                                        <input id="product-title" name="title" placeholder="Enter item title" style="color:white;background:transparent; border-width: 0; border-bottom-width: 1px; margin:10px 0;" />
                                        <input id="product-subtitle" name="subtitle" placeholder="Enter item Subtitle" style="color:white;background:transparent; border-width: 0; border-bottom-width: 1px; margin:10px 0;" />
                                        <div></div>
                                        <a href="#" id="button-1" style="background:#4e4f50;border-width: 0;" class="btn btn-primary highlight-dark">شراء المنتج</a>
                                        <a href="#" id="button-2"  style="background:#4e4f50;border-width: 0;" class="btn btn-primary addButton2">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 " style="overflow-y:auto;">
                                <div id="button-1-form" style="margin:10px 0;">
                                    <h5>Button #1</h5>
                                    <label>Type :</label>
                                    <select id="button-1-type" name="button-1-type" class="form-control select-button-type">
                                        <option class="buyOption" value="BUY">Buy now Button</option>
                                        <option value="DATA">Details Button</option>
                                    </select>
                                    <label>button name</label>
                                    <input class="form-control" id="button-1-name" name="button-1-name" placeholder="اسم الزر"  />
                                    <div class="buy-button-form">
                                        <label>Price</label>
                                        <input class="form-control" id="button-1-price" name="button-1-price" type="number" placeholder="10 , 20 ,30 .." />
                                    </div>
                                    <div class="data-button-form">
                                        <label>Details</label>
                                        <input class="form-control" id="button-1-details" name="button-1-details" placeholder="..." />
                                        <label for="button-1-image">Image : <br/><img id="Button-1-imagePreview" width="200" height="200" src="https://via.placeholder.com/150" alt="" style="cursor:pointer;width:200px;height:200px;" class="img-thumbnail"></label>
                                        <input style="display: none;" type="file" id="button-1-image" class="form-control" name="button-1-image"  />
                                    </div>
                                    <hr/>

                                </div>
                                <div id="button-2-form" style="display:none; margin:10px 0;" >
                                    <div class="d-flex justify-content-between" ><h5>Button #2</h5>
                                        <a id="deleteButton" href="#" class="btn btn-danger">x</a></div>
                                    <label>Type :</label>
                                    <select id="button-2-type" name="button-2-type" class="form-control select-button-type">
                                        <option class="buyOption" value="BUY">Buy now Button</option>
                                        <option value="DATA">Details Button</option>
                                    </select>
                                    <label>button name</label>
                                    <input class="form-control" id="button-2-name" name="button-2-name" value="زر 2" placeholder="اسم الزر"  />
                                    <div class="buy-button-form">
                                        <label>Price</label>
                                        <input class="form-control" id="button-2-price" name="button-2-price" type="number" placeholder="10 , 20 ,30 .." />
                                    </div>
                                    <div class="data-button-form">
                                        <label>Details</label>
                                        <input class="form-control" id="button-2-details" name="button-2-details" placeholder="..." />
                                        <label for="button-2-image">Image : <br/><img id="Button-2-imagePreview" width="200" height="200" src="https://via.placeholder.com/150" alt="" style="cursor:pointer;width:200px;height:200px;" class="img-thumbnail"></label>
                                        <input style="display: none;" type="file" id="button-2-image" class="form-control" name="button-1-image"  />
                                    </div>
                                    <hr/>

                                </div>


                                <div id="card-form">
                                    <label>Keywords</label>
                                    <input class="form-control" id="product-keywords" name="keywords" placeholder="keywords" />
                                    <label>Type</label>
                                    <select class="form-control" id="product-category" name="category">
                                        <option value="0">Product</option>
                                        <option value="1">Category</option>
                                    </select>
                                    <label>order</label>
                                    <select id="product-order" class="form-control" name="order">
                                        <option value="0">Product</option>

                                    </select>
                                    <div>
                                        <label>منتج معروض</label>
                                        <label class="switch">
                                            <input id="product-show" id="product-show" name="product-show" type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div id="productForm">
                                        <label>توافر المنتج</label>
                                        <label class="switch">
                                            <input id="product-avalible" name="avalible-product" type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="createModal" style="z-index:1050;" class="modal" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center"> اختار ما تريد انشاء</h3>
                    <div style="margin-top:40px;" class="container">
                        <div class="row">
                            <div id="createProduct" data-placement="top" data-title="منتج" data-content=" مايكون تحت التصنيف مثل ايفون اكس يكون الذي تحت تصنيف الالكترونات" class="col-md-6 d-flex justify-content-center createHover" style="border-right: solid 1px #d2d2d278;">
                                <div class="card" >
                                    <img src="data:image/jpeg;base64,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" style="border-radius: 20px 20px 0 0 ;" class="card-img-top">
                                    <div class="card-body">
                                        <h5  class="card-title">Iphone X</h5>
                                        <p  class="card-text" style="color:silver;">ايفون اكس احمر</p>
                                        <a href="#"  class="btn btn-primary">شراء المنتج</a>
                                        <a href="#"  class="btn btn-primary">تفاصيل المنتج</a>
                                    </div>
                                </div>
                            </div>
                            <div  id="createCategory"  data-placement="top" data-title="تصنيف" data-content="  مجموعة من المنتجات مثل الالكترونات " class="col-md-6 d-flex justify-content-center createHover"  style="border-left: solid 1px #d2d2d278;">
                                <div class="card"  style=" min-width:275px; height:100%;background:#3a3b3c; box-shadow: 0 0 1px 1px rgba(0,0,0,0.1);  border-width: 0; color:white;border-radius: 20px;">
                                    <img src="https://www.techychimp.com/wp-content/uploads/2017/09/Important-Tips-to-Buy-Electronic-Products.jpg" style="border-radius: 20px 20px 0 0 ; height: 350px;" class="card-img-top">
                                    <div class="card-body">
                                        <h5  class="card-title">الاجهزة الالكترونية</h5>
                                        <p  class="card-text" style="color:silver;">تصنيف الاجهزة الالكترونية</p>
                                        <a href="#"  class="btn btn-primary">عرض المنتجات</a>
                                        <a href="#"  class="btn btn-primary">تفاصيل التصنيف</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="container">

    <nav aria-label="breadcrumb" class="position-relative">
        <div class="breadcrumb bg-dark" id="breadcrumbsContainer" >
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
        </div>

        <button class="btn btn-primary fav-button fav-button-digram" id="toggleDiagram" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
            </svg>
        </button>
        <button class="btn btn-primary fav-button" id="toggleDirectory" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
            </svg>
        </button>
        <button class="btn btn-primary fav-button fav-button-search" id="toggleSearch" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </nav>

    <div class="row " id="productsContainer"  style="margin-right:0; margin-left:0;">

    </div>
    <div class="row " id="searchContainer" style="display:none;">

    </div>
    <div class="row" id="treeContainer" style="display:none; overflow-x: auto;">
        <ul class="tree col-md-12"></ul>
        <canvas id="treeCanvas"></canvas>
    </div>
    <div id="editFormModal" style="z-index:1050;" class="modal" role="dialog">
        <div class="modal-dialog modal-lg"  role="document">
            <div class="modal-content">
                <form action="{{url('/item')}}" method='post' enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="create" id="product-create" value="1" />
                        <input type="hidden" name="productId" id="product-productId" value="" />
                        <input type="hidden" name="parentId" id="product-parentId" value="" />
                        <div class="container row">
                            <div class="col-md-6 rounded-top" >
                                <div class="card" id="card-preview"  style="max-height: 600px;background:#3a3b3c; border-width: 0; color:white;border-radius: 20px;">
                                    <img id="imagePreview" src="https://via.placeholder.com/150" style="height:350px;border-radius: 20px 20px 0 0 ;" class="card-img-top">
                                    <input type="file" id="product-image" name="image" class="form-control" style="visibility:hidden;" />

                                    <label  for="product-image" class="btn btn-primary d-flex justify-content-center align-items-center" style="background:#4e4f50;border-width: 0;width:50px;height:50px;border-radius: 99px;position: absolute; top:20px;right:20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                        </svg>
                                    </label>
                                    <div class="card-body">
                                        <input id="product-title" name="title" placeholder="Enter item title" style="color:white;background:transparent; border-width: 0; border-bottom-width: 1px; margin:10px 0;" />
                                        <input id="product-subtitle" name="subtitle" placeholder="Enter item Subtitle" style="color:white;background:transparent; border-width: 0; border-bottom-width: 1px; margin:10px 0;" />
                                        <div></div>
                                        <a href="#" id="button-1" style="background:#4e4f50;border-width: 0;" class="btn btn-primary highlight-dark">شراء المنتج</a>
                                        <a href="#" id="button-2"  style="background:#4e4f50;border-width: 0;" class="btn btn-primary addButton2">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 " style="overflow-y:auto;">
                                <div id="productForm">
                                    <label>توافر المنتج</label>
                                    <label class="switch">
                                        <input id="product-avalible" name="avalible-product" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div id="button-1-form" style="margin:10px 0;">
                                    <h5>Button #1</h5>
                                    <label>Type :</label>
                                    <select id="button-1-type" name="button-1-type" class="form-control select-button-type">
                                        <option class="buyOption" value="BUY">Buy now Button</option>
                                        <option value="DATA">Details Button</option>
                                    </select>
                                    <label>button name</label>
                                    <input class="form-control" id="button-1-name" name="button-1-name" placeholder="اسم الزر"  />
                                    <div class="buy-button-form">
                                        <label>Price</label>
                                        <input class="form-control" id="button-1-price" name="button-1-price" type="number" placeholder="10 , 20 ,30 .." />
                                    </div>
                                    <div class="data-button-form">
                                        <label>Details</label>
                                        <input class="form-control" id="button-1-details" name="button-1-details" placeholder="..." />
                                        <label for="button-1-image">Image : <br/><img id="button-1-imagePreview" width="200" height="200" src="https://via.placeholder.com/150" alt="" style="cursor:pointer;width:200px;height:200px;" class="img-thumbnail"></label>
                                        <input style="visibility: hidden;" type="file" id="button-1-image" class="form-control" name="button-1-image"  />
                                    </div>
                                    <hr/>
                                </div>
                                <div id="button-2-form" style="display:none; margin:10px 0;" >
                                    <div class="d-flex justify-content-between" ><h5>Button #2</h5>
                                        <a id="deleteButton" href="#" class="btn btn-danger">x</a></div>
                                    <label>Type :</label>
                                    <select id="button-2-type" name="button-2-type" class="form-control select-button-type">
                                        <option class="buyOption" value="BUY">Buy now Button</option>
                                        <option value="DATA">Details Button</option>
                                    </select>
                                    <label>button name</label>
                                    <input class="form-control" id="button-2-name" name="button-2-name" value="زر 2" placeholder="اسم الزر"  />
                                    <div class="buy-button-form">
                                        <label>Price</label>
                                        <input class="form-control" id="button-2-price" name="button-2-price" type="number" placeholder="10 , 20 ,30 .." />
                                    </div>
                                    <div class="data-button-form">
                                        <label>Details</label>
                                        <input class="form-control" id="button-2-details" name="button-2-details" placeholder="..." />
                                        <label for="button-2-image">Image : <br/><img id="button-2-imagePreview" width="200" height="200" src="https://via.placeholder.com/150" alt="" style="cursor:pointer;width:200px;height:200px;" class="img-thumbnail"></label>
                                        <input style="visibility: hidden;" type="file" id="button-2-image" class="form-control" name="button-1-image"  />
                                    </div>
                                    <hr/>

                                </div>


                                <div id="card-form">
                                    <label>Keywords</label>
                                    <input class="form-control" id="product-keywords" name="keywords" placeholder="keywords" />
                                    <label>Type</label>
                                    <select class="form-control" id="product-category" name="category">
                                        <option value="0">Product</option>
                                        <option value="1">Category</option>
                                    </select>
                                    <label>order</label>
                                    <select id="product-order" class="form-control" name="order">
                                        <option value="0">Product</option>

                                    </select>
                                    <div>
                                        <label>منتج معروض</label>
                                        <label class="switch">
                                            <input id="product-show" id="product-show" name="product-show" type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="createModal" style="z-index:1050;" class="modal" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center"> اختار ما تريد انشاء</h3>
                    <div style="margin-top:40px;" class="container">
                        <div class="row">
                            <div id="createProduct" data-placement="top" data-title="منتج" data-content=" مايكون تحت التصنيف مثل ايفون اكس يكون الذي تحت تصنيف الالكترونات" class="col-md-6 d-flex justify-content-center createHover" style="border-right: solid 1px #d2d2d278;">
                                <div class="card" >
                                    <img src="data:image/jpeg;base64,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" style="border-radius: 20px 20px 0 0 ;" class="card-img-top">
                                    <div class="card-body">
                                        <h5  class="card-title">Iphone X</h5>
                                        <p  class="card-text" style="color:silver;">ايفون اكس احمر</p>
                                        <a href="#"  class="btn btn-primary">شراء المنتج</a>
                                        <a href="#"  class="btn btn-primary">تفاصيل المنتج</a>
                                    </div>
                                </div>
                            </div>
                            <div  id="createCategory"  data-placement="top" data-title="تصنيف" data-content="  مجموعة من المنتجات مثل الالكترونات " class="col-md-6 d-flex justify-content-center createHover"  style="border-left: solid 1px #d2d2d278;">
                                <div class="card"  style=" min-width:275px; height:100%;background:#3a3b3c; box-shadow: 0 0 1px 1px rgba(0,0,0,0.1);  border-width: 0; color:white;border-radius: 20px;">
                                    <img src="https://www.techychimp.com/wp-content/uploads/2017/09/Important-Tips-to-Buy-Electronic-Products.jpg" style="border-radius: 20px 20px 0 0 ; height: 350px;" class="card-img-top">
                                    <div class="card-body">
                                        <h5  class="card-title">الاجهزة الالكترونية</h5>
                                        <p  class="card-text" style="color:silver;">تصنيف الاجهزة الالكترونية</p>
                                        <a href="#"  class="btn btn-primary">عرض المنتجات</a>
                                        <a href="#"  class="btn btn-primary">تفاصيل التصنيف</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="richList"></div>
<div id="loader" class="lds-dual-ring hidden overlay text-center">
    <img  src="{{asset('images/logo.gif')}}" style="width: 11%;height: 2;margin-top: 16%;background-color: white;border-radius: 19px;" > 

</div>














@endsection
@section('script')  
{{-- var products = formatProducts(items).splice(1);
    
    var products = formatProducts(items).splice(1);
    console.log(products,items);
    --}}

{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}

  <script>var items = @json($object,JSON_PRETTY_PRINT);</script>
  {{-- <script src="{{asset('js/dashbord/item/index.js')}}"></script> --}}
  <script src="{{asset('js/dashbord/item/events.js')}}"></script>
  <script src="{{asset('js/dashbord/item/tree.js')}}"></script>
  <script>
    // var products = items;
    var products = formatProducts(items).splice(1);

    // var products2 = [
    //     {productId:"1",showProduct:false,quantity:0,parent:null,title:"product 1",subtitle:"subtitle",category:false,button1:{type:"BUY",name:"Buy now",price:100}},
    //     {productId:"2",showProduct:true,quantity:0,parent:null,keywords:"keyfuckingwords",title:"category 2",subtitle:"",category:true,button1:{type:"BUY",name:"Buy now",price:100}},
    //     {productId:"3",showProduct:true,quantity:1,parent:"2",order:2,title:"category 3",subtitle:"subtitle",category:true,button1:{type:"BUY",name:"Buy now",price:100}},
    //     {productId:"4",showProduct:true,quantity:0,parent:"3",order:1,title:"category 4",subtitle:"subtitle",category:true,button1:{type:"BUY",name:"Buy now",price:100}},
    //     {productId:"5",showProduct:true,quantity:1,parent:"2",order:1,title:"product 5",subtitle:"subtitle",category:false,button1:{type:"DATA",name:"Test",details:"test"},button2:{type:"BUY",name:"شراء",price:200}},
    //     {productId:"6",showProduct:true,quantity:0,parent:"3",order:2,title:"product 6",subtitle:"subtitle",category:false,button1:{type:"DATA",name:"data",details:"test"},button2:{type:"DATA",name:"asd",details:"asd"}},
    //     {productId:"7",showProduct:true,quantity:1,parent:"4",order:1,title:"product 7",subtitle:"subtitle",category:false,button1:{type:"BUY",name:"Buy now",price:100}},
    // ];
     

    // var jsonTest = [
    //     {product_id:"1",active:false,quantity:0,category:null,title:"product 1",subtitle:"subtitle",category_or_not:false,button1Target:"Details",button1Caption:"اسم تجريب" , button1ActionValue:"تفاصيل تجريب وجو"}
    // ];

    var productsById = {};
    for (var i = 0; i < products.length; i += 1){
        productsById[products[i].productId] = i;
    }
    var productsTree = makeTree(products,productsById);
    $(function(){

        var $editFormModal = $("#editFormModal");
        var updateUrl = "";
        var createUrl = "";
        gotoProduct();
        $(document).on("click", ".navigate-card", function (){
            var productId = $(this).attr("data-product-id");
            gotoProduct(productId);
        }).find(".btn-danger").click(function(){
            $(this).parent().submit();
            return false;
        });
        $(document).on("click",'.editProductButton',function(){
            var productId = $(this).parent().parent().attr('data-product-id');
            $editFormModal.modal('show');
            $editFormModal.find("form").attr("action",updateUrl);

            addDataToFields(productId);
            return false;
        });
        $(document).on("click",'.addProductButton',function()
        {
            $("#createModal").modal('show');
        })

        $(".createHover").popover({ trigger: "hover" });

        $("#createCategory").click(function(){
            var parentId = $(this).attr('data-parent-id');
            $editFormModal.find("#parentId").val(parentId);
            $("#createModal").modal('hide');
            $editFormModal.modal('show');
            ResetFields();
            $editFormModal.find("form").attr("action",createUrl);
            $editFormModal.find("#product-category").val(1).trigger("change");

            var numberOfSiblings = products.filter(item => item.parent == parentId).length;
            $("#product-order").html('');
            for(var i=1;i<=numberOfSiblings;i++){
                $("#product-order").append(`<option value="${i}">${i}</option>`);
            }

        });
        $("#createProduct").click(function(){
            var parentId = $(this).attr('data-parent-id');
            $("#createModal").modal('hide');
            $editFormModal.modal('show');
            ResetFields();
            $editFormModal.find("form").attr("action",createUrl);
            $editFormModal.find("#product-category").val(0).trigger("change");
            $editFormModal.find("#parentId").val(parentId);

            var numberOfSiblings = products.filter(item => item.parent == parentId).length;
            $("#product-order").html('');
            for(var i=1;i<=numberOfSiblings;i++){
                $("#product-order").append(`<option value="${i}">${i}</option>`);
            }

        });
        MakeSearch(products);

        $(document).on('keyup','#searchBox input',function(){
            MakeSearch(products,$(this).val());
        });

    });
    function MakeSearch(products,search=''){
        $searchContainer = $("#searchContainer");
        $searchContainer.html("");
        products.filter(item => item.title.includes(search)).forEach(item => {
            $searchContainer.append(`
                <div class=" col-md-4 col-lg-3 col-12 col-sm-6" style="border-radius: 20px; margin-top:20px;">
                <div data-product-id="${item.productId}"  data-placement="top" data-title="مخفي" data-content="هذا المنتج لا يظهر للمستخدمين"  class="${item.showProduct == false ? 'hidden-product' : ''}" style="height:100%; ">
                <div class="card animate__animated animate__fadeIn"  >
                    <img src="${item.image ?? "https://via.placeholder.com/150"}" style="border-radius: 20px 20px 0 0 ;position: relative;" class="card-img-top">
                    ${item.category ? `<label style="background:linear-gradient(#40bfac, #5fbccc);position:absolute; bottom:0;right:10px;" class="badge badge-primary">تصنيف</label>`: ""}
                    <button class="btn btn-primary editProductButton" style="background:#4e4f50;border-width: 0;width:50px;height:50px;border-radius: 99px;position: absolute; top:20px;right:20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                    </button>
                    <form method='post' action='{{url('/item')}}/${item.productId}'>
                      @csrf
                      @method('delete')
                    <button type="submit"  class="btn btn-danger" style="border-width: 0;width:50px;height:50px;border-radius: 99px;position: absolute; top:20px;left:20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                    </form>
                    <div class="card-body">
                        <h5  class="card-title">${item.title}</h5>
                        <p  class="card-text" style="color:silver;">${item.subtitle == "" ? "&nbsp;" : item.subtitle }</p>
                          <a href="#" style="background:#4e4f50;border-width: 0;" class="btn btn-primary">${item.button1.name ?? ((item.category) ? "عرض المنتجات" : "شراء المنتج" )}</a>
                            ${(item.button2) ? `<a href="#" style="background:#4e4f50;border-width: 0;" class="btn btn-primary">${item.button2.name }</a>` : ""}

                    </div>
                </div>
                </div>
                </div>
            `);
        });
        $searchContainer.find('.hidden-product').popover({trigger:"hover"});
    }

    function addDataToFields(productId){
        var $editFormModal = $("#editFormModal");
        var product = products[productsById[productId]];

        $editFormModal.find('#product-title').val(product.title);
        $editFormModal.find('#product-productId').val(product.productId);
        $editFormModal.find('#product-create').val("0");

        $editFormModal.find('#product-subtitle').val(product.subtitle);

        $editFormModal.find('#product-keywords').val(product.keywords);

        $editFormModal.find('#button-1-type').val(product.button1.type ?? "");
        var $button1Form = $editFormModal.find('#button-1-form');
        var $button2Form = $editFormModal.find('#button-2-form');
        var $button1 =  $("#button-1");
        var $button2 =  $("#button-2");

        if(product.button1.type == "BUY")
        {
            $button1Form.find('.data-button-form').hide();
            $button1Form.find('.buy-button-form').show();
            $button2Form.find('.buy-button-form').removeAttr('disabled');

        }
        else if(product.button1.type == "DATA")
        {
            $button1Form.find('.data-button-form').show();
            $button1Form.find('.buy-button-form').hide();
            $button2Form.find('.data-button-form').removeAttr('disabled');

        }
        else
        {
            $button1Form.find('.data-button-form').hide();
            $button1Form.find('.buy-button-form').hide();
        }
        $button1Form.find('#button-1-name').val(product.button1.name ?? "");
        $button1Form.find('#button-1-price').val(product.button1.price ?? "");
        $button1Form.find('#button-1-details').val(product.button1.details ?? "");

        $button1.html(product.button1.name ?? "");

        if(product.button2){
            $button2Form.show();
            $editFormModal.find('#button-2-type').val(product.button2.type ?? "");

            if(product.button2.type == "BUY")
            {
                $button2Form.find('.data-button-form').hide();
                $button2Form.find('.buy-button-form').show();
                $button2Form.find('.buy-button-form').removeAttr('disabled');

            }
            else if(product.button2.type == "DATA")
            {
                $button2Form.find('.data-button-form').show();
                $button2Form.find('.buy-button-form').hide();
                $button2Form.find('.data-button-form').removeAttr('disabled');

            }
            else
            {
                $button2Form.find('.data-button-form').hide();
                $button2Form.find('.buy-button-form').hide();
            }
            $button2Form.find('#button-2-name').val(product.button2.name ?? "");
            $button2Form.find('#button-2-price').val(product.button2.price ?? "");
            $button2Form.find('#button-2-details').val(product.button2.details ?? "");

            $button2.html(product.button2.name ?? "");
            $button2.removeClass("addButton2");
        }
        else
        {
            $button2.html("+");
            $button2.addClass("addButton2");
            $button2Form.hide();
        }
        $("#imagePreview").attr('src',product.image ?? "https://via.placeholder.com/150");
        $("#button-1-imagePreview").attr('src', product.button1.image ?? "https://via.placeholder.com/150");
        $("#button-2-imagePreview").attr('src', product.button2.image ?? "https://via.placeholder.com/150");
        $editFormModal.find("#product-category").val(product.category ? 1 : 0).trigger("change");

        var numberOfSiblings = products.filter(item => item.parent == product.parent).length;
        $("#product-order").html('');
        for(var i=1;i<=numberOfSiblings;i++){
            $("#product-order").append(`<option value="${i}">${i}</option>`);
        }
        $editFormModal.find('#product-order').val(product.order);

        $("#product-show").prop('checked',product.showProduct);
        $("#product-avalible").prop('checked',product.showProduct);
    }
    function ResetFields()
    {
        var $editFormModal = $("#editFormModal");

        $editFormModal.find('#product-title').val("");
        $editFormModal.find('#product-subtitle').val("");

        $editFormModal.find('#product-productId').val("");
        $editFormModal.find('#product-create').val("1");

        $editFormModal.find('#product-keywords').val("");

        $editFormModal.find('#product-image').val("");

        $editFormModal.find('#button-1-type').val("");
        var $button1Form = $editFormModal.find('#button-1-form');
        var $button2Form = $editFormModal.find('#button-2-form');
        var $button1 =  $("#button-1");
        var $button2 =  $("#button-2");

        $button1Form.find('.data-button-form').hide();
        $button1Form.find('.buy-button-form').hide();

        $button1Form.find('#button-1-name').val("زر #1");
        $button1Form.find('#button-1-price').val("");
        $button1Form.find('#button-1-details').val("");
        $button1.html("زر #1");

        $editFormModal.find('#button-2-type').val("");

        $button2Form.find('.data-button-form').hide();
        $button2Form.find('.buy-button-form').hide();

        $button2Form.find('#button-2-name').val("");
        $button2Form.find('#button-2-price').val("");
        $button2Form.find('#button-2-details').val("");

        $button2.html("+");
        $button2.addClass("addButton2");
        $button2Form.hide();
        $("#imagePreview").attr('src',"https://via.placeholder.com/150");
        $("#button-1-imagePreview").attr('src',"https://via.placeholder.com/150");
        $("#button-2-imagePreview").attr('src',"https://via.placeholder.com/150");
        $button1Form.find('#button-1-image').val("");
        $button2Form.find('#button-2-image').val("");

        $("#productForm").show(100);

        $button1.show(100);
        $button2.show(100);
    }
    function makeBreadCrumbs(categoryId,productsById,products)
    {
        var $breadcrumbsContainer = $("#breadcrumbsContainer");
        var nextParent = categoryId;
        $breadcrumbsContainer.html("");
        while(nextParent && nextParent !== 0){
            var product = products[productsById[nextParent]];

            var template = `<li class="breadcrumb-item" ><span class="navigate-card" data-product-id="${product.productId}" >${product.title}</span></li>`;
            var html = $breadcrumbsContainer.html();
            if(product.productId == categoryId)
            {
                template = `<li class="breadcrumb-item active">${product.title}</li>`;
            }
            $breadcrumbsContainer.html(template + html);
            nextParent = product.parent;
        }
        var html = $breadcrumbsContainer.html();
        $breadcrumbsContainer.html(`<li class="breadcrumb-item ${ !categoryId ? "active" : ""}"><span class="${ !!categoryId ? "navigate-card" : ""} "  href="#">الكل</span></li>` + html);
        $breadcrumbsContainer.append(`<div id="searchBox" style="display:none;">
        <div class="input-group rounded">
            <input type="search"  class="form-control rounded" placeholder="Search" aria-label="Search"
                  aria-describedby="search-addon" />

        </div>
    </div>`);
    }
    function makeProducts(products,categoryId=null)
    {
        var $productsContainer = $("#productsContainer");
        $productsContainer.html("");
        $productsContainer.append(`
                <div data-parent-id="${categoryId}" class= " animate__animated animate__fadeIn col-md-4 col-lg-3 col-12 col-sm-6 d-flex justify-content-center align-items-center addProductButton"  style="margin-top:20px;cursor:pointer;border-radius: 20px; border-style: dashed; border-color:#ccc; flex-direction: column;">
                    <h1 style="color:#ccc;">
                    +
                    </h1>
                  <br/><div style="color:#ccc;"> <small>اضافة منتج او تصنيف</small></div>
                </div>
            `);
        products.filter(item => item.parent == categoryId ).sort((a,b) => a.order-b.order).forEach(item => {
            var i = $productsContainer.append(`
                <div class="col-md-4 col-lg-3 col-12 col-sm-6" style="border-radius: 20px;margin-top:20px;">
                <div data-product-id="${item.productId}"  data-placement="top" data-title="مخفي" data-content="هذا المنتج لا يظهر للمستخدمين"  class="${item.category ? "navigate-card" : null } ${item.showProduct == false ? 'hidden-product' : ''}" style="height:100%; ">
                <div class="card animate__animated  animate__fadeIn " >
                    <img src="${item.image ?? "https://via.placeholder.com/150"}" style="border-radius: 20px 20px 0 0 ;" class="card-img-top">
                    ${item.category ? `<label style="background:linear-gradient(#40bfac, #5fbccc);position:absolute; bottom:0;right:10px;" class="badge badge-primary">تصنيف</label>`: ""}
                    <button class="btn btn-primary editProductButton" style="background:#4e4f50;border-width: 0;width:50px;height:50px;border-radius: 99px;position: absolute; top:20px;right:20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                    </button>
                    <form method='post' action='{{url('/item')}}/${item.productId}'>
                      @csrf
                      @method('delete')
                    <button type="submit"  class="btn btn-danger" style="border-width: 0;width:50px;height:50px;border-radius: 99px;position: absolute; top:20px;left:20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                    </form>
                    <div class="card-body">
                        <h5  class="card-title">${item.title}</h5>
                        <p  class="card-text" style="color:silver;">${item.subtitle == "" ? "&nbsp;" : item.subtitle }</p>
                          <a href="#" style="background:#4e4f50;border-width: 0;" class="btn btn-primary">${item.button1.name ?? ((item.category) ? "عرض المنتجات" : "شراء المنتج" )}</a>
                            ${(item.button2) ? `<a href="#" style="background:#4e4f50;border-width: 0;" class="btn btn-primary">${item.button2.name }</a>` : ""}

                    </div>
                </div>
                </div>
                </div>
            `);

        });
        $productsContainer.find('.hidden-product').popover({trigger:"hover"});
    }
    function gotoProduct(productId)
    {
        makeProducts(products,productId);
        makeBreadCrumbs(productId,productsById,products);
        productsTree = makeTree(products,productsById);
        drawTree(productsTree,productId);
        $("#editFormModal").find('#product-parentId').val(productId);
    }

    function formatProducts(products)
    {
        var formattedProducts = [];

        products.forEach(item => {
            var product = {};
            var Button1 = {};
            var Button2 = {};

                        product.productId = item.product_id;

                        product.showProduct =  item.active;

                        product.quantity = item.Quantity;

                        product.title = item.title;

                        product.subtitle = item.subtitle;

                        product.keywords = item.keywords;

                        product.category = (item.category_or_not == 1) ? true : false;

                        product.image = item.image;
                        product.parent = (!!item.Category ) ? parseInt(item.Category.replaceAll(",","")) : null;


                        Button1.type = (item.button1Target == "SubCategories")? "BUY" : (!item.button1Target )? undefined : "DATA";
                        Button1.name = item.button1Caption;

                        if(Button1.type == "DATA"){
                            Button1.details = item.details;
                            Button1.image = item.detail_image;
                        }


                        Button2.type = (item.button2Target == "SubCategories")? "BUY" : (!item.button2Target )? undefined : "DATA";


                        Button2.name = item.button2Caption;


                        if(Button2.type == "DATA"){
                            Button2.details = item.details;
                            Button2.image = item.detail_image;
                        }


            if(product.category && Button1.type == "BUY")
            {
                Button1.type = "SHOW";
            }
            if(!!Button1.type)
            {
                product.button1 = Button1;
            }
            if(product.category && Button2.type == "BUY")
            {
                Button2.type = "SHOW";
            }
            if(!!Button2.type)
            {
                product.button2 = Button2;
            }
            formattedProducts.push(product);
        });
        return formattedProducts;
    }
</script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> --}}
  
@endsection