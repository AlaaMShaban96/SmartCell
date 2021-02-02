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
    width: 40%;
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

</style>
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
        <div class="card">
            <div class="row" style="width: 100%;padding-top: 3%;">
                <div class=" col-l-3 col-s-12  d-flex justify-content-center pl-4 pr-4">
                    <div class="card ml-4 mr-4 pl-4 pr-4 d-flex justify-content-center" style="min-width: 130px; border-radius: 25px;">
                            <button  id="showAddUser"  class="btn btn-success fa fa-plus pt-3 d-flex justify-content-center mx-auto" style="border-radius: 8vh;width: 50px;height: 50px;"></button>
                    </div> 
                </div> 

                @foreach ($users as $key => $user)
                    <div class='  col-l-3 col-s-12  content-center'>
                        <div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'>
                            <div class='text-center'>
                                <img class='img-fluaid' src='https://cdn.iconscout.com/icon/free/png-512/laptop-user-1-1179329.png' style='width:12vh;'></img>
                            </div>
                            <p class='card-title  d-flex justify-content-center mt-2'> {{$user['name']}} </p>
                                <span class='w-100 flex-fill bd-highlight' style='display:flex;position: inherit;right: 18.5px;'>
                                <button onclick="deleteUser('{{$user['email']}}')" class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button>
                               
                                  <form style="display: none" id="delete{{$user['email']}}" action="{{url('/team/'.$user['email'])}}" method="post">
                                    @method('delete')
                                    @csrf
                                  {{-- <button  type="submit"></button> --}}
                                
                                  </form>
                                <button  onclick='EditUser({{$key}})' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button>
                            </span>
                        </div>
                    </div> 
                @endforeach
                
            </div>
        </div>
    
    </div>



<div id="addUser" class="modal">
  <!-- Modal content -->
    <div class="modal-content">
      <span class="closesModelCategory">&times;</span>
      <div class="row" style="padding-left: 10%;">
        <form id="userForm" action="{{url('/team')}}" dir="rtl" class="mx-auto" method="POST" enctype="multipart/form-data">
          @csrf
            {{-- <img class="img-fluid mb-5"  src="image2/12.jpg"style=" max-width: 200px;margin-left: 280px;" > --}}
            <div class="form-row" dir="rtl">
              <div class="form-group col-md-6">
                <label for="#" style="display: flex;">الاسم</label>
                <input type="text" name="name"  class="form-control" id="userName" required placeholder="أدخل إسم المستخدم">
              </div>
              <div class="form-group col-md-6">
                <label for="#" style="display: flex;">البريد الالكتروني</label>
                <input type="email" name="email" class="form-control" id="userEmail" required placeholder="أدخل البريد الالكتروني">
              </div>
              <div class="form-group col-md-6">
                <label for="#" style="display: flex;">رقم الهاتف</label>
                <input type="number" name="phoned" class="form-control" id="userPhoned" required placeholder="أدخل رقم الهاتف">
              </div>
            
                <div class="form-group col-md-6">
                <label>الصلاحيات</label>
                    <select name="rule" id="userRule">
                        <option value="Admin">مدير </option>
                        <option value="Editor">معدل بيانات </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <input type="file" id="myFile" name="image" >                    
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
    let clearFlag=0;
    function showModelUser() {
        // // Get the modal
        var addUser = document.getElementById("addUser");
        
        // Get the button that opens the modal
        var showAddUser = document.getElementById("showAddUser");
        
        // Get the <span> element that closes the modal
        var closesModelCategory = document.getElementsByClassName("closesModelCategory")[0];
        
        // When the user clicks the button, open the modal 
        showAddUser.onclick = function() {
            if (clearFlag == 1) {
                clearInput();
                clearFlag=0;
            }
            addUser.style.display = "block";
            
           

        }
        
        // When the user clicks on <span> (x), close the modal
        closesModelCategory.onclick = function() {
            addUser.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == addUser) {
            addUser.style.display = "none";
        }
        // clearInput();
        }
    }
    showModelUser();
  
    var users = @json($users,JSON_PRETTY_PRINT);

    function EditUser(id) {
      var hostName = window.location.origin;
      var user=users[id];
      
      // console.log('on function Edit Category and date on row = ', row[7]);
      document.getElementById('showAddUser').click(1);
      // showModelUser();
      document.getElementById('userName').value=user.name;
      document.getElementById('userEmail').value=user.email;
      document.getElementById('userEmail').disabled=true;
      document.getElementById('userPhoned').value=user.phoned;
      document.getElementById('userRule').value= user.role;
      document.getElementById('userForm').action= hostName+'/team/'+user.email;
      clearFlag=1;
    }
    function clearInput(){
      var hostName = window.location.origin;
      // document.getElementById('showAddUser').click();
      document.getElementById('userName').value="";
      document.getElementById('userEmail').value="";
      document.getElementById('userEmail').disabled=false;
      document.getElementById('userPhoned').value="";
      document.getElementById('userRule').value= "";
      document.getElementById('userForm').action= hostName+'/team/';
    }
    function deleteUser(email) {
      console.log(email);
            document.getElementById('delete'+email).submit();

    }
</script>
@endsection