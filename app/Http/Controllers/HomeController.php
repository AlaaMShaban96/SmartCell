<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
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
            config(['sheet.sheet_id'=>'13yIzeYkaacCdcFICbPGWlf3jVH1-aoWeG-9rdr70FMA']);
        } catch (\Throwable $th) {
            //throw $th;
        }
       


    }

    // public function __invoke(Request $request)
    // {

    //     $this->db = app('firebase.firestore')->database();
    //     $snapshot = $this->db->collection('Stores')->document('1')->snapshot();

    //     // dd($snapshot );
        

    //     /**
    //      * Service Account demo.
    //      */
    //     $sheets = Sheets::spreadsheet('13yIzeYkaacCdcFICbPGWlf3jVH1-aoWeG-9rdr70FMA')
    //                     ->sheet('Orders')
    //                     ->get();
    //     // dd( $sheets);
    //     //$header = $sheets->pull(0);
    //     $header = [
    //         'name',
    //         'message',
    //         'created_at',
    //     ];

    //     $posts = Sheets::collection($header, $sheets);
    //     $posts = $posts->reverse()->take(10);

    //     return view('welcome')->with(compact('posts'));
    // }
        public function index()
        {
            try {
                $orderState=Order::orderState();
            } catch (\Throwable $th) {
                dd('index function ',$th);
            }
        

            return view('Dashbord.index',compact('orderState'));
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
    public function handleProviderCallback(Request $request)
    {

        try{
      

            $user = Socialite::with('google')->getAccessTokenResponse($request->code);
            
           if ($this->selectUser($user['id_token'],$user)) {
              
              return view('Dashbord.index');
          }else {
              Session::flash('message', "This Email is Not Found ");
              return view('login');
              
          }
            
          } catch (\Exception $e) {
              return 'status'. $e;
          }
    }

    private function selectUser( $idToken,$userTest)
    {
      
  
      
        $user= app('firebase.auth')->signInWithGoogleIdToken($idToken);

        $snapshot = $this->db->collection('Stores')->document('1')->snapshot();

        $private_key1 =  str_replace("\\n","\n",$snapshot->data()['SA1']['private_key']);
        $private_key =  str_replace("\n","",$snapshot->data()['SA1']['private_key']);

            config(['sheet.sheet_id'=>$snapshot->data()['SA1']['s_id']]);

            // dd(config('google.service'));

            $filtered = Order::Search('تم التوصيل');

            $values = Order::SelectRows($filtered);
 
            $orders= array();
            foreach ($values as $key => $value) {
                $order=$this->getOrderCollection($value);
                array_push($orders,$order);
            }

        $orders[0]['الاسم']="شمشش";
        $orders[0]['بروفايل']="Alaa M Shaban 22";
        dd(  Order::updateOrder($orders[0]));

        $snapshot = $this->db->collection('users')->document($user->data()['email'])->snapshot();
        if ($snapshot->exists()) {
            $store_name=$this->db->collection('stores')->document($snapshot->data()['store_id'])->snapshot()->data()['name'];
            Session::put('name', $snapshot->data()['name']);
            Session::put('rule', $snapshot->data()['rule']);
            Session::put('email',$user->data()['email']);
            Session::put('store_name',$store_name);
            Session::put('store_id', $snapshot->data()['store_id']);
            return true;
            
        }else {
            return false;
        }
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

}
