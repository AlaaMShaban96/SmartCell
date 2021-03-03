<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;

use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    protected $db;
    public function __construct() {
        try {
            $this->db = app('firebase.firestore')->database();

        } catch (\Throwable $th) {
            return view('login');
        }
       


    }
    public function index()
    {
       
        $response =Http::withHeaders([
            'content-type'=> 'application/json',
            'Authorization' => 'Bearer '. Session::get('mc_api'),
        ])->get('https://api.manychat.com/fb/page/getBotFields')->json();
        if ($response['status']=='success') {
            $data=[];
            foreach ($response['data'] as $key => $value) {
                switch ($value['name']) {
                    case 'System':
                        $data['System']=$value;
                        break;
                    case 'delivery':
                        $data['delivery']=$value;
                        break;
                    case 'location':
                        $data['location']=$value;
                        break;
                    case 'welcome':
                        $data['welcome']=$value;
                        break;
                    case 'Auto_move':
                        $data['Auto_move']=$value;
                        break;
                    case 'Info':
                        $data['info']=$value;
                        break;
                    case 'map':
                        $data['map']=$value;
                        break;
                    case 'Auto_move':
                        $data['Auto_move']=$value;
                        break;
                    case 'System':
                        $data['System']=$value;
                        break;
                    case 'delivery':
                        $data['delivery']=$value;
                        break;
                    case 'main_image':
                        $data['main_image']=$value;
                        break;
                    case 'Place':
                        $data['place']=$value;
                        break;
                }
            }
        }else {
            $data=null;
        }
    //    dd($response['data']);
        return view('Dashbord.setting.index',compact('data'));
    }
    public function update(Request $request)
    {
        try {
            $response =Http::withHeaders([
                'content-type'=> 'application/json',
                'Authorization' => 'Bearer '. Session::get('mc_api'),

            ])->post('https://api.manychat.com/fb/page/setBotFields', 
            
            [
                'fields'=>  [
                                [
                                    'field_id' =>$request->welcomeId,
                                    'field_value' => (string) isset($request->welcomeValue)?$request->welcomeValue :"No" ,
                    
                                    ],
                                [
                                    'field_id' =>$request->infoId,
                                    'field_value' => (string)isset($request->infoValue)?$request->infoValue:"No" ,
                    
                                    ],
                                [
                                    'field_id' =>$request->mapId,
                                    'field_value' =>(string) isset($request->mapValue)?$request->mapValue:"No" ,
                    
                                    ],
                                [
                                    'field_id' =>$request->locationId,
                                    'field_value' => (string)isset($request->locationValue)?$request->locationValue:"No" ,
                    
                                ],
                                [
                                    'field_id' =>$request->Auto_moveId,
                                    'field_value' => (string)isset($request->Auto_moveValue)?"Yes":"No",
                    
                                ],
                                [
                                    'field_id' =>$request->SystemId,
                                    'field_value' => (string)isset($request->SystemValue)?"Yes":"No",
                    
                                ],
                                [
                                    'field_id' =>$request->DeliveryId,
                                    'field_value' => (string)isset($request->DeliveryValue)?"Yes":"No" ,
                    
                                ],
                                [
                                    'field_id' =>$request->placeId,
                                    'field_value' => (string)isset($request->placeValue)?"Yes":"No",
                    
                                ],
                                
                                [
                                    'field_id' =>$request->main_imageId,
                                    'field_value' => (string)$this->compress($request),
                    
                                ],
                                
                            ]       
            ])->json();
            if ($response['status']=='success') {
                Session::flash('message', 'تم التعديل بنجاح'); 
                Session::flash('alert-class', 'alert-success'); 
            }else {
                Session::flash('message', 'فشلت عملية التعديل'); 
                Session::flash('alert-class', 'alert-danger'); 
            }
            

        } catch (\Throwable $th) {
            // dd($th);
            Session::flash('message', 'فشلت عملية التعديل'); 
            Session::flash('alert-class', 'alert-danger'); 
        }
         return redirect('/setting');
        
    }
    private function compress(Request $request)
    {
        if (isset($request->main_imageValue)) {

            $photo =  $request->file('main_imageValue');

            $nameFile=Session::get('store_name').(string) Str::uuid().'.png';
            $img = Image::make($photo->getRealPath())->resize(466, 466)->save('storage/'.$nameFile);
            $s3 = Storage::disk('s3');
            $filePath = 'images/' .Session::get('store_name').(string) Str::uuid();
            $s3->put($filePath, file_get_contents(public_path('storage/'. $nameFile)), 'public');
            $path='https://smartcellimage.s3.af-south-1.amazonaws.com/'.$filePath;
            $this->db->collection('Stores')->document(Session::get('store_id'))->update([
                ['path' => 'icon','value' => $path]
              ]); 
              Storage::disk('s3')->delete('images/'.substr(strrchr(Session::get('logo'), "/"), 1));
              Session::put('logo',$path);
            return $path;

        }else{
            return Session::get('logo');
        }
        
    } 
 
}
