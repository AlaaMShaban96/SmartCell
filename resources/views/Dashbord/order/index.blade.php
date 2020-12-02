@extends('Dashbord/layout/master')
@section('style')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}

{{-- <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet"> --}}
<style>

</style>
    
@endsection
@section('content')

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
                    

                     data-product[3]="{{$order['المنتج 4']}}"
                    data-pisces[3]="{{$order['عدد قطع المنتج 4']}}"
                    data-price[3]="{{$order['سعر المنتج رقم 4']}}" 
                    

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
                    
                    class="btn btn-success" data-toggle="modal" data-target="#show-order">
                     عرض 
                    </button>
                    
                </div>
              </div>
            </div>
          @endforeach




      </div>
    </div>
    {{ $orders->links() }}




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
              </div>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="button" class="btn btn-primary">تعديل</button>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="{{asset('js/order.js')}}"></script>
@endsection