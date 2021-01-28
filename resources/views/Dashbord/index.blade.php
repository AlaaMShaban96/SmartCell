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
                                               
                                                @switch($order[42])
                                                    @case('تم التوصيل')

                                                    <span class="badge badge-success'">{{$order[42]}}</span>
                                                        @break
                                                    @case('قيد التوصيل')
                                                    
                                                     <span class="badge badge-warning">{{$order[42]}}</span>
                                                        @break
                                                    @case('تم الالغاء')
                                                    
                                                     <span class="badge badge-danger">{{$order[42]}}</span>
                                                        @break
                                                    @case('قيد الانتظار')
                                                    
                                                     <span class="badge badge-secondary">{{$order[42]}}</span>
                                                        @break
                                                    @case('استرجاع')
                                                    
                                                     <span class="badge badge-info">{{$order[42]}}</span>
                                                        @break
                                                    @case('استلام شخصي')
                                                    
                                                     <span class="badge badge-primary">{{$order[42]}}</span>
                                                        @break
                                                    @default
                                                        
                                                @endswitch
                                                
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
                            <span id="tname">  علاء محمد</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30.208" height="30.949" style="margin-left: 2%; margin-bottom: 2%;" viewBox="0 0 104.208 108.949">
                                <path id="icons8-person" d="M56.108,3A28.42,28.42,0,0,0,27.686,31.422v4.737a28.422,28.422,0,0,0,56.843,0V31.422A28.42,28.42,0,0,0,56.108,3ZM37.623,81.409C23.72,85.042,10.605,91.883,5.769,98.173a8.6,8.6,0,0,0,6.893,13.776H99.545a8.6,8.6,0,0,0,6.893-13.785C101.6,91.874,88.491,85.042,74.593,81.409a28.349,28.349,0,0,1-36.97,0Z" transform="translate(-4 -3)" fill="#48e6da"/>
                              </svg>
                        </li>
                        <li >
                                <span id="tprofilename"> AlaaMShaban </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30.208" height="30.949" style="margin-left: 2%; margin-bottom: 2%;" viewBox="0 0 145.279 116.223">
                                    <path id="icons8-identification_documents" d="M2,18.528v87.167a14.571,14.571,0,0,0,14.528,14.528H132.751a14.571,14.571,0,0,0,14.528-14.528V18.528A14.571,14.571,0,0,0,132.751,4H16.528A14.524,14.524,0,0,0,2,18.528ZM45.584,33.056A14.528,14.528,0,1,1,31.056,47.584,14.524,14.524,0,0,1,45.584,33.056ZM23.792,84.63c0-7.249,14.521-10.9,21.792-10.9s21.792,3.646,21.792,10.9v6.538H23.792Zm101.7-29.782H81.9V40.32h43.584Zm0,29.056H81.9V69.375h43.584Z" transform="translate(-2 -4)" fill="#48e6da"/>
                                  </svg>
                        </li>
                        <li >
                                <span id="tnumber"> 0927780208</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30.208" height="30.949" style="margin-left: 2%; margin-bottom: 2%;"viewBox="0 0 77.081 121.127">
                                    <path id="icons8-android" d="M71.069,1H16.012A11.009,11.009,0,0,0,5,12.012v99.1a11.009,11.009,0,0,0,11.012,11.012H71.069a11.009,11.009,0,0,0,11.012-11.012v-99.1A11.009,11.009,0,0,0,71.069,1ZM54.552,111.115H32.529V105.61H54.552ZM71.069,94.6H16.012V17.517H71.069Z" transform="translate(-5 -1)" fill="#48e6da"/>
                                  </svg>
                        </li>
                        <li >
                                <span id="tloction"> طرابلس ابوسليم</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30.208" height="30.949" style="margin-left: 2%; margin-bottom: 2%;" viewBox="0 0 89.019 133.529">
                                    <path id="icons8-marker" d="M53.51,1A44.568,44.568,0,0,0,9,45.51c0,39.261,40.7,86.085,42.423,88.063a2.76,2.76,0,0,0,2.086.956,2.864,2.864,0,0,0,2.086-.956c1.728-2.01,42.423-49.639,42.423-88.063A44.568,44.568,0,0,0,53.51,1Zm0,30.6A16.691,16.691,0,1,1,36.819,48.291,16.7,16.7,0,0,1,53.51,31.6Z" transform="translate(-9 -1)" fill="#48e6da"/>
                                  </svg>
                                  
                        </li>
                        <li >
                                <span id="tnote"> لايوجد ملاحظات</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30.208" height="30.949" style="margin-left: 2%; margin-bottom: 2%;"  viewBox="0 0 90.96 90.96">
                                    <path id="icons8-speaker_notes" d="M11.14,2a9.16,9.16,0,0,0-9.1,9.087L2,92.96,20.192,74.768H83.864a9.164,9.164,0,0,0,9.1-9.1V11.1a9.164,9.164,0,0,0-9.1-9.1Zm9.052,22.74h9.1v9.1h-9.1Zm18.192,0H74.768v9.1H38.384ZM20.192,42.932h9.1v9.1h-9.1Zm18.192,0H74.768v9.1H38.384Z" transform="translate(-2 -2)" fill="#48e6da"/>
                                  </svg>                        </li>
                        <li >
                                <span id="tdelivery"> لا احد</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30.208" height="30.949" style="margin-left: 2%; margin-bottom: 2%;" viewBox="0 0 121.874 89.087">
                                    <path id="Path_25" data-name="Path 25" d="M67.687,8.92,15.868,8.7a14.633,14.633,0,0,0-14.7,14.632c0,9.214-.005,19.36-.005,19.36V77.474a7.8,7.8,0,0,0,7.617,7.617H14.1a15.2,15.2,0,0,0,29.991,0H67.43a7.106,7.106,0,0,0,7.119-7.112V16.288A6.964,6.964,0,0,0,67.687,8.92Zm14.729,12.7a5.086,5.086,0,0,0-5.078,5.078v53.32a5.081,5.081,0,0,0,3.214,4.71,15.217,15.217,0,0,0,30.07.368h4.8a7.484,7.484,0,0,0,7.617-7.617V53.1c0-5.078-3.55-10.413-4.057-10.928l-5.85-7.866-4.822-6.348c-2.539-2.8-6.348-6.348-10.661-6.348Zm10.156,12.7h14.214l8.133,10.661c.764,1.27,3.044,5.078,3.044,7.876v1.775H92.572a5.461,5.461,0,0,1-5.078-5.078V39.389A5.262,5.262,0,0,1,92.572,34.311ZM29.1,72.4A10.156,10.156,0,1,1,18.94,82.552,10.189,10.189,0,0,1,29.1,72.4Zm66.52,0A10.156,10.156,0,1,1,85.46,82.552,10.189,10.189,0,0,1,95.616,72.4Z" transform="translate(-1.167 -8.699)" fill="#48e6da"/>
                                  </svg>
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
                    {{-- <div class="col-6 text-center" >
                        <div style="padding-left: 0px;margin-left: 25%;margin-right: 24%; border-width: 2px;background-color: aqua;border-radius: 20px;">
                        طباعة 
                        </div>
                    </div>           
                    
                    <div class="col-6 text-l" >
                        <div style="padding-left: 0px;margin-left: 25%;margin-right: 24%; border-width: 2px;background-color: aqua;border-radius: 20px;">
                        طباعة 
                        </div>
                    </div>   --}}
                        
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