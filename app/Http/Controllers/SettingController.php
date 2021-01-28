<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
       
        $response =Http::withHeaders([
            'content-type'=> 'application/json',
            'Authorization' => 'Bearer 1428315620615476:963d2a474e3b49a476d661037f226ffa',
        ])->get('https://api.manychat.com/fb/page/getBotFields')->json();
        // dd($response['data']);
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
                case 'info':
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
                case 'place':
                    $data['place']=$value;
                    break;
            }
        }
        // dd($data);
        return view('Dashbord.setting.index',compact('data'));
    }
    public function update(Request $request)
    {
        try {
            $response =Http::withHeaders([
                'content-type'=> 'application/json',
                'Authorization' => 'Bearer 1428315620615476:963d2a474e3b49a476d661037f226ffa',
            ])->post('https://api.manychat.com/fb/page/setBotFields', [
               'fields'=> [
                   [
                    'field_id' =>(int) $request->welcomeId,
                    'field_value' => (string) isset($request->welcomeValue)?$request->welcomeValue :"No" ,
    
                    ],
                   [
                    'field_id' =>(int) $request->infoId,
                    'field_value' => (string)isset($request->infoValue)?$request->infoValue:"No" ,
    
                    ],
                   [
                    'field_id' =>(int) $request->mapId,
                    'field_value' =>(string) isset($request->mapValue)?$request->mapValue:"No" ,
    
                    ],
                   [
                    'field_id' =>(int) $request->locationId,
                    'field_value' => (string)isset($request->locationValue)?$request->locationValue:"No" ,
    
                   ],
                   [
                    'field_id' =>(int) $request->Auto_moveId,
                    'field_value' => (string)isset($request->Auto_moveValue)?"Yes":"No",
    
                   ],
                   [
                    'field_id' =>(int) $request->SystemId,
                    'field_value' => (string)isset($request->SystemValue)?"Yes":"No",
    
                   ],
                   [
                    'field_id' =>(int) $request->DeliveryId,
                    'field_value' => (string)isset($request->DeliveryValue)?"Yes":"No" ,
    
                   ],
                   [
                    'field_id' =>(int) $request->placeId,
                    'field_value' => (string)isset($request->placeValue)?"Yes":"No",
    
                   ],
                   
                ]
            ])->json();
            Session::flash('message', 'تم التعديل بنجاح'); 
            Session::flash('alert-class', 'alert-success'); 

        } catch (\Throwable $th) {
            Session::flash('message', 'فشلت عملية التعديل'); 
            Session::flash('alert-class', 'alert-danger'); 
        }
      
        // dd($request->all(),$response,$request->locationId);
         return redirect('/setting');
        
    }
}
