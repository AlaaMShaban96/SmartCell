<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Loction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
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
            return $th ;
        }
        Session::flash('message', 'تم تعديل المدينة  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }
    public function store(Request $request)
    {
        // try {
            $data=$request->all();
            $data['image']="";
            if ($request->has('image')) {
                $data['image']=$this->compress($request);
            }
            Loction::createLoctions($data);

        // } catch (\Throwable $th) {
        //     Session::flash('message', $th.'فشلت عملية الاضافة'); 
        //     Session::flash('alert-class', 'alert-danger'); 
        //     return redirect()->back() ;
        // }
        Session::flash('message', 'تم إضافة المدينة  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }

    private function compress(Request $request)
    {
        $photo =  $request->file('image');
        $img = Image::make($photo->getRealPath())->resize(466, 466)->save('storage/x.jpg');
        $file = base64_encode(file_get_contents(public_path('storage/x.jpg')));
        $client = new Client(['base_uri' => 'https://api.imgbb.com']);
        $response = $client->request('POST', '/1/upload', ['form_params' => [
            'key' => '10d7821a327b25dfa51b8fd036a64cac',
            'image' => $file,
            'name' => Session::get('store_name').Carbon::now()->toDateTimeString(),
        ]]);
        $data=json_decode($response->getBody());
        return $data->data->url;
    } 
}
