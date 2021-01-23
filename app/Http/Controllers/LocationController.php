<?php

namespace App\Http\Controllers;

use App\Models\Loction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LocationController extends Controller
{
    public function index()
    {   
        try {
            $loctions =Loction::getLoctions();
        } catch (\Throwable $th) {
            dd($th);
        }
        
        return view('Dashbord.location.index',compact('loctions'));
    }
    public function update(Request $request)
    {
        try {
            Loction::updateLoctions($request);

        } catch (\Throwable $th) {
            Session::flash('message', $th.'فشلت عملية التعديل'); 
            Session::flash('alert-class', 'alert-danger'); 
            return ;
        }
        Session::flash('message', 'تم تعديل المدينة  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }
}
