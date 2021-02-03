@extends('errors/layout/master')
@section('content')
    <div class="error__title">404</div>
    <div class="error__subtitle">هناك مشكلة في الخادم</div>
    <br>
    <br>
    <a href="{{url('/')}}" class="error__button error__button--active">الصفحة الرئسية</a>

    {{-- <button class="error__button error__button--active">LOGIN</button> --}}
   
@endsection
