@extends('Dashbord/layout/master')
@section('style')

{{-- <link rel="stylesheet" href="{{asset('css/dashbord/item/index.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/dashbord/item/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('css/dashbord/item/style.css')}}">





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



<div class="container">

    <nav aria-label="breadcrumb" class="position-relative">
        <div class="breadcrumb bg-dark" id="breadcrumbsContainer" >
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
        </div>

        <button class="btn btn-primary fav-button fav-button-digram" id="toggleDiagram" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
            </svg>
        </button>
        <button class="btn btn-primary fav-button" id="toggleDirectory" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
            </svg>
        </button>
        <button class="btn btn-primary fav-button fav-button-search" id="toggleSearch" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </nav>

    <div class="row " id="productsContainer"  style="margin-right:0; margin-left:0;">

    </div>
    <div class="row " id="searchContainer" style="display:none;">

    </div>
    <div class="row" id="treeContainer" style="display:none; overflow-x: auto;">
        <ul class="tree col-md-12"></ul>
        <canvas id="treeCanvas"></canvas>
    </div>
    <div id="editFormModal" style="z-index:1050;" class="modal" role="dialog">
        <div class="modal-dialog modal-lg"  role="document">
            <div class="modal-content">
                <form action="{{url('/item')}}" method='post' enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="create" id="product-create" value="1" />
                        <input type="hidden" name="productId" id="product-productId" value="" />
                        <input type="hidden" name="parentId" id="product-parentId" value="" />
                        <div class="container row">
                            <div class="col-md-6 rounded-top" >
                                <div class="card" id="card-preview"  style="max-height: 600px;background:#3a3b3c; border-width: 0; color:white;border-radius: 20px;">
                                    <img id="imagePreview" src="https://via.placeholder.com/150" style="height:350px;border-radius: 20px 20px 0 0 ;" class="card-img-top">
                                    <input type="file" id="product-image" name="image" class="form-control" style="visibility:hidden;" />

                                    <label  for="product-image" class="btn btn-primary d-flex justify-content-center align-items-center" style="background:#4e4f50;border-width: 0;width:50px;height:50px;border-radius: 99px;position: absolute; top:20px;right:20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                        </svg>
                                    </label>
                                    <div class="card-body">
                                        <input id="product-title" name="title" placeholder="Enter item title" style="color:white;background:transparent; border-width: 0; border-bottom-width: 1px; margin:10px 0;" />
                                        <input id="product-subtitle" name="subtitle" placeholder="Enter item Subtitle" style="color:white;background:transparent; border-width: 0; border-bottom-width: 1px; margin:10px 0;" />
                                        <div></div>
                                        <a href="#" id="button-1" style="background:#4e4f50;border-width: 0;" class="btn btn-primary highlight-dark">شراء المنتج</a>
                                        <a href="#" id="button-2"  style="background:#4e4f50;border-width: 0;" class="btn btn-primary addButton2">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 " style="overflow-y:auto;">
                 
                                <div id="button-1-form" style="margin:10px 0;">
                                    
                                    <h5>الزر 1</h5>
                                    <label>نوع الزر :</label>
                                    <select id="button-1-type" name="button-1-type" class="form-control select-button-type">
                                        <option class="buyOption" value="BUY">زر شراء</option>
                                        <option value="DATA">زر تفاصيل</option>
                                    </select>
                                    <label>اسم الزر</label>
                                    <input class="form-control" id="button-1-name" name="button-1-name" placeholder="اسم الزر"  />
                                    <div class="buy-button-form">
                                        <label>السعر</label>
                                        <input class="form-control" id="button-1-price" name="button-1-price" type="number" placeholder="10 , 20 ,30 .." />
                                        <div id="productForm">
                                            <label>توافر المنتج</label>
                                            <label class="switch">
                                                <input id="product-avalible" name="avalible-product" type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="data-button-form">
                                        <label>تفاصيل</label>
                                        <input class="form-control" id="button-1-details" name="button-1-details" placeholder="..." />
                                        <label for="button-1-image">صورة : <br/><img  id="button-1-imagePreview" width="200" height="200" src="https://via.placeholder.com/150" alt="" style="cursor:pointer;width:200px;height:200px;" class="img-thumbnail"></label>
                                        <input style="visibility: hidden;" type="file" id="button-1-image" class="form-control" name="button-1-image"  />
                                    </div>
                                   
                                    <hr/>
                                </div>
                                <div id="button-2-form" style="display:none; margin:10px 0;" >
                                    <div class="d-flex justify-content-between" ><h5>زر 2</h5>
                                        <a id="deleteButton" href="#" class="btn btn-danger">x</a></div>
                                    <label>نوع :</label>
                                    <select id="button-2-type" name="button-2-type" class="form-control select-button-type">
                                        <option class="buyOption" value="BUY">زر شراء</option>
                                        <option value="DATA">زر تفاصيل</option>
                                    </select>
                                    <label>اسم الزر</label>
                                    <input class="form-control" id="button-2-name" name="button-2-name" value="زر 2" placeholder="اسم الزر"  />
                                    <div class="buy-button-form">
                                        <label>السعر</label>
                                        <input class="form-control" id="button-2-price" name="button-2-price" type="number" placeholder="10 , 20 ,30 .." />
                                        <div id="productForm">
                                            <label>توافر المنتج</label>
                                            <label class="switch">
                                                <input id="product-avalible" name="avalible-product" type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="data-button-form">
                                        <label>تفاصيل</label>
                                        <input class="form-control" id="button-2-details" name="button-2-details" placeholder="..." />
                                        <label for="button-2-image">صورة : <br/><img id="button-2-imagePreview" width="200" height="200" src="https://via.placeholder.com/150" alt="" style="cursor:pointer;width:200px;height:200px;" class="img-thumbnail"></label>
                                        <input style="visibility: hidden;" type="file" id="button-2-image" class="form-control" name="button-1-image"  />
                                    </div>
                                    <hr/>

                                </div>


                                <div id="card-form">
                                    <label>كلمات مفتاحية</label>
                                    <input class="form-control" id="product-keywords" name="keywords" placeholder="كلمات مفتاحية" />
                                    <label>النوع</label>
                                    <select class="form-control" id="product-category" name="category">
                                        <option value="0">منتج</option>
                                        <option value="1">صنف</option>
                                    </select>

                                    <label style="display:none;">order</label>
                                    <select style="display:none;" id="product-order" class="form-control" name="order">
                                        <option value="0">منتج</option>
                                    </select>

                                    <label>Parent</label>
                                    <select id="product-parent" class="form-control" name="parentId">
                                        <option value="0">رئيسي</option>
                                    </select>
                                    <div>
                                        <label>منتج معروض</label>
                                        <label class="switch">
                                            <input id="product-show" id="product-show" name="product-show" type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="createModal" style="z-index:1050;" class="modal" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center"> اختار ما تريد انشاء</h3>
                    <div style="margin-top:40px;" class="container">
                        <div class="row">
                            <div id="createProduct" data-placement="top" data-title="منتج" data-content=" مايكون تحت التصنيف مثل ايفون اكس يكون الذي تحت تصنيف الالكترونات" class="col-md-6 d-flex justify-content-center createHover" style="border-right: solid 1px #d2d2d278;">
                                <div class="card" >
                                    <img src="data:image/jpeg;base64,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" style="border-radius: 20px 20px 0 0 ;" class="card-img-top">
                                    <div class="card-body">
                                        <h5  class="card-title">Iphone X</h5>
                                        <p  class="card-text" style="color:silver;">ايفون اكس احمر</p>
                                        <a href="#"  class="btn btn-primary">شراء المنتج</a>
                                        <a href="#"  class="btn btn-primary">تفاصيل المنتج</a>
                                    </div>
                                </div>
                            </div>
                            <div  id="createCategory"  data-placement="top" data-title="تصنيف" data-content="  مجموعة من المنتجات مثل الالكترونات " class="col-md-6 d-flex justify-content-center createHover"  style="border-left: solid 1px #d2d2d278;">
                                <div class="card"  style=" min-width:275px; height:100%;background:#3a3b3c; box-shadow: 0 0 1px 1px rgba(0,0,0,0.1);  border-width: 0; color:white;border-radius: 20px;">
                                    <img src="https://www.techychimp.com/wp-content/uploads/2017/09/Important-Tips-to-Buy-Electronic-Products.jpg" style="border-radius: 20px 20px 0 0 ; height: 350px;" class="card-img-top">
                                    <div class="card-body">
                                        <h5  class="card-title">الاجهزة الالكترونية</h5>
                                        <p  class="card-text" style="color:silver;">تصنيف الاجهزة الالكترونية</p>
                                        <a href="#"  class="btn btn-primary">عرض المنتجات</a>
                                        <a href="#"  class="btn btn-primary">تفاصيل التصنيف</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="richList"></div>
<div id="loader" class="lds-dual-ring hidden overlay text-center">
    <img  src="{{asset('images/logo.gif')}}" style="width: 11%;height: 2;margin-top: 16%;background-color: white;border-radius: 19px;" > 

</div>














@endsection
@section('script')  

  <script>var items = @json($object,JSON_PRETTY_PRINT);</script>
  <script src="{{asset('js/dashbord/item/events.js')}}"></script>
  <script src="{{asset('js/dashbord/item/tree.js')}}"></script>
  <script src="{{asset('js/dashbord/item/canvas.js')}}"></script>
 <script>
     var products = formatProducts(items).splice(1);

    var products2 = [
        {productId:"1",showProduct:false,quantity:0,parent:null,title:"product 1",subtitle:"subtitle",category:false,button1:{type:"BUY",name:"Buy now",price:100}},
        {productId:"2",showProduct:true,quantity:0,parent:null,keywords:"keyfuckingwords",title:"category 2",subtitle:"",category:true,button1:{type:"BUY",name:"Buy now",price:100}},
        {productId:"3",showProduct:true,quantity:1,parent:"2",order:2,title:"category 3",subtitle:"subtitle",category:true,button1:{type:"BUY",name:"Buy now",price:100}},
        {productId:"4",showProduct:true,quantity:0,parent:"3",order:1,title:"category 4",subtitle:"subtitle",category:true,button1:{type:"BUY",name:"Buy now",price:100}},
        {productId:"5",showProduct:true,quantity:1,parent:"2",order:1,title:"product 5",subtitle:"subtitle",category:false,button1:{type:"DATA",name:"Test",details:"test"},button2:{type:"BUY",name:"شراء",price:200}},
        {productId:"6",showProduct:true,quantity:0,parent:"3",order:2,title:"product 6",subtitle:"subtitle",category:false,button1:{type:"DATA",name:"data",details:"test"},button2:{type:"DATA",name:"asd",details:"asd"}},
        {productId:"7",showProduct:true,quantity:1,parent:"4",order:1,title:"product 7",subtitle:"subtitle",category:false,button1:{type:"BUY",name:"Buy now",price:100}},
    ];
     console.log(products,products2);


    var productsById = {};
    for (var i = 0; i < products.length; i += 1){
        productsById[products[i].productId] = i;
    }
    var productsTree = makeTree(products,productsById);
    $(function(){

        var $editFormModal = $("#editFormModal");
        var updateUrl = "";
        var createUrl = "";
        gotoProduct();
        $(document).on("click", ".navigate-card", function (){
            var productId = $(this).attr("data-product-id");
            gotoProduct(productId);
        }).find(".btn-danger").click(function(){
            $(this).parent().submit();
            return false;
        });
        $(document).on("click",'.editProductButton',function(){
            var productId = $(this).parent().parent().attr('data-product-id');
            $editFormModal.modal('show');
            $editFormModal.find("form").attr("action",updateUrl);

            addDataToFields(productId);
            return false;
        });
        $(document).on("click",'.addProductButton',function()
        {
            $("#createModal").modal('show');
        })

        $(".createHover").popover({ trigger: "hover" });

        $("#createCategory").click(function(){
            var parentId = $(this).attr('data-parent-id');
            $editFormModal.find("#parentId").val(parentId);
            $("#createModal").modal('hide');
            $editFormModal.modal('show');
            ResetFields();
            $editFormModal.find("form").attr("action",createUrl);
            $editFormModal.find("#product-category").val(1).trigger("change");

            var numberOfSiblings = products.filter(item => item.parent == parentId).length;
            $("#product-order").html('');
            for(var i=1;i<=numberOfSiblings;i++){
                $("#product-order").append(`<option value="${i}">${i}</option>`);
            }
            $editFormModal.find("#product-parent").val(parentId ?? 0);

        });
        $("#createProduct").click(function(){
            var parentId = $(this).attr('data-parent-id');
            $("#createModal").modal('hide');
            $editFormModal.modal('show');
            ResetFields();
            $editFormModal.find("form").attr("action",createUrl);
            $editFormModal.find("#product-category").val(0).trigger("change");
            $editFormModal.find("#parentId").val(parentId);

            var numberOfSiblings = products.filter(item => item.parent == parentId).length;
            $("#product-order").html('');
            for(var i=1;i<=numberOfSiblings;i++){
                $("#product-order").append(`<option value="${i}">${i}</option>`);
            }
            $editFormModal.find("#product-parent").val(parentId ?? 0);


        });
        MakeSearch(products);

        $(document).on('keyup','#searchBox input',function(){
            MakeSearch(products,$(this).val());
        });

    });
    function MakeSearch(products,search=''){
        $searchContainer = $("#searchContainer");
        $searchContainer.html("");
        products.filter(item => item.title.includes(search)).forEach(item => {
            $searchContainer.append(`
                <div class=" col-md-4 col-lg-3 col-12 col-sm-6" style="border-radius: 20px; margin-top:20px;">
                <div data-product-id="${item.productId}"  data-placement="top" data-title="مخفي" data-content="هذا المنتج لا يظهر للمستخدمين"  class="${item.showProduct == false ? 'hidden-product' : ''}" style="height:100%; ">
                <div class="card animate__animated animate__fadeIn"  >
                    <img src="${item.image ?? "https://via.placeholder.com/150"}" style="border-radius: 20px 20px 0 0 ;position: relative;" class="card-img-top">
                    ${item.category ? `<label style="background:linear-gradient(#40bfac, #5fbccc);position:absolute; bottom:0;right:10px;" class="badge badge-primary">تصنيف</label>`: ""}
                    <button class="btn btn-primary editProductButton" style="background:#4e4f50;border-width: 0;width:50px;height:50px;border-radius: 99px;position: absolute; top:20px;right:20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                    </button>
                    <form method='post' action='{{url('/item')}}/${item.productId}'>
                      @csrf
                      @method('delete')
                    <button type="submit"  class="btn btn-danger" style="border-width: 0;width:50px;height:50px;border-radius: 99px;position: absolute; top:20px;left:20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                    </form>
                    <div class="card-body">
                        <h5  class="card-title">${item.title}</h5>
                        <p  class="card-text" style="color:silver;">${item.subtitle == "" ? "&nbsp;" : item.subtitle }</p>
                          <a href="#" style="background:#4e4f50;border-width: 0;" class="btn btn-primary">${item.button1.name ?? ((item.category) ? "عرض المنتجات" : "شراء المنتج" )}</a>
                            ${(item.button2) ? `<a href="#" style="background:#4e4f50;border-width: 0;" class="btn btn-primary">${item.button2.name }</a>` : ""}

                    </div>
                </div>
                </div>
                </div>
            `);
        });
        $searchContainer.find('.hidden-product').popover({trigger:"hover"});
    }

    function addDataToFields(productId){
        var $editFormModal = $("#editFormModal");
        var product = products[productsById[productId]];

        $editFormModal.find('#product-title').val(product.title);
        $editFormModal.find('#product-productId').val(product.productId);
        $editFormModal.find('#product-create').val("0");

        $editFormModal.find('#product-subtitle').val(product.subtitle);

        $editFormModal.find('#product-keywords').val(product.keywords);

        $editFormModal.find('#button-1-type').val(product.button1.type ?? "");
        $editFormModal.find("#product-parent").html(`<option value="0">رئيسي</option>`);
        products.filter(item => item.category && item.productId != productId ).forEach(item => {
            $editFormModal.find("#product-parent").append(`<option value="${item.productId}">${item.title}</option>`);
        });
        $editFormModal.find("#product-parent").val(product.parent ?? 0);

        var $button1Form = $editFormModal.find('#button-1-form');
        var $button2Form = $editFormModal.find('#button-2-form');
        var $button1 =  $("#button-1");
        var $button2 =  $("#button-2");

        if(product.button1.type == "BUY")
        {
            $button1Form.find('.data-button-form').hide();
            $button1Form.find('.buy-button-form').show();
            $button2Form.find('.buy-button-form').removeAttr('disabled');

        }
        else if(product.button1.type == "DATA")
        {
            $button1Form.find('.data-button-form').show();
            $button1Form.find('.buy-button-form').hide();
            $button2Form.find('.data-button-form').removeAttr('disabled');

        }
        else
        {
            $button1Form.find('.data-button-form').hide();
            $button1Form.find('.buy-button-form').hide();
        }
        $button1Form.find('#button-1-name').val(product.button1.name ?? "");
        $button1Form.find('#button-1-price').val(product.button1.price ?? "");
        $button1Form.find('#button-1-details').val(product.button1.details ?? "");

        $button1.html(product.button1.name ?? "");

        if(!!product.button2){
            $button2Form.show();
            $editFormModal.find('#button-2-type').val(product.button2.type ?? "");

            if(product.button2.type == "BUY")
            {
                $button2Form.find('.data-button-form').hide();
                $button2Form.find('.buy-button-form').show();
                $button2Form.find('.buy-button-form').removeAttr('disabled');

            }
            else if(product.button2.type == "DATA")
            {
                $button2Form.find('.data-button-form').show();
                $button2Form.find('.buy-button-form').hide();
                $button2Form.find('.data-button-form').removeAttr('disabled');

            }
            else
            {
                $button2Form.find('.data-button-form').hide();
                $button2Form.find('.buy-button-form').hide();
            }
            $button2Form.find('#button-2-name').val(product.button2.name ?? "");
            $button2Form.find('#button-2-price').val(product.button2.price ?? "");
            $button2Form.find('#button-2-details').val(product.button2.details ?? "");

            $button2.html(product.button2.name ?? "");
            $button2.removeClass("addButton2");
        }
        else
        {
            $button2.html("+");
            $button2.addClass("addButton2");
            $button2Form.hide();
        }
        $("#imagePreview").attr('src',product.image ?? "https://via.placeholder.com/150");
        $("#button-1-imagePreview").attr('src', product?.button1?.image ?? "https://via.placeholder.com/150");
        $("#button-2-imagePreview").attr('src', product?.button2?.image ?? "https://via.placeholder.com/150");
        $editFormModal.find("#product-category").val(product.category ? 1 : 0).trigger("change");

        var numberOfSiblings = products.filter(item => item.parent == product.parent).length;
        $("#product-order").html('');
        for(var i=1;i<=numberOfSiblings;i++){
            $("#product-order").append(`<option value="${i}">${i}</option>`);
        }
        $editFormModal.find('#product-order').val(product.order);

        $("#product-show").prop('checked',product.showProduct);
        $("#product-avalible").prop('checked',product.showProduct);
    }
    function ResetFields()
    {
        var $editFormModal = $("#editFormModal");

        $editFormModal.find('#product-title').val("");
        $editFormModal.find('#product-subtitle').val("");

        $editFormModal.find('#product-productId').val("");
        $editFormModal.find('#product-create').val("1");

        $editFormModal.find('#product-keywords').val("");

        $editFormModal.find('#product-image').val("");

        $editFormModal.find("#product-parent").html(`<option value="0">رئيسي</option>`);
        products.filter(item => item.category  ).forEach(item => {
            $editFormModal.find("#product-parent").append(`<option value="${item.productId}">${item.title}</option>`);
        });
        $editFormModal.find("#product-parent").val(0);

        $editFormModal.find('#button-1-type').val("");
        var $button1Form = $editFormModal.find('#button-1-form');
        var $button2Form = $editFormModal.find('#button-2-form');
        var $button1 =  $("#button-1");
        var $button2 =  $("#button-2");

        $button1Form.find('.data-button-form').hide();
        $button1Form.find('.buy-button-form').hide();

        $button1Form.find('#button-1-name').val("زر #1");
        $button1Form.find('#button-1-price').val("");
        $button1Form.find('#button-1-details').val("");
        $button1.html("زر #1");

        $editFormModal.find('#button-2-type').val("");

        $button2Form.find('.data-button-form').hide();
        $button2Form.find('.buy-button-form').hide();

        $button2Form.find('#button-2-name').val("");
        $button2Form.find('#button-2-price').val("");
        $button2Form.find('#button-2-details').val("");

        $button2.html("+");
        $button2.addClass("addButton2");
        $button2Form.hide();
        $("#imagePreview").attr('src',"https://via.placeholder.com/150");
        $("#button-1-imagePreview").attr('src',"https://via.placeholder.com/150");
        $("#button-2-imagePreview").attr('src',"https://via.placeholder.com/150");
        $button1Form.find('#button-1-image').val("");
        $button2Form.find('#button-2-image').val("");

        $("#productForm").show(100);

        $button1.show(100);
        $button2.show(100);
    }

    function makeBreadCrumbs(categoryId,productsById,products)
    {
        var $breadcrumbsContainer = $("#breadcrumbsContainer");
        var nextParent = categoryId;
        $breadcrumbsContainer.html("");
        while(nextParent && nextParent !== 0){
            var product = products[productsById[nextParent]];

            var template = `<li class="breadcrumb-item" ><span class="navigate-card" data-product-id="${product.productId}" >${product.title}</span></li>`;
            var html = $breadcrumbsContainer.html();
            if(product.productId == categoryId)
            {
                template = `<li class="breadcrumb-item active">${product.title}</li>`;
            }
            $breadcrumbsContainer.html(template + html);
            nextParent = product.parent;
        }
        var html = $breadcrumbsContainer.html();
        $breadcrumbsContainer.html(`<li class="breadcrumb-item ${ !categoryId ? "active" : ""}"><span class="${ !!categoryId ? "navigate-card" : ""} "  href="#">الكل</span></li>` + html);
        $breadcrumbsContainer.append(`<div id="searchBox" style="display:none;">
        <div class="input-group rounded">
            <input type="search"  class="form-control rounded" placeholder="Search" aria-label="Search"
                  aria-describedby="search-addon" />

        </div>
    </div>`);
    }
    function makeProducts(products,categoryId=null)
    {
       var $productsContainer = $("#productsContainer");
        $productsContainer.html("");
        $productsContainer.append(`
                <div data-parent-id="${categoryId}" class= " animate__animated animate__fadeIn col-md-4 col-lg-3 col-12 col-sm-6 d-flex justify-content-center align-items-center addProductButton"  style="margin-top:20px;cursor:pointer;border-radius: 20px; border-style: dashed; border-color:#ccc; flex-direction: column;">
                    <h1 style="color:#ccc;">
                    +
                    </h1>
                  <br/><div style="color:#ccc;"> <small>اضافة منتج او تصنيف</small></div>
                </div>
            `);
        products.filter(item => item.parent == categoryId ).sort((a,b) => a.order-b.order).forEach(item => {
            var i = $productsContainer.append(`
                <div class="col-md-4 col-lg-3 col-12 col-sm-6" style="border-radius: 20px;margin-top:20px;">
                <div data-product-id="${item.productId}"  data-placement="top" data-title="مخفي" data-content="هذا المنتج لا يظهر للمستخدمين"  class="${item.category ? "navigate-card" : null } ${item.showProduct == false ? 'hidden-product' : ''}" style="height:100%; ">
                <div class="card animate__animated  animate__fadeIn " >
                    <img src="${item.image ?? "https://via.placeholder.com/150"}" style="border-radius: 20px 20px 0 0 ;" class="card-img-top">
                    ${item.category ? `<label style="background:linear-gradient(#40bfac, #5fbccc);position:absolute; bottom:0;right:10px;" class="badge badge-primary">تصنيف</label>`: ""}
                    <button class="btn btn-primary editProductButton" style="background:#4e4f50;border-width: 0;width:50px;height:50px;border-radius: 99px;position: absolute; top:20px;right:20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                    </button>
                    <form method='post' action='{{url('/item')}}/${item.productId}'>
                      @csrf
                      @method('delete')
                    <button type="submit"  class="btn btn-danger" style="border-width: 0;width:50px;height:50px;border-radius: 99px;position: absolute; top:20px;left:20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                    </form>
                    <div class="card-body">
                        <h5  class="card-title">${item.title}</h5>
                        <p  class="card-text" style="color:silver;">${item.subtitle == "" ? "&nbsp;" : item.subtitle }</p>
                          <a href="#" style="background:#4e4f50;border-width: 0;" class="btn btn-primary">${item.button1.name ?? ((item.category) ? "عرض المنتجات" : "شراء المنتج" )}</a>
                            ${(item.button2) ? `<a href="#" style="background:#4e4f50;border-width: 0;" class="btn btn-primary">${item.button2.name }</a>` : ""}

                    </div>
                </div>
                </div>
                </div>
            `);

        });
        $productsContainer.find('.hidden-product').popover({trigger:"hover"});
    }
    function gotoProduct(productId)
    {
        makeProducts(products,productId);
        makeBreadCrumbs(productId,productsById,products);
        productsTree = makeTree(products,productsById);
        drawTree(productsTree,productId);
        $("#editFormModal").find('#product-parentId').val(productId);
    }

    function formatProducts(products)
    {
        var formattedProducts = [];

        products.forEach(item => {
            var product = {};
            var Button1 = {};
            var Button2 = {};

                        product.productId = item.product_id;

                        product.showProduct =  item.active;

                        product.quantity = item.Quantity;

                        product.title = item.title;

                        product.subtitle = item.subtitle;

                        product.keywords = item.keywords;

                        product.category = (item.category_or_not == 1) ? true : false;
                            product.image = item.image;
                        product.parent = (!!item.Category  ) ? parseInt(item.Category.replaceAll(",","")) : null;
                        product.parent = (product.parent == 0) ? null : product.parent;

                        Button1.type = (item.button1Target == "SubCategories")? "BUY" : (!item.button1Target )? undefined : "DATA";
                        Button1.name = item.button1Caption;

                        if(Button1.type == "DATA"){
                            Button1.details = item.details;
                            Button1.image = item.detail_image;
                        }


                        Button2.type = (item.button2Target == "SubCategories")? "BUY" : (!item.button2Target )? undefined : "DATA";


                        Button2.name = item.button2Caption;


                        if(Button2.type == "DATA"){
                            Button2.details = item.details;
                            Button2.image = item.detail_image;
                        }


            if(product.category && Button1.type == "BUY")
            {
                Button1.type = "SHOW";
            }
            if(!!Button1.type)
            {
                product.button1 = Button1;
            }
            if(product.category && Button2.type == "BUY")
            {
                Button2.type = "SHOW";
            }
            if(!!Button2.type)
            {
                product.button2 = Button2;
            }
            formattedProducts.push(product);
        });
        return formattedProducts;
    }
</script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> --}}
  
@endsection