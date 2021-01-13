@extends('Dashbord/layout/master')
@section('style')
<style>
  #modal-content{
      width: 30%;
  }
  @media only screen and (max-width: 600px) {

      #modal-content{
      width: 90%;
  }
 }
 .buttonEdit{
    padding-left: 0px;
    margin-left: 25%;
    margin-right: 24%;
    border-width: 2px;
    /* background-color: aqua; */
    border-radius: 20px;
    width: 90%;
    margin-bottom: 20px;
    margin-left: 5%;

 }
</style>
    
@endsection
@section('content')

 @if ($errors->any())
@foreach ($errors->all() as $error)
 <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
      <i class="feather icon-info mr-1 align-middle"></i>
      <span>{{ $error }}</span>
  </div>
@endforeach
@endif

    @if(Session::has('message'))
    <div class="alert {{ Session::get('alert-class') }} text-center">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">x</i>
      </button>
      <p class="h4" >{{ Session::get('message') }}</p> 
    </div>
    @endif
{{--
    <div class="container-fluid " >
    

      <div class="row">
        @foreach ($orders as $order)
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    {{$order['الاسم']}}
                  </div>
                  <p class="card-category">اجمالي الفتورة   {{$order['رقم الطلبية']}}</p>
                  <h3 class="card-title">{{$order['اجمالي سعر الطلبية']}}
                    <small>دينار</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <button type="button" 
                    data-name="{{$order['الاسم']}}"
                    data-profile="{{$order['بروفايل']}}"
                    data-mobile="{{$order['رقم الهاتف']}}"
                    data-loction="{{$order['المنطقة']}}"
                    data-note="{{$order['ملاحظة الزبون']}}"
                    data-delevre="{{$order['المندوب']}}"
                    data-text="{{$order['ملاحظة المندوب / الادمن']}}"

                    data-product[0]="{{$order['المنتج 1']}}"
                    data-pisces[0]="{{$order['عدد قطع المنتج 1']}}"
                    data-price[0]="{{$order['سعر المنتج 1']}}"
                    

                    data-product[1]="{{$order['المنتج 2']}}"
                    data-pisces[1]="{{$order['عدد قطع المنتج 2']}}"
                    data-price[1]="{{$order['سعر المنتج 2']}}"
                    

                    data-product[2]="{{$order['المنتج 3']}}"
                    data-pisces[2]="{{$order['عدد قطع المنتج 3']}}"
                    data-price[2]="{{$order['سعر المنتج 3']}}"
                    

                    

                    data-product[4]="{{$order['المنتج 5']}}"
                    data-pisces[4]="{{$order['عدد قطع المنتج 5']}}"
                    data-price[4]="{{$order['سعر المنتج 5']}}"
                    

                    data-product[5]="{{$order['المنتج 5']}}"
                    data-pisces[5]="{{$order['عدد قطع المنتج 5']}}"
                    data-price[5]="{{$order['سعر المنتج 5']}}"
                    

                    data-product[6]="{{$order['المنتج 7']}}"
                    data-pisces[6]="{{$order['عدد قطع المنتج 7']}}"
                    data-price[6]="{{$order['سعر المنتج 7']}}"
                    

                    data-product[7]="{{$order['المنتج 8']}}"
                    data-pisces[7]="{{$order['عدد قطع المنتج 8']}}"
                    data-price[7]="{{$order['سعر المنتج 8']}}"
                    

                    data-product[8]="{{$order['المنتج 9']}}"
                    data-pisces[8]="{{$order['عدد قطع المنتج 9']}}"
                    data-price[8]="{{$order['سعر المنتج 9']}}"
                    

                    data-product[9]="{{$order['المنتج 10']}}"
                    data-pisces[9]="{{$order['عدد قطع المنتج 10']}}"
                    data-price[9]="{{$order['سعر المنتج 10']}}"
                    data-price[9]="{{$order['سعر المنتج 10']}}"
                    data-bill="{{$order['اجمالي سعر الطلبية']}}"
                    data-delivery="{{$order['سعر التوصيل']}}"
                    data-total="{{$order['اجمالي الفتورة']}}"
                    data-number="{{$order['رقم الطلبية']}}"
                    
                    class="btn btn-success" data-toggle="modal" data-target="#show-order">
                     عرض 
                    </button>
                    
                </div>
              </div>
            </div>
          @endforeach




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
            <h5 class="modal-title" id="show-order">بيانات الفاتورة</h5>
          
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                
                <div class="col">
                  <table>
                    <tr style="text-align: right; ">
                      <td>
                        <img src="{{asset('image/dashbord/logo/logo.jpg')}}" alt="" srcset="">
                      </td>
                    </tr>
                    <tr id="profile-show" style="display: none;">
                      <td >
                        <icons-image _ngcontent-hys-c22=""
                        _nghost-hys-c19="">
                        <span _ngcontent-hys-c19=""
                          class="material-icons icon-image-preview">account_circle</span>
                        </icons-image>
            
                      </td>
                      <td><span id="profile"></span></td>
                    </tr>
                    <tr id="mobile-show" style="display: none;">
                      <td>
                        <span _ngcontent-xwx-c19="" class="material-icons icon-image-preview">settings_phone</span>  
                      </td>
                      <td><span id="mobile"></span></td>
                    </tr>
                    <tr id="loction-show" style="display: none;">
                      <td>
                        <span _ngcontent-xwx-c19="" class="material-icons icon-image-preview">location_on</span>
                      </td>
                      <td><span id="loction"></span></td>
                    </tr>
                    <tr id="note-show" style="display: none;">
                      <td>
                        <span _ngcontent-xwx-c19="" class="material-icons icon-image-preview">insert_comment</span> 
                      </td>
                      <td><span id="note"></span></td>
                    </tr>
                    <tr id="delevre-show" style="display: none;">
                      <td>
                        <icons-image _ngcontent-xwx-c22="" _nghost-xwx-c19=""><span _ngcontent-xwx-c19="" class="material-icons icon-image-preview">directions_car</span></icons-image>
                      </td>
                      <td><span id="delevre"></span></td>
                    </tr>
                    <tr id="text-show" style="display: none;">
                      <td>
                        <span _ngcontent-xwx-c19="" class="material-icons icon-image-preview">text_snippet</span>
                      <td><span id="text"></span></td>
                    </tr>
            
                  </table>
                </div>
               
              
              </div>
              <div class="row">
                <table class="table table-bordered"  style="text-align: right;" >
                      <tr>
                        <td scope="col"> المنتج </td>
                        <td scope="col"> القطع </td>
                        <td scope="col"> السعر </td>
                      </tr>
                      <tbody id="table">

                      </tbody>
                </table>
              </div>
              <div class="row">
                <h3>المجموع :  <span class="badge badge-success" id="bill">New</span></h3>
              </div>
              <div class="row">
                <h3> سعر التوصيل : <span class="badge badge-secondary" id="delivery"></span></h3>

              </div>
            </div>
            
          </div>
          <div class="modal-footer">
            
            <a id="link-edit" href="" class="btn btn-primary">تعديل</a>

            <a id="link-print" href="" class="btn btn-info">طباعة</a>
          </div>
        </div>
      </div>
    </div> --}}



    <div class="content">
      <!-- Animated -->
      <div class="animated fadeIn">
          <!-- Widgets  -->
          <div class="row">
  
  
  
              @foreach ($orderState as $order)
                  <div class="col-lg-3 col-md-6">
                      <div class="card">
                          <div class="card-body">
                              <a href="#" onclick="showOrderStatus('{{$order['name']}}')">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <img style="width: 50%;" src="{{asset($order["icon"])}}">
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib" >
                                            <div class="stat-text"><span class="count">{{$order['count']}}</span></div>
                                            <div class="stat-heading">{{$order['name']}}</div>
                                        </div>
                                    </div>
                                </div>
                              </a>
                          </div>
                      </div>
                  </div>
              @endforeach
      
          </div>
          <!-- /Widgets -->
          <!--  Traffic  -->
          <div class="row">
              <div class="col-lg-12">  
              </div><!-- /# column -->
          </div>
          <!--  /Traffic -->
          <div class="clearfix"></div>
          <!-- Orders -->
          <div class="orders">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="card">
                          <div class="card-body">
                              <h4 class="box-title">طلبيات   </h4>
                          </div>
                          <div class="card-body--">
                              <div class="table-stats order-table ov-h">
                                  <table class="table ">
                                      <thead>
                                          <tr>
                                              <th class="serial">رقم الفاتورة</th>
                                              <th>اجمالي سعر الطلبية</th>
                                              <th>الحالة</th>
                                              <th>بواسطة</th>
                                              <th></th>
                                          </tr>
                                      </thead>
                                      <tbody id="tbodyOrders">
                                       
                                      </tbody>
                                  </table>
                              </div> <!-- /.table-stats -->
                          </div>
                      </div> <!-- /.card -->
                  </div>  <!-- /.col-lg-8 -->
  
                  
  
          
      <!-- /#add-category -->
                  </div>
      <!-- .animated -->
          </div>
      <!-- .animated -->
      </div>
  </div>
  <div class="header-left">
      <div id="myModal2" class="modal">
          <div class="modal-content" id="modal-content" >
              {{-- <span class="close">&times;</span> --}}
              <div class="row">
  
                  <div class="col-12 text-center" style="border-bottom-width: 1px;border-bottom-style: solid;padding-bottom: 2%;">
                      <span id="orderStatus"> قيد التوصيل</span>
                  </div>
                  <div class="col-12 text-center" style="padding: 2%;">
                      <span id="orderDate"> 10-9-2020</span>
                      
                  </div>
                  <div class="col-12 text-center" >
                      <div style="border: dashed;padding-left: 0px;margin-left: 37%;margin-right: 37%; border-width: 2px;">
                          
                          # <span id="orderId"> 10</span>
                      </div>
                  </div>
                  
                  <div class="col-12 text-right">
                      <ul style="list-style: none;margin-right: 2%;">
                          <li >
                                  <span id="tname"> علاء محمد</span>
                  
                          </li>
                          <li >
                                  <span id="tprofilename"> AlaaMShaban </span>
                          </li>
                          <li >
                                  <span id="tnumber"> 0927780208</span>
                          </li>
                          <li >
                                  <span id="tloction"> طرابلس ابوسليم</span>
                          </li>
                          <li >
                                  <span id="tnote"> لايوجد ملاحظات</span>
                          </li>
                          <li >
                                  <span id="tdelivery"> لا احد</span>
                          </li>
                      </ul>
                  </div>
                  <div class="col-12 text-center" >
                      <table class="table">
                          <thead class="table-dark">
                              <td>السعر</td>
                              <td>العدد</td>
                              <td>المنتج</td>
                          </thead>
                          <tbody id="tbody">
                              <tr>
                                  <td>( ‫الاسود‬ ‫اللون130 LYD ) ‫ايفون‬ ‫ساعة‬</td>
                                  <td>1</td>
                                  <td>300</td>
                              </tr>
                              <tr>
                                  <td>( ‫الاسود‬ ‫اللون130 LYD ) ‫ايفون‬ ‫ساعة‬</td>
                                  <td>1</td>
                                  <td>300</td>
                              </tr>
                              <tr>
                                  <td>( ‫الاسود‬ ‫اللون130 LYD ) ‫ايفون‬ ‫ساعة‬</td>
                                  <td>1</td>
                                  <td>300</td>
                              </tr>
                              
                          </tbody>
                          </table>
                          
                  </div> 
                  <div class="col-12 text-center mb-5" >
                      <div style="padding-left: 0px;margin-left: 25%;margin-right: 24%; border-width: 2px;text-decoration-style: inherit; font-weight: bold;font-size: 21px;">
                          
                          المجموع  <span id="orderTotal">50 </span> دل 
                      </div>
                  </div>  
                      <div class="col-4 text-center " >
                        <a id="printId1" href="{{url('/status/"حنوصلها"')}}">
                          <div class="buttonEdit badge-primary">
                          حنوصلها 
                          </div>
                        </a>
                      </div>           
                      <div class="col-4 text-center " >
                        <a id="printId2" href="{{url('/status/"تم التوصيل"')}}">
                          <div class="buttonEdit badge-success">
                          تم التوصيل 
                          </div>
                        </a>
                      </div>           
                      <div class="col-4 text-center  " >
                        <a id="printId3" href="{{url('/status/"الغاء"')}}">
                          <div class="buttonEdit badge-danger" >
                          الغاء 
                          </div>
                        </a>
                      </div>           
                      <div class="col-4 text-center " >
                        <a id="printId4" href="{{url('/status/"استرجاع"')}}">
                          <div class="buttonEdit badge-warning">
                          استرجاع 
                          </div>
                        </a>
                      </div>           
                      <div class="col-4 text-center " >
                        <a id="printId5" href="{{url('/status/"استلام شخصي"')}}">
                          <div class="buttonEdit badge-secondary">
                          استلام شخصي 
                          </div>
                        </a>
                      </div>           
                      <div class="col-4 text-center " >
                        {{-- <a id="printId6" href="{{url('/status/"الي المندوبين"')}}"> --}}
                          <div onclick="setFormUrl()" class="buttonEdit badge-info" data-toggle="collapse" data-target="#demo">
                            تحويل الي
                          </div>
                        {{-- </a> --}}
                      </div>           
                      <div class="col-12 text-center " >
                        <div id="demo" class="collapse"  >
                            <form id="formSendToUser" action="" method="post">
                                @csrf
                                <select name="email" id="">  
                                 @foreach (Session::get('store_users') as $user)
                                     <option value="{{$user}}">{{$user}}</option>
                                 @endforeach
                                </select>
                                <button type="submit" type="button" class="btn btn-success">ارسال</button>
                            </form>
                        </div>  
                      </div>  
                          
              </div>
          </div>
      </div>
  </div>
 
@endsection
@section('script')
<script src="{{asset('assets/js/date.js')}}"></script>
<script>
  var app = @json($orders,JSON_PRETTY_PRINT);


  function showOredr(id) {
      var modal = document.getElementById("myModal2");
      
      // Get the button that opens the modal
      var btn = document.getElementById("myBtn"+id);
      
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[3];
      
      // When the user clicks the button, open the modal 
      btn.onclick = function() {

        modal.style.display = "block";

      }

      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      } 
      order(id);
  }
  function order(id) {
    var hostName = window.location.origin;
      var row=[];
      app.forEach(element => {
       if (element[47]==id) {
          return row= element;  
       }    
      
      });
      document.getElementById('printId1').href =hostName+'/order/"قيد التوصيل"/'+id;
      document.getElementById('printId2').href =hostName+'/order/"تم التوصيل"/'+id;
      document.getElementById('printId3').href =hostName+'/order/"تم الالغاء"/'+id;
      document.getElementById('printId4').href =hostName+'/order/"استرجاع"/'+id;
      document.getElementById('printId5').href =hostName+'/order/"استلام شخصي"/'+id;
      document.getElementById('tname').innerHTML=row[0];
      document.getElementById('tprofilename').innerHTML=row[1];
      document.getElementById('tnumber').innerHTML=row[2];
      document.getElementById('tloction').innerHTML=row[33]+','+row[34];
      document.getElementById('tnote').innerHTML=row[35];
      document.getElementById('tdelivery').innerHTML=row[39];
      document.getElementById('orderDate').innerHTML=dateFormat(row[40], "dd-m-yy")
      document.getElementById('orderId').innerHTML=row[47];
      document.getElementById('orderStatus').innerHTML=row[42];
      document.getElementById('orderTotal').innerHTML=row[36];
      document.getElementById('tbody').innerHTML="";
 
      var tbody= document.getElementById('tbody');
      for (let index = 3 ; index <= 30; index=index+3 ) {
          if (row[index] != "") {
              var tr=document.createElement('tr');

              var prodact=document.createElement('td');
              var  txtprodact=document.createTextNode(""+row[index]);
              prodact.append(txtprodact);
              var price=document.createElement('td');
              var  txtprice=document.createTextNode(""+row[index+1]);
              price.append(txtprice);
              var count=document.createElement('td');
              var  txtcount=document.createTextNode(""+row[index+2]);
              count.append(txtcount);
              tr.append(price);
              tr.append(count);
              tr.append(prodact);
              tbody.append(tr);
          }
          
      }


  }
  function showOrderStatus(status) {

    document.getElementById('tbodyOrders').innerHTML="";
    var tbodyOrders= document.getElementById('tbodyOrders');
    var state= status;
     app.forEach(element => {
        if (element[42] == state) {
              var tr=document.createElement('tr');

              var id=document.createElement('td');
              var  txtId=document.createTextNode(""+element[47]);
              id.append(txtId);
              var totle=document.createElement('td');
              var  txtTotle=document.createTextNode(""+element[36]);
              totle.append(txtTotle);
              var status=document.createElement('td');
              var  txtStatus=document.createTextNode(""+element[42]);
              status.append(txtStatus);
              var delivry=document.createElement('td');
              var  txtdelivry=document.createTextNode(""+element[39]);
              delivry.append(txtdelivry);
            
              var model=document.createElement('td');
              var show=document.createElement('button');
              var  txtshow=document.createTextNode("عرض");
              show.addEventListener("click", function() { 
                showOredr(element[47]);
                }); 
              show.setAttribute('id','myBtn'+element[47]);
              show.setAttribute('style','border: none; background-color: white;color: #10858b;');
              show.append(txtshow);
              model.append(show);
            
              tr.append(id);
              tr.append(totle);
              tr.append(status);
              tr.append(delivry);
              tr.append(model);
              tbodyOrders.append(tr);
              
          }
      });
      
    
  }
  function setFormUrl() {
    var hostName = window.location.origin;
    var form = document.getElementById('formSendToUser');
    var id = document.getElementById('orderId').innerText;
    form.action=hostName+'/order/send-to-user/'+id;
  }

</script>
@endsection