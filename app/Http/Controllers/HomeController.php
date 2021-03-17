<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Revolution\Google\Sheets\Facades\Sheets;

class HomeController extends Controller
{


    protected $db;
    public function __construct() {
        try {
            $this->db = app('firebase.firestore')->database();
            $snapshot = $this->db->collection('Stores')->document('1')->snapshot();
            // config(['sheet.sheet_id'=>$snapshot->data()['SA1']['s_id']]);
            // config(['sheet.sheet_id'=>'13yIzeYkaacCdcFICbPGWlf3jVH1-aoWeG-9rdr70FMA']);
        } catch (\Throwable $th) {
            //throw $th;
        }
       


    }
    public function index()
    {
        // try {
            $orderState=Order::orderState();
            $todayOrder=Order::todayOrder();
        // } catch (\Throwable $th) {
        //     dd('index function on file HomeController error',$th);
        // }
        // $link="";
    

        return view('Dashbord.index',compact('orderState','todayOrder'));
    }

    /**
     * Redirect the user to the Google authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function loginShow()
    {
        return view('login');
    }
    public function login()
    {
        
        return redirect('/redirect');
    }
    public function logout()
    {
        
        Session::forget('name');
        Session::forget('role');
        Session::forget('email');
        Session::forget('store_id');
        Session::forget('store_name');
        Session::forget('logo');
        Session::forget('store_users');
        Session::forget('sheet_id');
        Session::forget('mc_api');
        return redirect('/login');

    }
    public function handleProviderCallback(Request $request)
    {

        try{
      
            $user = Socialite::with('google')->getAccessTokenResponse($request->code);
            
                # code...
           
                if ($this->selectUser($user['id_token'],$user)) {
                            if ($this->checkmanyChatAPI()) {
                                return redirect('/');
                            }else {
                                $this->logout();
                                Session::flash('message', "انتهئ اشتراك  الخاص بك في النظام ");
                                return view('login');  
                            }
                    }else {
                    
                        return view('login');
                        
                    }
             
        } catch (\Exception $e) {
            return 'status'. $e;
        }
    }

    private function selectUser( $idToken,$userTest)
    {

        $user= app('firebase.auth')->signInWithGoogleIdToken($idToken);

        $snapshot = $this->db->collection('users')->document($user->data()['email'])->snapshot();

        if ($snapshot->exists()) {

                $store=$this->db->collection('Stores')->document($snapshot->data()['store_id'])->snapshot();
               
                if ($store->exists()) {
                    if ($snapshot->data()['role']=='admin') {
                        Session::put('name', $snapshot->data()['name']);
                        Session::put('role', $snapshot->data()['role']);
                        Session::put('email',$user->data()['email']);
                        Session::put('store_id', $snapshot->data()['store_id']);
                        Session::put('store_name', $store->data()['name']);
                        Session::put('store_users', $store->data()['users']);
                        Session::put('sheet_id', $store->data()['SA1']['s_id']);
                        Session::put('mc_api', $store->data()['mc_api']);
                        Session::put('logo', $store->data()['icon']);
                        
                        $date = Carbon::parse( $store->data()['expiringDate']);
                        $now  = Carbon::now();
                        $diff = $date->diffInDays($now);
                        if ($diff<=0) {
                            Session::flash('message', "انتهئ اشتراك  الخاص بك في النظام ");
                            return false;
                        }
                        if ($diff<=10) {
                          
                            Session::flash('expiringDate',$diff);
                            Session::flash('expiringDate', ' تبقي علي انتهاء اشتراكك ' . ' '.$diff .' ' .'من الايام '); 

                            if ($diff<=3) {
                                Session::flash('alert-class', 'alert-danger'); 
                            } else {
                                Session::flash('alert-class', 'alert-warning'); 
                            } 
                        }
                        $this->setGoogleSheetCredentials($store);
                   
                        return true;
                    }else {
                        Session::flash('message', "لاتملك صلاحية الدخول");
                        return false;
                    }
                       

                } else {
                    Session::flash('message', "البريد غير موجود ");
                    return false;
                }

        }else {
            return false;
        }

        
            

        //     dd(config('google.service'));

        //     $filtered = Order::Search('تم التوصيل');

        //     $values = Order::SelectRows($filtered);

        //     $orders= array();
        //     foreach ($values as $key => $value) {
        //         $order=$this->getOrderCollection($value);
        //         array_push($orders,$order);
        //     }

        // $orders[0]['الاسم']="شمشش";
        // $orders[0]['بروفايل']="Alaa M Shaban 22";
        // dd(  Order::updateOrder($orders[0]));

        
    }

    private function getOrderCollection($data)
    {
        return $order= new Order($data->toArray());
    $order->newCollection($data->toArray());

    }
    private function addOrder(Order $order)
    {
        try {
            Sheets::spreadsheet(config('sheet.sheet_id'))->sheet('Orders')->append( $order);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    private function setGoogleSheetCredentials( $store)
    {
        $jsonString = file_get_contents(storage_path('credentials.json'));
            
        $data = json_decode($jsonString, true);



        $data= [
        "type" =>$store->data()['SA1']["type"],
        "project_id" =>$store->data()['SA1']["project_id"],
        "private_key_id" =>$store->data()['SA1']["private_key_id"],
        "private_key" =>$store->data()['SA1']["private_key"],
        "client_email" =>$store->data()['SA1']["client_email"],
        "client_id" =>$store->data()['SA1']["client_id"],
        "auth_uri" =>$store->data()['SA1']["auth_uri"],
        "token_uri" =>$store->data()['SA1']["token_uri"],
        "auth_provider_x509_cert_url" =>$store->data()['SA1']["auth_provider_x509_cert_url"],
        "client_x509_cert_url" =>$store->data()['SA1']["client_x509_cert_url"],
        ];
        // Write File  

        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

        file_put_contents(storage_path('credentials.json'), stripslashes($newJsonString));

    }
    private function checkmanyChatAPI()
    {
        $response =Http::withHeaders([
            'content-type'=> 'application/json',
            'Authorization' => 'Bearer '. Session::get('mc_api'),
        ])->get('https://api.manychat.com/fb/page/getBotFields')->json();
        if ($response['status']=='success') {
            return true;
        }else {
            return false;
        }

    }


}
