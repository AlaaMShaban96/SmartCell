@extends('Dashbord/layout/master')
@section('style')
<style>
    .img-icons{
        width: 100%;
        height: 200px;
        border-radius: 6px;
    }
    .img-icons-show{
        width: 100%;
        height: 300px;
        border-radius: 6px;
    }

    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }

    .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
    }

    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: red;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

   input:checked + .slider {
    background-color:green;
    }

     input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }

 
</style>
    
@endsection
@section('content')


 {{-- <div class="sidebar" data-color="purple" data-background-color="white">
   
    <div class="sidebar-wrapper"> 
      <ul class="nav">

        @foreach ($items as $key=>$value)
        @if ($key!=0)
          @if ($value[3]!="")
              <li class="nav-item active  ">
                <a class="nav-link" href="{{url('/')}}">
                  <i class="material-icons">dashboard</i>
                  <p>{{$value[1]}}</p>
                </a>
              </li>
          @endif
  
        @endif
        @endforeach

        <!-- your sidebar here -->
      </ul>
    </div>
  </div>
<div class="content"> --}}
  <div class="container">
    <div class="row">
        <div class="col-12 col-sm-3 ">
            <div class="card bg-light mb-3 text-right">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> الاصناف الاساسية</div>
                <ul class="list-group ">
                  @foreach ($items as $key=>$value)
                    @if ($key!=0)
                      @if ($value[3]!="" && $value[0]=="" )
                      <li class="">
                        <div class="dropdown">

                          <a class="btn btn-secondary  dropdown-toggle" onclick="show({{$key}})" data-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
                            {{$value[1]}}
                          </a>
                          {{-- <div class="collapse ml-5" id="collapse{{$key}}">
                            <div class="card card-body" style="width: 224px;margin-right: -26px;">
                              <a href="#" onclick="x()">{{$value[1]}}</a>
                              @foreach ($items as $item)
                                @if ($value[1]==$item[0])
                                  <a href="#">{{$item[1]}}</a>
                                  <br>
                                  <br>

                                @endif
                              @endforeach
                         
                          </div> --}}
                        </div>
                      
                      </li>
                      @endif
                                      
                    @endif
                  @endforeach

                </ul>
            </div>
            {{-- <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Last product</div>
                <div class="card-body">
                    <img class="img-fluid" src="https://dummyimage.com/600x400/55595c/fff">
                    <h5 class="card-title">Product title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="bloc_left_price">99.00 $</p>
                </div>
            </div> --}}
        </div>
            

        <div class="col">
          <div>
            <ol class="breadcrumb" id="breadcrumb-links">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
          <div id="subCategory" style="background-color: green;">
            
          </div>

            <div class="row" id="items" style="background-color: red;">
        
              {{-- @foreach ($items as $key=>$value)
              @if ($key!=0)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="{{$value[6]}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product">{{$value[1]}}</a></h4>
                            <p class="card-text">{{$value[4]}}</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">{{$value[2]}} د ل</p>
                                </div>
                                <div class="col">
                                  <button data-toggle="modal"  class="btn btn-primary" data-target="#show-order"
                                  data-item[0]="{{$value[0]}}"
                                  data-item[1]="{{$value[1]}}"
                                  data-item[2]="{{$value[2]}}"
                                  data-item[3]="{{$value[3]}}"
                                  data-item[4]="{{$value[4]}}"
                                  data-item[5]="{{$value[5]}}"
                                  data-item[6]="{{$value[6]}}"
                                  data-item[7]="{{$value[7]}}"
                                  data-item[8]="{{$value[8]}}"
                                  data-item[9]="{{$value[9]}}"
                                  > تعديل</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                      
              @endif
            @endforeach --}}
            </div>
        </div>

    </div>
</div>

 

      {{-- <button data-toggle="modal"  class="btn btn-primary" data-target="#show-order"></button> --}}

   
 

    

    <div class="container-fluid">
      <div class="row">

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
          <h5 class="modal-title" > تعديل بيانات المنتج</h5>
        
        </div>
        <form action="" id="form" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                  <div class="card card-chart">
                      <div class="card-header card-header-success">
                          <img class="img-icons-show" id="img" src='{{asset('image/dashbord/logo/logo.jpg')}}' alt="" srcset="">
                      </div>
                      <div class="card-body text-right">
                        <p class="card-category">
                          
                              {{-- <span id="card-detals">

                              </span> --}}
                              </p>
                              <div class="row">
                                  <div class="col">  
                                      <h5> سعر المنتج</h5>
                                </div>
                                  <div class="col">  
                                      <input type="number" class="card-title" name="price" id="card-price">
                                  
                                </div>
                            </div>
                              <div class="row">
                                  <div class="col">  
                                      <h5> تصنيف المنتج</h5>
                                </div>
                                  <div class="col">  
                                      <input type="text" class="card-title" name="titel" id="card-title">
                                  
                                </div>
                            </div>
                            
                                
                              <div class="row">
                                  <div class="col">  
                                      <span><h5> عرض المنتج</h5></span>
                                  </div>
                                  <div class="col">  
                                  <label class="switch" style="display: block;">

                                      <input type="checkbox" name="show" id="checkbox" checked>
                                      <span class="slider round" >  </span>
                                      </label>
                                  </div>
                          </div>
                          <div class="row">
                              <div class="col">  
                                  <h5> كلمات المفتاحية</h5>
                            </div>
                              <div class="col">  
                                  <input type="text" class="card-title" name="keyWords" id="card-key-words">
                              
                            </div>
                        </div>
                          <div class="row">
                              <div class="col">  
                                  <h5> وصف المنتج</h5>
                            </div>
                              <div class="col">  
                                  <textarea  class="card-title" name="detals" id="card-detals" cols="20" rows="3"></textarea>
                              
                            </div>
                        </div>
                          <div class="row">
                              <div class="col">  
                                  <h5> تفاصيل</h5>
                            </div>
                              <div class="col">  
                                  <textarea  class="card-title" name="info" id="card-info" cols="20" rows="3"></textarea>
                              
                            </div>
                        </div>
                          <div class="row">
                              <div class="col">  
                                  <h5> تحيل صورة</h5>
                            </div>
                              <div class="col">  
                                <input type="file" size="33" name="image" onchange="readURL(this);" id="image">
                            </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="stats">
                        
                        </div>
                      </div>
                  </div>
              

              </div>

            </div>
            
          </div>
        
          <div class="modal-footer"> 
            <input type="submit" class="btn btn-primary" value="حفظ">         
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

$('#show-order').on('show.bs.modal', function (event) {
  var hostName = window.location.origin;
  document.getElementById('form').action=hostName+"/item/"+$(event.relatedTarget).data('item[9]');;

  document.getElementById('img').src=$(event.relatedTarget).data('item[6]');
  document.getElementById('checkbox').checked=$(event.relatedTarget).data('item[7]')=='TRUE'?true:false;
  document.getElementById('card-title').value=$(event.relatedTarget).data('item[0]');
  document.getElementById('card-price').value=$(event.relatedTarget).data('item[2]');
  document.getElementById('card-key-words').value=$(event.relatedTarget).data('item[5]');
  document.getElementById('card-info').value=$(event.relatedTarget).data('item[10]');
  document.getElementById('card-detals').value=$(event.relatedTarget).data('item[4]');

  });


function readURL(input) {


  var image = document.getElementById("image");

    if (typeof (image.files) != "undefined") {

          var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2); 

          if(size > 3 ) {

              alert('Please select image size less than 3 MB');

          }

          

        } 


      
  }
  var app = @json($items,JSON_PRETTY_PRINT);
  var breadcrumb_index = 0;
function show(index ) {
  document.getElementById("subCategory").innerHTML="";
  document.getElementById("items").innerHTML="";
  clearBreadcrumb(0)
  var breadcrumb_links = document.getElementById("breadcrumb-links");
  var row =app[index];
  if (row[3]=='yes') {
    console.log('yes is category',breadcrumb_index);
    breadcrumb_index=1;

    var li = document.createElement("li");
    var a = document.createElement("a");
    var text = document.createTextNode(row[1]);
    li.setAttribute('class','breadcrumb-item active');

    a.href='#';
    a.setAttribute('onclick','goto('+ row[9] +','+breadcrumb_index+')');
    a.appendChild(text);
    li.appendChild(a);
    breadcrumb_links.appendChild(li);
  }else{

  }

  app.forEach(element => {
    if (element[0]==row[1]) {
      this.addToDiveSubCategory(element);
    }
  });

  app.forEach(element => {
    if (element[0]==row[1] &&element[3]=="" ) {
      this.addItems(element);
    }
   
  });
  

}
function addToDiveSubCategory(row) {

  var button = document.createElement("button");
  var text = document.createTextNode(row[1]);
  button.setAttribute('class','btn btn-secondary');
  button.setAttribute('onclick','showItems('+ row[9] +')');
  button.appendChild(text);

  var span = document.createElement("span");
  span.setAttribute('class','btn-secondary btn-link btn-sm');

  var i = document.createElement("i");
  var text = document.createTextNode('edit');
  i.setAttribute('class','material-icons');
  i.appendChild(text);


  span.appendChild(i);
  button.appendChild(span);



  var element = document.getElementById("subCategory");
  element.appendChild(button);
}

function addItems(row) {
  var button = document.createElement("button");
  var text = document.createTextNode(row[1]);
  button.setAttribute('class','btn btn-secondary');
  button.appendChild(text);
  var element = document.getElementById("items");
  element.appendChild(button);
}

function showItems(index) {
  document.getElementById("subCategory").innerHTML="";
  document.getElementById("subCategory").style.setProperty('background-color', 'indigo');
  document.getElementById("items").innerHTML="";
  var breadcrumb_links = document.getElementById("breadcrumb-links");
  var row =app[index-1];
  
  if (row[3]=='yes') {
    breadcrumb_index=breadcrumb_index;
    console.log('yes is sub'+breadcrumb_index);
    var li = document.createElement("li");
    var a = document.createElement("a");
    var text = document.createTextNode(row[1]);
    li.setAttribute('class','breadcrumb-item active');

    a.href='#';
    a.setAttribute('onclick','goto('+ row[9] +','+(breadcrumb_index+1)+')');
    a.appendChild(text);
    li.appendChild(a);
    breadcrumb_links.appendChild(li);
  }
  


  app.forEach(element => {
    if (element[0]==row[1] && element[3]=='yes') {
      addToDiveSubCategory(element);
    }
   
  });
  app.forEach(element => {
    if (element[0]==row[1] &&element[3]=="" ) {
      addItems(element);
    }
   
  });
  
}
function goto(index ,breadcrumb_number) {
  var row =app[index-1];
  
  clearBreadcrumb(breadcrumb_number);
  document.getElementById("subCategory").innerHTML="";
  document.getElementById("subCategory").style.setProperty('background-color', 'indigo');
  document.getElementById("items").innerHTML="";
  app.forEach(element => {
    if (element[0]==row[1] && element[3]=='yes') {
      this.addToDiveSubCategory(element);
    }
   
  });
  app.forEach(element => {
    if (element[0]==row[1] &&element[3]=="" ) {
      this.addItems(element);
    }
  });

}
function clearBreadcrumb(breadcrumb_number) {
  let menu = document.getElementById('breadcrumb-links');
  var children=menu.children;
  for (let i = 25; i >= breadcrumb_number; i--) {
    if (i!=0 && i!=breadcrumb_number && typeof children[i] != 'undefined') {
        children[i].remove();
    }
  }
}
</script>

@endsection