@extends('Dashbord/layout/master')
@section('style')
<style>


#button {
  display: block;
  margin: 0 auto;
  padding: .6em .8em;
  /* Font-size is the root value that determines size of spinner parts. 
Change this to whatever you want and spinner elements will size to match. */
  font-size: 20px;
  font-weight: bold;
  border-radius: .4em;
  border: none;
  overflow: hidden;
  cursor: pointer;
  position: relative;
  transition: all 1s;
}

/* focus/disabled styles, you can change this for accessibility */
#button:focus, #button:disabled {
  outline: none;
  background: #aaa;
}

/* This is the space for the spinner to appear, applied to the button */
.spin {
  padding-left: 2.5em;
  display: block;
}

/* position of the spinner when it appears, you might have to change these values */
.spin .spinner {
  left: -.6em;
  top: .4em;
  width: 2.5em;
  display: block;
  position: absolute;
}

/* spinner animation */
@keyframes spinner {
  0% {
    transform: rotate(0deg);
  }
  
  100% {
    transform: rotate(360deg);
  }
}

/* The actual spinner element is a pseudo-element */
.spin .spinner::before {
  content: "";
  width: 1.5em; /* Size of the spinner */
  height: 1.5em; /* Change as desired */
  position: absolute;
  top: 50%;
  left: 50%;
  border-radius: 50%;
  border: solid .35em #999; /* Thickness/color of spinner track */
  border-bottom-color: #555; /* Color of variant spinner piece */
  animation: .8s linear infinite spinner; /* speed of spinner */
  transform: translate(-50%, -50%);
  will-change: transform;
}

</style>
<link rel="stylesheet" href="{{asset('css/dashbord/item/index.css')}}">
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
    


  <div class="content">
    <div class="col-3 na-v mt-4  d-flex justify-content-center" style="text-align:center; ">
        <ul class="nav flex-column shadow pb-3" style="background-color: white;border-radius: 25px;">
            <h5 class="mb-4 p-2"  style="color: white;background-color: #10858b;width: 200px;border-radius: 10px 10px 0px 0px;">الأصناف الرئيسية</h5>
          @foreach ($items as $item)
            @if (isset($item[28])&& ($item[28]=="1"))
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
                                @if (isset($item[28])&& ($item[28]=="1"))
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
              {{-- <img class="img-fluid mb-5"  src="image2/12.jpg"style=" max-width: 200px;margin-left: 280px;" > --}}
              <div class="form-row" dir="rtl">
                <div class="form-group col-md-6">
                  <label for="#" style="display: flex;">إسم الصنف</label>
                  <input type="text" name="name" class="form-control" id="categoryName" placeholder="أدخل إسم المنتج">
                </div>
                <div class="form-group col-md-6">
                  <label for="#">تحت تصنيف:</label>
                  <select name="titel" id="categoryTitel" style="width: 200px;text-align: center;">
                    <option value="0">ليس تحت تصنيف</option>

                    @foreach ($items as $item)
                      @if (isset($item[28])&& ($item[28]=="1"))
                        <option value="{{$item[1]}}">{{$item[3]}}</option>
                      @endif
                    @endforeach
          
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="#"style="display: flex;"">إضافة التفاصيل</label>
                <textarea class="form-control" name="info" id="categoryInfo" rows="3"></textarea>
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
                  
                      <input type="file" id="myFile" name="image" >  
                  
                <div class="d-flex justify-content-center">
          
                  <button type="submit" class="btn btn-info mt-3" style="display: grid;width: 300px; border-radius: 22px;">  حفظ </button>
                </div>
          </form>
        </div>

      </div>
  </div>

  <div id="addItem" class="modal">
    <!-- Modal content -->
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
                <div class="form-group col-md-3">
                  <label for="#"style="display: flex;"> الكمية</label>
                  <input type="number" name="qyantity" class="form-control" id="itemQyantity" placeholder="كمية المنتج">
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
                    <span id="img333" style='display:none;'>
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; shape-rendering: auto; animation-play-state: running; animation-delay: 0s;"
                       width="30px" height="30px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <circle cx="50" cy="50" fill="none" stroke="#93dbe9" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138" style="animation-play-state: running; animation-delay: 0s;">
                          <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1" style="animation-play-state: running; animation-delay: 0s;"></animateTransform>
                        </circle>
                      </svg>
                    </span>
                    </button>                </div>
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
            <button onclick='select()'  class='btn btn-success w-50  justify-content-center mr-1' style='height: 40px;border-radius: 85px;' >اضافة تفاصيل</button>

          </div>
          
          </div>
          {{-- class="form-group col-md-6" --}}
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
                  <span id="img333" style='display:none;'>
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
    {{-- <button  type="submit"></button> --}}

  </form>

@endsection
@section('script')  

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>

  let clearFlag=0;
  function showModelCategory() {
    
      // // Get the modal
      var addCategory = document.getElementById("addCategory");
      
      // Get the button that opens the modal
      var showAddCategory = document.getElementById("showAddCategory");
      
      // Get the <span> element that closes the modal
      var closesModelCategory = document.getElementsByClassName("closesModelCategory")[0];
      
      // When the user clicks the button, open the modal 
      showAddCategory.onclick = function() {
          addCategory.style.display = "block";
          console.log('click on btn')
      }
      
      // When the user clicks on <span> (x), close the modal
        closesModelCategory.onclick = function() {
          addCategory.style.display = "none";
      }
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == addCategory) {
          addCategory.style.display = "none";
        }
      }
  }
  function showModelItem() {
      // Get the modal
    var addItem = document.getElementById("addItem");
    
    // Get the button that opens the modal
    var addbtn = document.getElementById("showAddItem");
    
    // Get the <span> element that closes the modal
    var closesModelItem = document.getElementsByClassName("closesModelItem")[0];
    var closesModelInformtion = document.getElementsByClassName("closesModelInformtion")[0];
    var closesModeloption = document.getElementsByClassName("closesModeloption")[0];
    
    // When the user clicks the button, open the modal 
    addbtn.onclick = function() {
        addItem.style.display = "block";
        if (clearFlag == 1) {
            clearInputItem();
            clearFlag=0;
            }
    }
    
    // When the user clicks on <span> (x), close the modal
    closesModelItem.onclick = function() {
        clearInputItem();
        addItem.style.display = "none";
    }
    closesModelInformtion.onclick = function() {
        clearInputItem();
        addItem.style.display = "none";
    }
    closesModeloption.onclick = function() {
        clearInputItem();
        addItem.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == addItem) {
        addItem.style.display = "none";
      }
    }
  }
  showModelItem();
  showModelCategory();
  

  var items = @json($items,JSON_PRETTY_PRINT);

  function show(id,index) { 
    $('.sign'+id+' #s1').toggleClass('close1');
    $('.sign'+id+' #s2').toggleClass('close2');

    document.getElementById('sub'+id).innerHTML="";
    document.getElementById('category').innerHTML="<div class='col-4  d-flex justify-content-center pl-4 pr-4'><div class='card ml-4 mr-4 pl-4 pr-4 d-flex justify-content-center' style='min-width: 130px; border-radius: 25px;'><button  id='showAddCategory' class='btn btn-success fa fa-plus pt-3 d-flex justify-content-center mx-auto' style='border-radius: 8vh;width: 50px;height: 50px;'></button></div></div>";
    // document.getElementById('category').innerHTML="";
    document.getElementById('item').innerHTML="<div class=' col-4  d-flex justify-content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><button id='showAddItem' class='btn btn-success fa fa-plus pt-3 d-flex justify-content-center mx-auto' style='border-radius: 8vh;width: 50px;height: 50px;'></button></div></div>";

    var sub=document.getElementById('sub'+id);
    items.forEach(element => {
      if (parseInt(element[7].replaceAll(",","")) == id) {

        if (Math.floor(element[28])=='1') {

          sub.innerHTML += '<div><a class="btn" onclick="show('+element[1]+','+(index+1)+')" data-bs-toggle="collapse" data-bs-target="#collapseExample'+element[1]+'" aria-expanded="false" aria-controls="collapseExample'+element[1]+'" style="text-align: center;"> '+element[3]+' <span class="sign'+element[1]+'" id="sign"><span id="s1" class="s"></span><span id="s2" class="s"></span></span>  </a><div class="collapse" id="collapseExample'+element[1]+'"><div id="sub'+element[1]+'"></div></div>';

          document.getElementById('category').innerHTML+= category(element);
        }
      
        Math.floor(element[28])=='0'? document.getElementById('item').innerHTML+= item(element):"";
      }
   

    });
    var showAddCategory = document.getElementById("showAddCategory");
    showAddCategory.onclick = function() {
          addCategory.style.display = "block";
          console.log('click on btn')
      }
    var addbtn = document.getElementById("showAddItem");

    addbtn.onclick = function() {
          addItem.style.display = "block";
          if (clearFlag == 1) {
              clearInputItem();
              clearFlag=0;
              }
      }
   
  }

  function category(element) {
    return "<div class=' col-4  d-flex justify-content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><div class='text-center'><img class='img-fluaid' src='"+element[6]+"' style='width:12vh;'></img></div><p class='card-title  d-flex justify-content-center mt-2'> "+element[3]+" </p><div class='row'><div class='col-6'><button onclick='deleteItem("+element[1]+")' class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button></div><div class='col-6'><button  onclick='editCategory("+element[1]+")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button></div></div></div></div>"; 
    
  }
  function item(element) {
    return "<div class=' col-4  d-flex justify-content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><div class='text-center'><img class='img-fluaid' src='"+element[6]+"' style='width:12vh;'></img></div><p class='card-title  d-flex justify-content-center mt-2'> "+element[3]+" </p><div class='row'><div class='col-6'><button onclick='deleteItem("+element[1]+")' class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button></div><div class='col-6'><button  onclick='editItem("+element[1]+")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button></div></div></div></div>"; 
    
  }
  function editCategory(id) {
    var hostName = window.location.origin;
    var row=[];
    items.forEach(element => {
      if (element[1]==id) {
        row =  element;
      }
      
    });
    
    console.log('on function Edit Category and date on row = ', row[29]);
    document.getElementById('showAddCategory').click();
    document.getElementById('categoryForm').action=hostName+'/category/'+id;
    document.getElementById('categoryName').value=row[3];
    document.getElementById('categoryTitel').value=Math.floor(row[7]);
    document.getElementById('categoryInfo').value=row[27]; 
    document.getElementById('categoryShow').checked= row[0]=='TRUE'?true:false;
  }
  
  function editItem(id) {
    var hostName = window.location.origin;
    var row=[];
    items.forEach(element => {
      if (element[1]==id) {
        row =  element;
      }
      
    });
    document.getElemenInformtion
Informtion
Informtion
Informtion
Informtion
Informtion
Informtion
Informtion
Informtion
Informtion
Informtion
Informtion
Informtion
Informtion
Informtion
Informtion
Informtion
InformtionById('itemKeywords').value=row[4]; 
    document.getElementById('itemShow').checked= (row[0]=='TRUE')?true:false;

      document.getElementById('itemFormInformtion').action=hostName+'/item/'+row[1];
      document.getElementById('itemNameInformtion').value=row[3];
      document.getElementById('itemTitelInformtion').value=parseInt(row[7].replaceAll(",",""));
      document.getElementById('itemInfoInformtion').value=row[27]; 
      document.getElementById('itemSubtitleInformtion').value=row[5].split(",").pop(); 
      document.getElementById('itemKeywordsInformtion').value=row[4]; 
      document.getElementById('itemShowInformtion').checked= (row[0]=='TRUE')?true:false;
    
      clearFlag=1;
    
    console.log(isEmpty(row[2]));
    if (isEmpty(row[2])) {
      document.getElementById('modal-content-select-option').style.display='none';
      document.getElementById('modal-content-select-informtion').style.display='block';

    }else{
      document.getElementById('modal-content-select-option').style.display='none';
      document.getElementById('modal-content-select-item').style.display='block';

    }
   
   
  }
  function clearInputItem(){
    var hostName = window.location.origin;
    document.getElementById('itemForm').action=hostName+'/item/';
    document.getElementById('itemName').value="";
    document.getElementById('itemPrice').value="";
    document.getElementById('itemTitel').value="";
    document.getElementById('itemInfo').value="" 
    document.getElementById('itemQyantity').value="" 
    document.getElementById('itemSubtitle').value="" 
    document.getElementById('itemKeywords').value="" 
    document.getElementById('itemShow').checked=false;
    resetSelectOption();
  }
  function deleteItem(id) {
    var hostName = window.location.origin;
    document.getElementById('deleteItemForm').action=hostName+'/item/'+id;
    document.getElementById('deleteItemForm').submit();
  }
  function selectItem() {
    document.getElementById('modal-content-select-option').style.display='none';
    document.getElementById('modal-content-select-item').style.display='block';
  }
  function selectInformtion() {
    document.getElementById('modal-content-select-option').style.display='none';
    document.getElementById('modal-content-select-informtion').style.display='block';
  }
  function resetSelectOption() {
    document.getElementById('modal-content-select-item').style.display='none';
    document.getElementById('modal-content-select-informtion').style.display='none';
    document.getElementById('modal-content-select-option').style.display='block';

  }
  function isEmpty(value){
   return (value == null || value.length === 0);
  }
  
  function checkInputitemFormInformtion() {
      var itemNameInformtion=document.getElementById('itemNameInformtion').value;
      var itemTitelInformtion=document.getElementById('itemTitelInformtion').value;
      var itemInfoInformtion=document.getElementById('itemInfoInformtion').value;
      var itemSubtitleInformtion=document.getElementById('itemSubtitleInformtion').value;
      var itemKeywordsInformtion=document.getElementById('itemKeywordsInformtion').value;
      var itemShowInformtion=document.getElementById('itemShowInformtion');

      if ( itemNameInformtion!="" && itemTitelInformtion!="" && itemInfoInformtion!="" && itemSubtitleInformtion!=""  && itemKeywordsInformtion!="" ) {
        loding();
      }
  }
  function checkInputitemForm() {
      var itemName=document.getElementById('itemName').value;
      var itemTitel=document.getElementById('itemTitel').value;
      var itemInfo=document.getElementById('itemInfo').value;
      var itemSubtitle=document.getElementById('itemSubtitle').value;
      var itemKeywords=document.getElementById('itemKeywords').value;
      var itemPrice=document.getElementById('itemPrice').value;
      var itemQyantity=document.getElementById('itemQyantity').value;

      if ( itemName!="" && itemTitel!="" && itemInfo!="" && itemSubtitle!=""  && itemKeywords!="" &&itemPrice !="" && itemQyantity!="" ) {
        loding();
      }
  }

  </script>
@endsection