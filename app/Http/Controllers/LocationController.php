<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Loction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


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
        // dd('uodate',$request);
        try {
            $data=$request->all();
            $data['image']="";
            if ($request->has('image')) {
                $data['image']=$this->compress($request);
            }
            Loction::updateLoctions($data);

        } catch (\Throwable $th) {
            Session::flash('message', 'فشلت عملية التعديل'); 
            Session::flash('alert-class', 'alert-danger'); 
            return $th ;
        }
        Session::flash('message', 'تم تعديل المدينة  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }
    public function store(Request $request)
    {
        try {
            $data=$request->all();
            $data['image']="";
            if ($request->has('image')) {
                $data['image']=$this->compress($request);
            }
            // dd($data['image']);
            Loction::createLoctions($data);

        } catch (\Throwable $th) {
            Session::flash('message', ' فشلت عملية الاضافة '); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back() ;
        }
        Session::flash('message', 'تم إضافة المدينة  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }

    private function compress(Request $request)
    {
        $photo =  $request->file('image');
        $img = Image::make($photo->getRealPath())->resize(466, 466)->save('storage/x.jpg');
        $s3 = Storage::disk('s3');
        $filePath = 'images/' .Session::get('store_name').(string) Str::uuid();
        $s3->put($filePath, file_get_contents(public_path('storage/x.jpg')), 'public');
        $path='https://smartcellimage.s3.af-south-1.amazonaws.com/'.$filePath;
        return $path;

    } 
}
