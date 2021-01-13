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
    </style>
@endsection

@section('content')
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">



            @foreach ($orderState as $order)
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
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
                            <h4 class="box-title">طلبيات اليوم  </h4>
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
                                    <tbody>
                                        @foreach ($todayOrder as $key => $order)

                                        <tr>
                                            <td class="serial">{{$order[47]}}</td>
                                            <td>  <span class="name">{{$order[36]}}</span> </td>
                                            <td>
                                                <span class="badge badge-{{$order[42]=='تم التوصيل' ? 'complete':'pending'}}">{{$order[42]}}</span>
                                            </td>
                                            <td><span class="actionby">{{$order[39]}}</span></td>
                                            <td>
                                                {{-- <a href="#">مشاهدة</a> --}}
                                                {{-- <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    مشاهدة
                                                    </button> --}}
                                                    <button id="myBtn{{$key}}" onclick="showOredr({{$key}},'{{$order[47]}}')"  style="border: none; background-color: white;color: #10858b;">مشاهدة</button>
                                        
                                                    
                                                
                                            </td>

                                        </tr>

                                        @endforeach
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
                <div class="col-12 text-center" >
                    <div style="padding-left: 0px;margin-left: 25%;margin-right: 24%; border-width: 2px;background-color: aqua;border-radius: 20px;">
                        
                        المجموع الكلي :<span id="orderTotal">50 </span> دل 
                    </div>
                </div>  
                    <div class="col-6 text-center" >
                        <div style="padding-left: 0px;margin-left: 25%;margin-right: 24%; border-width: 2px;background-color: aqua;border-radius: 20px;">
                        طباعة 
                        </div>
                    </div>           
                    
                    <div class="col-6 text-l" >
                        <div style="padding-left: 0px;margin-left: 25%;margin-right: 24%; border-width: 2px;background-color: aqua;border-radius: 20px;">
                        طباعة 
                        </div>
                    </div>  
                        
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> --}}

<script src="{{asset('assets/js/date.js')}}"></script>
<script>
    var app = @json($todayOrder,JSON_PRETTY_PRINT);
    function showOredr(key,id) {

        console.log(id);

        var modal = document.getElementById("myModal2");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn"+key);
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[3];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        // span.onclick = function() {
        //   modal.style.display = "none";
        // }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        } 
        order(id);
    }
    function order(id) {
        var row=[];
        app.forEach(element => {
         if (element[47]==id) {

            return row= element;
             
         }    
        
        });

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
                var  txtprodact=document.createTextNode(""+row[index])
                prodact.append(txtprodact);
                var price=document.createElement('td');
                var  txtprice=document.createTextNode(""+row[index+1])
                price.append(txtprice);
                var count=document.createElement('td');
                var  txtcount=document.createTextNode(""+row[index+2])
                count.append(txtcount);
                tr.append(price);
                tr.append(count);
                tr.append(prodact);
                tbody.append(tr);
            }
            
        }

  
    }

</script>
@endsection