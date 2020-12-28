@extends('Dashbord/layout/master')
@section('style')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}

{{-- <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet"> --}}
<!-- CSS only -->

<style>

</style>
    
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
    
      {{-- <div class="row"> --}}
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                  <div class="card-header card-header-warning">
                    <h4 class="card-title">المنتجات</h4>
                    <p class="card-category"> تاريخ الفاتورة :{{ $order['تاريخ الانشاء']}} </p>
                  </div>
                  <div class="card-body table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                        <tr>
                            <th >رقم</th>
                            <th >المنتج</th>
                            <th >القطع</th>
                            <th >السعر</th>
                          </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <=10; $i++)
                            @if ($order['المنتج '.$i.''] != "")
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$order['المنتج '.$i.'']}}</td>
                                <td>{{$order['عدد قطع المنتج '.$i.'']}}</td>
                                <td>{{$order['سعر المنتج '.$i.'']}} دينار</td>
                            
                            </tr>
                            @endif
                        
                            @endfor
            
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            <div class="col-lg-6 col-md-12">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img src="{{asset('image/dashbord/logo/logo.jpg')}}" alt="" srcset="">
                </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">{{$order['المدينة']}} / {{$order['المنطقة']}}</h6>
                  <h4 class="card-title">{{$order['الاسم']}}</h4>
                  <p class="card-description">


                    <div class="card">
                        <div class="card-header card-header-info">
                          <h3 class="card-title">تفاصيل</h3>
                          <p class="card-category">
                            <h4>حالة الطلب : {{$order['حالة الطلبية']}}</h4>
                            <h4>اسم المندوب :   {{$order['المندوب']}} </h4>
                            {{-- ایجاد شده توسط دوست ما
                            <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. لطفا
                            <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">مستندات کامل </a> را مشاهده بکنید.
                           --}}
                          </p>
                          
                            {{-- <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="حذف">
                              <i class="material-icons">close</i>
                            </button> --}}
                        </div>
                        {{-- <div class="card-body">
                          <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="material-icons">close</i>
                            </button>
                            <span>
                              این یک اعلان است که با کلاس "alert-warning" ایجاد شده است.</span>
                          </div>
                          <div class="alert alert-primary">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="material-icons">close</i>
                            </button>
                            <span>
                              این یک اعلان است که با کلاس "alert-primary" ایجاد شده است.</span>
                          </div>
                          <div class="alert alert-info alert-with-icon" data-notify="container">
                            <i class="material-icons" data-notify="icon">add_alert</i>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="material-icons">close</i>
                            </button>
                            <span data-notify="پیام">این یک اعلان با دکمه بستن و آیکن است</span>
                          </div>
                        </div> --}}
                      </div>
                </p>
                  <a href="#pablo" class="btn btn-primary btn-round"
                  data-toggle="modal" data-target="#show-order">تعديل</a>
                

                 
                </div>
              </div>
            </div>
          </div>
        {{-- <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Profile</h4>
              <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Company (disabled)</label>
                      <input type="text" class="form-control" disabled="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Username</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Email address</label>
                      <input type="email" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Fist Name</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Last Name</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Adress</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">City</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Country</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Postal Code</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>About Me</label>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                        <textarea class="form-control" rows="5"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div> --}}
        {{-- <div class="col-md-4">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="javascript:;">
                <img class="img" src="../assets/img/faces/marc.jpg">
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">CEO / Co-Founder</h6>
              <h4 class="card-title">Alec Thompson</h4>
              <p class="card-description">
                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
              </p>
              <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
            </div>
          </div>
        </div> --}}
      {{-- </div> --}}
    </div>
  </div>

 



  <!-- Modal -->
  <div class="modal fade" id="show-order" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="show-order" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="show-order">تعديل تفاصيل الفاتورة </h5>
        
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <form action='{{url("/order/".$order['رقم الطلبية'])}}' method="post" >
              @csrf
              @method('PUT')
              <input type="hidden" name="state" value="{{$order['حالة الطلبية']}}">
              <div class="row">
                <div class="col">
                  {{-- @if ($order['حالة الطلبية']=='تم التوصيل'){{ 'selected="selected"' }}@endif --}}
                  <div class="col-auto my-1">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">حالة الطلب</label>
                    <select name="orderStatus"  onchange="select(this)" id="orderStatus"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option data-value='تم التوصيل' value="تم التوصيل" >تم التوصيل</option>
                    <option data-value='استرجاع'  value="استرجاع"  >استرجاع</option>
                    <option data-value='تم الالغاء'  value="تم الالغاء" >تم الالغاء</option>
                    <option data-value='قيد التوصيل'  value="قيد التوصيل" >قيد التوصيل</option>
                    <option data-value='استلام شخصي' value="استلام شخصي" >استلام شخصي</option>
                  </select>
                </div>
                </div>
                <div class="col">

                  <div class="col-auto my-1">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">تحويل الي</label>
                    <select name="userEmail" id="userEmail" disabled="" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                      <option value="1" selected></option>

                      @forelse ( Session::get('store_users') as $user)

                    <option value="{{$user}}" @php $user==$order['ايميل المندوب']?'selected':'' @endphp>{{$user}}</option>

                    @empty
                   
                    @endforelse
                   
                  </select>
                </div>
              </div>
              </div>

             
              



            
            {{-- <div class="row">
              
              <div class="col">
               
              </div>
             
            
            </div> --}}
         
          </div>
          
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button> --}}
          
          <button type="submit" class="btn btn-success">حفظ</button>

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
  function select(sel) {
  var opt = sel.options[sel.selectedIndex];
  var value = opt.dataset.value

  if (value=='قيد التوصيل') {
    console.log(value ,'true');

    document.getElementById("userEmail").disabled = false;
  }else{
    console.log(value ,'false');
    $('#userEmail').prop('selectedIndex', 0);
        document.getElementById("userEmail").disabled = true;

  }
  // console.log(value);
}
</script>
@endsection