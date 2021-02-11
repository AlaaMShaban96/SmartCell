@extends('Dashbord/layout/master')
@section('style')
<style>
  #weatherWidget .currentDesc {
  color: #ffffff!important;
  }200
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
      z-index:1;
      margin-left:0;
      transition:all 0.5s ease-out;
      margin-left: 11px;
  }
  #sign #s2{
      transform:rotate(-45deg);
      z-index:1;
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
            <form  action="{{url('/setLocation')}}" dir="rtl"  method="POST" enctype="multipart/form-data">
              @csrf
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



@endsection

@section('script')  

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
  var loctions = @json($loctions,JSON_PRETTY_PRINT);

  let clearFlag=0;
  function showLocationModel() {
    
      // // Get the modal
      var addCategory = document.getElementById("editLocationModel");
      
      // Get the button that opens the modal
      var showAddCategory = document.getElementById("showAddCategory");
      
      // Get the <span> element that closes the modal
      var closeEditLocationModel = document.getElementsByClassName("closeEditLocationModel")[0];
      
      // When the user clicks the button, open the modal 
      showAddCategory.onclick = function() {
          addCategory.style.display = "block";
          console.log('click on btn showAddCategory')
      }
      
      // When the user clicks on <span> (x), close the modal
        closeEditLocationModel.onclick = function() {
          addCategory.style.display = "none";
          clear();
        }
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == addCategory) {
          clear();
          addCategory.style.display = "none";
        }
      }
  }

  showLocationModel();

  function show(id,index,name) { 
    $('.sign'+id+' #s1').toggleClass('close1');
    $('.sign'+id+' #s2').toggleClass('close2');
      //  console.log(name);
       console.log('sub'+id);
    document.getElementById('sub'+id).innerHTML="";
    document.getElementById('category').innerHTML="<div class='col-4  d-flex justify-content-center pl-4 pr-4'><div class='card ml-4 mr-4 pl-4 pr-4 d-flex justify-content-center' style='min-width: 130px; border-radius: 25px;'><button  id='showAddCategory' class='btn btn-success fa fa-plus pt-3 d-flex justify-content-center mx-auto' style='border-radius: 8vh;width: 50px;height: 50px;'></button></div></div>";

    var sub=document.getElementById('sub'+id);
    loctions.forEach(element => {
     

      if (Math.floor(element[24]) == name ) {
       
        // if (element[3]=='1') {
          // console.log("id is"+id, "elementId is"+Math.floor(element[5]));

          sub.innerHTML += '<div><a class="btn" onclick="show('+element[11]+','+(index+1)+','+element[11]+')" data-bs-toggle="collapse" data-bs-target="#collapseExample'+element[11]+'" aria-expanded="false" aria-controls="collapseExample'+element[11]+'" style="text-align: center;"> '+element[1]+' <span class="sign'+element[11]+'" id="sign"><span id="s1" class="s"></span><span id="s2" class="s"></span></span>  </a><div class="collapse" id="collapseExample'+element[11]+'"><div id="sub'+element[11]+'"></div></div>';

          document.getElementById('category').innerHTML+= showLocation(element);
        // }
      
        //  element[3]=='0'? document.getElementById('item').innerHTML+= item(element):"";
      }

    });
    showLocationModel();

   
  }

  function showLocation(element) {
    return "<div class=' col-4  d-flex justify-content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><div class='text-center'><img class='img-fluaid' src='"+element[4]+"' style='width:12vh;'></img></div><p class='card-title  d-flex justify-content-center mt-2'> "+element[1]+" </p><div class='row'><div class='col-6'><button class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button></div><div class='col-6'><button  onclick='EditsubLocatin("+element[11]+")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button></div></div></div></div>"; 
    
  }

  function showLocation1(element) {
        return " <div class='  col-l-3 col-s-12  content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><div class='text-center'><img class='img-fluaid' src='"+ element[1]+"' style='width:12vh;'></img></div><p class='card-title  d-flex justify-content-center mt-2'>"+ element[0]+"</p><span class='w-100 flex-fill bd-highlight' style='display:flex;position: inherit;right: 18.5px;'><button  onclick='EditsubLocatin("+ element[5]+")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #FF8F00;' >تعديل</button><span> "+element[3]+" د</span></span><span class='text-white badge rounded-pill  " + (element[2]=='TRUE'?"bg-success":"bg-danger" )+ "'>" + (element[2]=='TRUE'?"تم التفعيل":"لم يتم التفعيل" )+ "</span></div></div> ";
  }
  function showEditLocationModel() {
    //       // // Get the modal
    var editLocationModel = document.getElementById("editLocationModel");

    var showAddCategory = document.getElementById("showAddCategory");
  
      // Get the <span> element that closes the modal
      var closeEditLocationModel = document.getElementsByClassName("closeEditLocationModel")[0];
      
      // When the user clicks the button, open the modal 
      showAddCategory.onclick = function() {
          editLocationModel.style.display = "block";
          console.log('click on btn showEditLocationModel')
      }

        editLocationModel.style.display = "block";

        closeEditLocationModel.onclick = function() {
            editLocationModel.style.display = "none";
            clear();
        }
        window.onclick = function(event) {
        if (event.target == editLocationModel) {
          clear();
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
    console.log('here',location);
    document.getElementById('nameLocation').value=location[0];
    document.getElementById('priceLocation').value=location[3];
    document.getElementById('showLocation').checked= location[2]=='TRUE'?true:false;
    console.log('here toooooo');

    showEditLocationModel();
  } 
  function clear() {
    console.log('clear input 22222');
    document.getElementById('nameLocation').value="";
    document.getElementById('priceLocation').value="";
    document.getElementById('titelLocation').value="0";
    document.getElementById('showLocation').value="";
    // document.getElementById('priceLocation').value="";
    document.getElementById('showLocation').checked= false;
  }
  function onchangeCitiecs() {
    console.log('onchangeCitiecs');
    var subTitelDiv=document.getElementById('subTitelLocation');
    subTitelDiv.innerHTML="";
    var titelLocation=document.getElementById('titelLocation').value;
    console.log(titelLocation.substring(0, titelLocation.indexOf('#')));
    if (document.getElementById('subTitel1').checked) {
          loctions.forEach(element => {
          if (Math.floor(element[24])==titelLocation.substring(0, titelLocation.indexOf('#'))) {
            subTitelDiv.innerHTML+= ' <option value="'+element[11]+'#'+element[1]+'">'+element[1]+'</option>';
          }
          
        });
      document.getElementById('subTitelLocationDiv').style.display = 'block';
      document.getElementById('subTitelLocation').disabled = false;

    }else{
      document.getElementById('subTitelLocationDiv').style.display = 'none';

      document.getElementById('subTitelLocation').disabled = true;
    }
  }
 
  
  </script>
@endsection