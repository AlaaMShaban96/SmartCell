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
            <form action="" method="post">
                <table class="table text-right" dir="rtl" >
                 
                    <tbody>
                      <tr> 
                        <td>‫الترحيبية‬ ‫الرسالة‬</td>
                        <td><input type="text" name="" id=""></td>
                        <td>‫موافقته‬ ‫بعد‬ ‫الا‬ ‫للمندوبين‬ ‫نقلها‬ ‫يتم‬ ‫ولا‬ ‫اولا‬ ‫للادمن‬ ‫تصل‬ ‫الطلبيات‬ ‫جعل‬</td>

                      </tr>
                      <tr>
                        <td>‫التوصيل‬ ‫بيانات‬</td>
                        <td><input type="text" name="" id=""></td>
                        <td>‫موافقته‬ ‫بعد‬ ‫الا‬ ‫للمندوبين‬ ‫نقلها‬ ‫يتم‬ ‫ولا‬ ‫اولا‬ ‫للادمن‬ ‫تصل‬ ‫الطلبيات‬ ‫جعل‬</td>

                      </tr>
                      <tr>
                        <td>‫الموقع‬ ‫مكان‬ ‫عن‬ ‫تفاصيل‬</td>
                        <td ><input type="text" name="" id=""></td>
                        <td >‫موافقته‬ ‫بعد‬ ‫الا‬ ‫للمندوبين‬ ‫نقلها‬ ‫يتم‬ ‫ولا‬ ‫اولا‬ ‫للادمن‬ ‫تصل‬ ‫الطلبيات‬ ‫جعل‬</td>
                      </tr>
                      <tr>
                        <td>‫غوغل‬ ‫خريطة‬ ‫رابط‬</td>
                        <td ><input type="text" name="" id=""></td>
                        <td >‫موافقته‬ ‫بعد‬ ‫الا‬ ‫للمندوبين‬ ‫نقلها‬ ‫يتم‬ ‫ولا‬ ‫اولا‬ ‫للادمن‬ ‫تصل‬ ‫الطلبيات‬ ‫جعل‬</td>
                      </tr>
                    </tbody>
                </table>
               
                <div class="row" dir="rtl">
                    <div class='  col-l-3 col-s-12  content-center'>
                        <div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'>
                            <p class='card-title  d-flex justify-content-center mt-2'>‫ ‫موافقة‬ الادمن‬ </p>
                            <label class="form-switch">
                                <input name="show" id="locationShow" type="checkbox"><i></i>
                            </label>
                            
                        </div>
                      </div> 
                      <div class='  col-l-3 col-s-12  content-center'>
                        <div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'>
                            <p class='card-title  d-flex justify-content-center mt-2'>‫‫ ‫ايقاف‬ ‬النظام‬ </p>
                            <label class="form-switch">
                                <input name="show" id="locationShow" type="checkbox"><i></i>
                            </label>
                        </div>
                      </div> 
                      <div class='  col-l-3 col-s-12  content-center'>
                        <div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'>
                            <p class='card-title  d-flex justify-content-center mt-2'>‫‫‫ ‫توفر‬‬ ‬التوصيل‬ </p>
                            <label class="form-switch">
                                <input name="show" id="locationShow" type="checkbox"><i></i>
                            </label>
                            
                        </div>
                      </div> 
                      <div class='  col-l-3 col-s-12  content-center'>
                        <div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'>
                            <p class='card-title  d-flex justify-content-center mt-2'> ‫ ‫استلام ‬شخصي‬ </p>
                            <label class="form-switch">
                                <input name="show" id="locationShow" type="checkbox"><i></i>
                            </label>
                        </div>
                      </div> 
                </div>
                <div class="row" dir="rtl">
                    <button  type="submit" class="btn btn-success">Success</button>

                </div>
               
            </form>      
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
            {{-- <img class="img-fluid mb-5"  src="image2/12.jpg"style=" max-width: 200px;margin-left: 280px;" > --}}
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




@endsection
@section('script')

<script>
</script>

@endsection