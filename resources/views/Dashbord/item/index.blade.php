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

  @if(Session::has('message'))
      <div class="alert {{ Session::get('alert-class') }} text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <p class="h4" >{{ Session::get('message') }}</p> 
      </div>
  @endif
  <button data-toggle="modal"  class="btn btn-primary" data-target="#add-item">اضافة منتج</button>
  <button data-toggle="modal"  class="btn btn-primary" data-target="#add-category">اضافة تصنيف</button>

  <div class="container">
    <div class="row">
        <div class="col-12 col-sm-3 ">
            <div class="card bg-light mb-3 text-right">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> الاصناف الاساسية</div>
                <ul class="list-group ">
                  @foreach ($items as $key=>$value)
                    @if ($key!=0)
                      @if ($value[0]=="" )
                      <li class="">
                        <div class="dropdown">

                          <a class="btn btn-secondary  dropdown-toggle" onclick="show({{$value[9]}})" data-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
                            {{$value[1]}}
                          </a>
                         
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

            </div>
        </div>

    </div>
</div>

 

      {{-- <button data-toggle="modal"  class="btn btn-primary" data-target="#show-order"></button> --}}

   
 

    

    <div class="container-fluid">
      <div class="row">

    </div>
</div>





  <!-- Modal  show order-->
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
                              <div class="row" id="price-row">
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
                                      {{-- <input type="text" class="card-title" name="titel" id="card-title"> --}}
                                      <select id="card-title" name="titel" class="form-control" >

                                      </select>
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



  <!-- Modal add item -->
  <div class="modal fade" id="add-item" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="show-order" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" > اضافة بيانات المنتج</h5>
        
        </div>
        <form action="{{url('/item')}}" method="post" enctype="multipart/form-data">
          @csrf
        
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                  <div class="card card-chart">
                      <div class="card-header card-header-success">
                          <img class="img-icons-show" id="xx" src='{{asset('image/dashbord/logo/logo.jpg')}}' alt="" srcset="">
                      </div>
                      <div class="card-body text-right">
                        <p class="card-category">
  
                              </p>
                              <div class="row" id="price-row">
                                  <div class="col">  
                                      <h5> اسم المنتج</h5>
                                </div>
                                  <div class="col">  
                                      <input type="text" class="card-title" name="name" id="card-price">
                                  
                                </div>
                            </div>
                              <div class="row" id="price-row">
                                  <div class="col">  
                                      <h5> سعر المنتج</h5>
                                </div>
                                  <div class="col">  
                                      <input type="number" class="card-title" name="price" id="card-price">
                                  
                                </div>
                            </div>
                              <div class="row" id="price-row">
                                  <div class="col">  
                                      <h5>  الكمية</h5>
                                </div>
                                  <div class="col">  
                                      <input type="number" class="card-title" name="qyantity" id="card-price">
                                  
                                </div>
                            </div>
                              <div class="row">
                                  <div class="col">  
                                      <h5> تصنيف المنتج</h5>
                                </div>
                                  <div class="col">  
                                      {{-- <input type="text" class="card-title" name="titel" id="card-title"> --}}
                                      <select id="card-title-add-item" name="titel" class="form-control" >

                                      </select>
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
                                <input type="file" size="33" name="image" onchange="readImageURL(this);" id="imagexx">
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
  <!-- Modal  add-category -->
  <div class="modal fade" id="add-category" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="show-order" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" > اضافة تصنيف </h5>
        
        </div>
        <form action="{{url('/category')}}" method="post" enctype="multipart/form-data">
          @csrf
        
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                  <div class="card card-chart">
                      <div class="card-header card-header-success">
                          <img class="img-icons-show" id="xx" src='{{asset('image/dashbord/logo/logo.jpg')}}' alt="" srcset="">
                      </div>
                      <div class="card-body text-right">
                        <p class="card-category">
  
                              </p>
                              <div class="row">
                                <div class="col">  
                                    <h5> تصنيف تحت</h5>
                              </div>
                                <div class="col">  
                                    {{-- <input type="text" class="card-title" name="titel" id="card-title"> --}}
                                    <select id="card-title-add-category" name="titel" class="form-control card-title-add-item" >

                                    </select>
                                  </div>
                              </div>
                              <div class="row" id="price-row">
                                  <div class="col">  
                                      <h5> اسم التصنيف</h5>
                                </div>
                                  <div class="col">  
                                      <input type="text" class="card-title" name="name" id="card-price">
                                  
                                </div>
                            </div>
                            
                              <div class="row">
                                  <div class="col">  
                                      <span><h5> عرض التصنيف</h5></span>
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
                                  <h5> وصف التصنيف</h5>
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
                                <input type="file" size="33" name="image" onchange="readImageURL(this);" id="imagexx">
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
  var app = @json($items,JSON_PRETTY_PRINT);
  var breadcrumb_index = 0;




  var select = document.getElementById('card-title-add-item');

      var option=document.createElement('option');
      option.value="";
    var text=document.createTextNode('لايوجد تصنيف');
    option.append(text);
    select.append(option);

    app.forEach(element => {
        if (element[11]!=undefined && element[1]!="Product name") {
            var option=document.createElement('option');
             option.value=element[1];
            var text=document.createTextNode(element[1]);
            option.append(text);
            select.append(option);
        }
    });

</script>
<script src="{{asset('js/items.js')}}"></script>

@endsection