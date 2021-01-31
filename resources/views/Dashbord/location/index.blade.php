@extends('Dashbord/layout/master')
@section('style')
<style>
  #weatherWidget .currentDesc {
  color: #ffffff!important;
  }
  .traffic-chart {
    min-height: 335px;
  }
  #flotPie1  {
    height: 150px;
  }
  #flotPie1 td {
    padding:3px;
  }
  #flotPie1 table {
    top: 20px!important;
    right: -10px!important;
  }
  .chart-container {
    display: table;
    min-width: 270px ;
    text-align: left;
    padding-top: 10px;
    padding-bottom: 10px;
  }
  #flotLine5  {
    height: 105px;
  }

  #flotBarChart {
    height: 150px;
  }
  #cellPaiChart{
    height: 160px;
  }
  .actionby {
    font-size: 12px;
  }
  .text-left {
    position: relative;
    right: 22px
  }
  .na-v {
    position: absolute;
  right: 1%;
  }
  .form-switch {
  display: inline-block;
  cursor: pointer;
  -webkit-tap-highlight-color: transparent;
  }

  .form-switch i {
  position: relative;
  display: inline-block;
  margin-right: .5rem;
  width: 46px;
  height: 26px;
  background-color: #e6e6e6;
  border-radius: 23px;
  vertical-align: text-bottom;
  transition: all 0.3s linear;
  }

  .form-switch i::before {
  content: "";
  position: absolute;
  left: 0;
  width: 42px;
  height: 22px;
  background-color: #fff;
  border-radius: 11px;
  transform: translate3d(2px, 2px, 0) scale3d(1, 1, 1);
  transition: all 0.25s linear;
  }

  .form-switch i::after {
  content: "";
  position: absolute;
  left: 0;
  width: 22px;
  height: 22px;
  background-color: #fff;
  border-radius: 11px;
  box-shadow: 0 2px 2px rgba(0, 0, 0, 0.24);
  transform: translate3d(2px, 2px, 0);
  transition: all 0.2s ease-in-out;
  }

  .form-switch:active i::after {
  width: 28px;
  transform: translate3d(2px, 2px, 0);
  }

  .form-switch:active input:checked + i::after { transform: translate3d(16px, 2px, 0); }

  .form-switch input { display: none; }

  .form-switch input:checked + i { background-color: #4BD763; }

  .form-switch input:checked + i::before { transform: translate3d(18px, 2px, 0) scale3d(0, 0, 0); }

  .form-switch input:checked + i::after { transform: translate3d(22px, 2px, 0); }

  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  /* Modal Content */
  .modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  }

  /* The Close Button */
  .close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  }

  .close:hover,
  .close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
  }
  .stat-widget-five .stat-heading {
  color: #99abb4;
  font-size: 12px;
  color: black;
  font-style: normal;
  width: max-content;
  }
  * {
  font-family: cairo;
  }
  p {
  font-family: cairo;
  }

  #sign{
      width: 0px;
      height: 5px;
      display: inline-block;
      position: static;
      top:25px;
      right:10px;
      margin-left: -5px;
  }
  #sign .s{
      width: 10px;
      height: 4px;
      display:inline-block;
      border-radius:2px;
      background-color:black;
      position:absolute;
  }
  #sign #s1{
      transform:rotate(45deg);
      z-index:100;
      margin-left:0;
      transition:all 0.5s ease-out;
      margin-left: 11px;
  }
  #sign #s2{
      transform:rotate(-45deg);
      z-index:200;
      margin-left:16px;
      transition:all 0.5s ease-in;
  }
  #sign #s2.close2{
      margin-left:7px;
      transition:all 0.5s ease-out;
  }
  #sign #s1.close1{
      margin-left:7px;
      transition:all 0.5s ease-out;
  }

</style>
@endsection
{{-- @section('content')

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
        <div class="card">
            <div class="row">
                @foreach ($loctions as $key => $loction)
                  @if ($loction[4]=="")
                    <div class='  col-l-3 col-s-12  content-center'>
                      <div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'>
                          <div class='text-center'>
                              <img class='img-fluaid' src='{{ $loction[1] }}' style='width:12vh;'></img>
                          </div>
                          <p class='card-title  d-flex justify-content-center mt-2'>{{$loction[0]}}</p>
                              <span class='w-100 flex-fill bd-highlight' style='display:flex;position: inherit;right: 18.5px;'>
                              <button  onclick='showSubLocatin("{{$loction[0]}}")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >عرض المناطق</button>
                          </span>
                      </div>
                    </div> 
                  @endif
                @endforeach
                
            </div>
        </div>
        <div class="card">
            <div class="row" id="subLoction">

            </div>
        </div>
    
    </div>



  <div id="editLocationModel" class="modal">
  <!-- Modal content -->
    <div class="modal-content">
      <span class="closeEditLocationModel">&times;</span>
      <div class="row" style="padding-left: 10%;">
        <form id="userForm" action="{{url('/location')}}" dir="rtl" class="mx-auto" method="POST">
          @csrf
            <div class="form-row" dir="rtl">
              <input type="hidden" id="idLocation" name="id">
              
              <div class="form-group col-md-6">
                <label for="#" style="display: flex;">سعر التوصيل</label>
                <input type="number" name="price" class="form-control" id="locationPrice" required placeholder="أدخل رقم الهاتف">
              </div>
              <div class="form-group col-md-6">
                <label for="#" style="display: flex;">تفعيل المنطقة</label>

                <label class="form-switch">
                  <input name="show" id="locationShow" type="checkbox"><i></i>
                </label>
              </div>

              
            </div>
               
                
                
              <div class="d-flex justify-content-center">
        
                <button type="submit" class="btn btn-info mt-3" style="display: grid;width: 300px; border-radius: 22px;"> حفظ </button>
              </div>
        </form>
      </div>

    </div>
  </div>




@endsection --}}
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
            @if ($loction[4]=="")
            <li>
              <a class="btn" onclick="show('{{$loction[5]}}','0','{{$loction[0]}}')" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$loction[5]}}" aria-expanded="false" aria-controls="collapseExample{{$loction[5]}}"style="text-align: center;"> {{$loction[0]}}<span class="sign{{$loction[5]}}" id="sign"><span id="s1" class="s"></span><span id="s2" class="s"></span></span> </a>
              <div class="collapse" id="collapseExample{{$loction[5]}}">
               
                <div id="sub{{$loction[5]}}">   
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
                              
                              @foreach ($loctions as $key=> $loction)
                                @if ($loction[4]=="")
                                <div class=' col-4  d-flex justify-content-center'>
                                  <div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'>
                                    <div class='text-center'>
                                          <img class='img-fluaid' src='{{$loction[1]}}' style="width:12vh;border-radius: 5px;"></img>
                                    </div>
                                    <p class='card-title  d-flex justify-content-center mt-2'> {{$loction[0]}} </p> 
                          
                                    <div class="row">
                                      {{-- <div class="col-6">
                                        <button class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button>

                                      </div> --}}
                                      <div class="col-6">
                                        <button  onclick='editCategory("{{$loction[5]}}")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button>

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

                    {{-- @foreach ($items as $item)
                      @if ($item[3]=='1')
                        <option value="{{$item[9]}}">{{$item[1]}}</option>
                      @endif
                    @endforeach --}}
          
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
  


@endsection
{{-- @section('script')

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <script>
      var loctions = @json($loctions,JSON_PRETTY_PRINT);
      function showEditLocationModel() {
              // // Get the modal
        var editLocationModel = document.getElementById("editLocationModel");

        var closeEditLocationModel = document.getElementsByClassName("closeEditLocationModel")[0];

        editLocationModel.style.display = "block";

        closeEditLocationModel.onclick = function() {
            editLocationModel.style.display = "none";
        }
        window.onclick = function(event) {
        if (event.target == editLocationModel) {
            editLocationModel.style.display = "none";
        }
        }
      }   
      function showSubLocatin(locationName) {
        var subLoactionDiv= document.getElementById('subLoction');
        subLoactionDiv.innerHTML="";
        loctions.forEach(element => {
          if (element[4]==locationName) {
            subLoactionDiv.innerHTML+= showLocation(element);
          }
          
        });
      }
      function EditsubLocatin(id) {

        var location= [];
        loctions.forEach(element => {
          if (element[5]==id) {
            location=element;
            
          }
        });
        document.getElementById('idLocation').value=location[5];
        document.getElementById('locationPrice').value=location[3];
        document.getElementById('locationShow').checked= location[2]=='TRUE'?true:false;


        showEditLocationModel();
      } 
      function showLocation(element) {
        return " <div class='  col-l-3 col-s-12  content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><div class='text-center'><img class='img-fluaid' src='"+ element[1]+"' style='width:12vh;'></img></div><p class='card-title  d-flex justify-content-center mt-2'>"+ element[0]+"</p><span class='w-100 flex-fill bd-highlight' style='display:flex;position: inherit;right: 18.5px;'><button  onclick='EditsubLocatin("+ element[5]+")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #FF8F00;' >تعديل</button><span> "+element[3]+" د</span></span><span class='text-white badge rounded-pill  " + (element[2]=='TRUE'?"bg-success":"bg-danger" )+ "'>" + (element[2]=='TRUE'?"تم التفعيل":"لم يتم التفعيل" )+ "</span></div></div> ";
      }

  </script>

@endsection --}}
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

  showModelCategory();
  
  var loctions = @json($loctions,JSON_PRETTY_PRINT);


  function show(id,index,name) { 
    $('.sign'+id+' #s1').toggleClass('close1');
    $('.sign'+id+' #s2').toggleClass('close2');
       console.log(id);

    document.getElementById('sub'+id).innerHTML="";
    document.getElementById('category').innerHTML="<div class='col-4  d-flex justify-content-center pl-4 pr-4'><div class='card ml-4 mr-4 pl-4 pr-4 d-flex justify-content-center' style='min-width: 130px; border-radius: 25px;'><button  id='showAddCategory' class='btn btn-success fa fa-plus pt-3 d-flex justify-content-center mx-auto' style='border-radius: 8vh;width: 50px;height: 50px;'></button></div></div>";
    // document.getElementById('category').innerHTML="";
    // document.getElementById('item').innerHTML="<div class=' col-4  d-flex justify-content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><button id='showAddItem' class='btn btn-success fa fa-plus pt-3 d-flex justify-content-center mx-auto' style='border-radius: 8vh;width: 50px;height: 50px;'></button></div></div>";

    var sub=document.getElementById('sub'+id);
    loctions.forEach(element => {
      console.log(element[4] , name);

      if (element[4] == name ) {
        // if (element[3]=='1') {
          console.log("id is"+id, "elementId is"+Math.floor(element[5]));

          sub.innerHTML += '<div><a class="btn" onclick="show('+element[5]+','+(index+1)+','+element[0]+')" data-bs-toggle="collapse" data-bs-target="#collapseExample'+element[5]+'" aria-expanded="false" aria-controls="collapseExample'+element[5]+'" style="text-align: center;"> '+element[0]+' <span class="sign'+element[5]+'" id="sign"><span id="s1" class="s"></span><span id="s2" class="s"></span></span>  </a><div class="collapse" id="collapseExample'+element[5]+'"><div id="sub'+element[5]+'"></div></div>';

          document.getElementById('category').innerHTML+= category(element);
        // }
      
        //  element[3]=='0'? document.getElementById('item').innerHTML+= item(element):"";
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
    return "<div class=' col-4  d-flex justify-content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><div class='text-center'><img class='img-fluaid' src='"+element[1]+"' style='width:12vh;'></img></div><p class='card-title  d-flex justify-content-center mt-2'> "+element[0]+" </p><div class='row'><div class='col-6'><button class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button></div><div class='col-6'><button  onclick='editCategory("+element[5]+")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button></div></div></div></div>"; 
    
  }
  function item(element) {
    return "<div class=' col-4  d-flex justify-content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><div class='text-center'><img class='img-fluaid' src='"+element[6]+"' style='width:12vh;'></img></div><p class='card-title  d-flex justify-content-center mt-2'> "+element[1]+" </p><div class='row'><div class='col-6'><button class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button></div><div class='col-6'><button  onclick='editItem("+element[9]+")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button></div></div></div></div>"; 
    
  }
  function editCategory(id) {
    var hostName = window.location.origin;
    var row=[];
    items.forEach(element => {
      if (element[9]==id) {
        row =  element;
      }
      
    });
    
    console.log('on function Edit Category and date on row = ', row[7]);
    document.getElementById('showAddCategory').click();
    document.getElementById('categoryForm').action=hostName+'/category/'+id;
    document.getElementById('categoryName').value=row[1];
    document.getElementById('categoryTitel').value=row[0];
    document.getElementById('categoryInfo').value=row[4]; 
    document.getElementById('categoryShow').checked= row[7]=='TRUE'?true:false;
  }
  
  function editItem(id) {
    var hostName = window.location.origin;
    var row=[];
    items.forEach(element => {
      if (element[9]==id) {
        row =  element;
      }
      
    });
    console.log(row[10]+'value of info');
    
    console.log('on function Edit Category and date on row = ', row[7]);
    document.getElementById("showAddItem").click();
    document.getElementById('itemForm').action=hostName+'/item/'+id;
    document.getElementById('itemName').value=row[1];
    document.getElementById('itemPrice').value=row[2];
    document.getElementById('itemTitel').value=row[0];
    document.getElementById('itemInfo').value=row[10]; 
    document.getElementById('itemShow').checked= row[7]=='TRUE'?true:false;
    clearFlag=1;
  }
  function clearInputItem(){
    var hostName = window.location.origin;
    document.getElementById('itemForm').action=hostName+'/item/';
    document.getElementById('itemName').value="";
    document.getElementById('itemPrice').value="";
    document.getElementById('itemTitel').value="";
    document.getElementById('itemInfo').value="" 
    document.getElementById('itemShow').checked=false;
    }
  
 
  </script>
@endsection