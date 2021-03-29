@extends('Dashbord/layout/master')
@section('style')

<link rel="stylesheet" href="{{asset('css/dashbord/setting/index.css')}}">
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

  @if (isset($data))
    <div class="content">
      <div class="card">
          <form action="{{url('/setting')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="welcomeId" value="{{$data['welcome']['id']}}">
            <input type="hidden" name="infoId" value="{{$data['info']['id']}}">
            <input type="hidden" name="mapId" value="{{$data['map']['id']}}">
            <input type="hidden" name="locationId" value="{{$data['location']['id']}}">
            <input type="hidden" name="main_imageId" value="{{$data['main_image']['id']}}">

            <input type="hidden" name="Auto_moveId" value="{{$data['Auto_move']['id']}}">
            <input type="hidden" name="SystemId" value="{{$data['System']['id']}}">
            <input type="hidden" name="DeliveryId" value="{{$data['delivery']['id']}}">
            <input type="hidden" name="placeId" value="{{$data['place']['id']}}">
            <input type="hidden" name="welcomeName" value="{{$data['welcome']['id']}}">
            
            
            
            
            {{-- <div class=" text-center"> --}}
              <h2 class=" text-center mt-5" text-center>رسائل النظام</h2>

            {{-- </div> --}}
            <hr>
              <table class=" text-center" dir="rtl" >
              
                  <tbody>
                    <tr> 
                      <td> ‫الرسالة‬ ‫الترحيبية‬ </td>
                      
                      <td>
                        <textarea placeholder ="اهلا بكم في افضل رد تلقائي في المجره!" name="welcomeValue" id="" value="" cols="30" rows="3">{{$data['welcome']['value']!="No"?$data['welcome']['value']:""}}</textarea>
                      </td>
                      <td>رسالة الترحيبيه الخاصه بك في الرد التلقائي ، يجب وضع الرساله الترحيبيه و تعريف بالمتجر الخاص بك فيها</td>

                    </tr>
                    <tr>
                      <td> ‫بيانات‬ ‫التوصيل‬ </td>
                      <td>
                        <textarea placeholder ="الرجاء الانتظار ، رقم الهاتف 09XXXXXXXX" name="infoValue" id="" value="" cols="30" rows="3">{{$data['info']['value']!="No"?$data['info']['value']:""}}</textarea>

                      </td>
                      <td>‫هادي الرساله تضهر عندما يقوم المستخدم بضغط على زر "التواصل معانا" و انتظار الرد البشري ‬</td>

                    </tr>
                    <tr>
                      <td>  ‫تفاصيل‬ ‫عن‬ ‫مكان‬ ‫الموقع‬    </td>
                      <td>
                        <textarea placeholder ="بعد المستشفى الكبير ، جمب الجامع" name="locationValue" id="" value="" cols="30" rows="3">{{$data['location']['value']!="No"?$data['location']['value']:""}}</textarea>

                      </td>
                      <td >يتم وضع في هادي الرساله توضيح اكتر عن مكان المتجر / الشركة الخاصه بك‫ ‬</td>
                    </tr>
                    <tr>
                      <td> ‫رابط‬ ‫خريطة‬ ‫غوغل‬  </td>
                      <td>
                        <textarea placeholder =" ( 21°25′21″N 39°49′34″E )" name="mapValue" id="" value="" cols="30" rows="3">{{$data['map']['value']!="No"?$data['map']['value']:""}}</textarea>

                      </td>
                      <td >يتم وضع فيها احداثيات Google Maps  للمتجر/للشركة الخاصه بك ، حتى يضهر للزبائن الخاصيآ  بك‬</td>
                    </tr>
                  </tbody>
              </table>
              <h2 class=" text-center mt-5" text-center>لوحة تحكم النظام</h2>


            <hr>
              <table dir="rtl" style="margin-left: 10%;" >
              
                  <tbody>
                    <tr>
                      <td>  ‫‫ تشغيل ‬النظام‬  </td>
                       <td>
                        <label class="form-switch">
                          <input name="SystemValue" id="locationShow" type="checkbox" {{$data['System']['value']=='Yes'?'checked':''}}><i></i>
                        </label>
                      </td>
                      <td>‫يمكن ايقاف و تشغيل نظام رد التلقائي عن طريق تغير حالة ‬</td>

                    </tr>
                    <tr> 
                      <td> ‫ ‫موافقة‬ الادمن‬  </td>
                      
                      <td>
                        <label class="form-switch">
                          <input name="Auto_moveValue" id="locationShow" type="checkbox" {{$data['Auto_move']['value']=='Yes'?'checked':''}}><i></i>
                        </label>
                      </td>
                      <td> ارسال الطلبية الى قائمة موافقة الادمن قبل ارسالها الى المندوبين.</td>

                    </tr>
              
                    <tr>
                      <td>   ‫‫‫ ‫توفر‬‬ ‬التوصيل‬   </td>
                      <td>
                        <label class="form-switch">
                          <input name="DeliveryValue" id="locationShow" type="checkbox" {{$data['delivery']['value']=='Yes'?'checked':''}}><i></i>
                        </label>
                      </td>
                      <td >‫ يتم وضع فيها احداثيات Google Maps  للمتجر/للشركة الخاصه بك ، حتى يضهر للزبائن الخاصيآ  بك‬</td>
                    </tr>
                    
                    <tr>
                      <td>  ‫ ‫استلام ‬شخصي‬  </td>
                      <td>
                        <label class="form-switch">
                          <input name="placeValue" id="locationShow" type="checkbox" {{$data['place']['value']=='Yes'?'checked':''}}><i></i>
                        </label>
                      </td>
                      <td >يتم وضع في هادي الرساله توضيح اكتر عن مكان المتجر / الشركة الخاصه بك‬</td>
                    </tr>
                    <tr>
                      <td>  صورة الشعار‬  </td>
                      <td>
                        <img id="blah"  onclick='selectImage()' src='{{Session::get('logo')!=""?Session::get('logo'):asset('images/logo.svg')}}'  width="100" height="100" />

                        <div class="custom-file" style="display: none;">

                          <input onchange="ValidateSize(this);document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name='main_imageValue' type="file" class="custom-file-input" id="validatedCustomFile" >
                          {{-- <input onchange="ValidateSize(this)" name='main_imageValue' type="file" class="custom-file-input" id="validatedCustomFile" > --}}

                          <label class="custom-file-label" for="validatedCustomFile">حمل الشعار...</label>
                          <div class="invalid-feedback"></div>
                        </div>
                      </td>
                      <td >                        

                        يتم التحكم في صورة الشعار الخاص بالنشاط ‬</td>
                    </tr>
                  
                  </tbody>
              </table>
              <div class="row  m-5" dir="rtl">

                  <button  type="submit" class="btn btn-success">حفظ </button>

              </div>
            
          </form>      
      </div>
      <div class="card">
          <div class="row" id="subLoction">

          </div>
      </div>

    </div>

  @else
  <img src="{{asset('images/icon-404.gif')}}" style="width: 100%" alt="Logo">
  @endif
   





  <div id="richList"></div>
  <div id="loader" class="lds-dual-ring hidden overlay text-center">
      <img  src="{{asset('images/logo.gif')}}" style="width: 11%;height: 2;margin-top: 16%;background-color: white;border-radius: 19px;" > 
  
  </div>
  

@endsection
@section('script')

<script>
function selectImage() {
  document.getElementById('validatedCustomFile').click();
}
</script>

@endsection

