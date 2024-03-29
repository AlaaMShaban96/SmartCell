<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderController extends Controller
{ 

    protected $db;
    public function __construct() {
        try {
            $this->db = app('firebase.firestore')->database();
     
        } catch (\Throwable $th) {
                return view('errors.404');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $orders=Order::allOrder();
            $orderState=Order::orderState();
            $todayOrder=Order::todayOrder();
        } catch (\Throwable $th) {
                return view('errors.404');
        }
      
        return view('Dashbord.order.index',compact('orders','orderState','todayOrder'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search , Request $request)
    {
       $data= Order::Search($search);
      
       $orders= Order::SelectRows($data);
        $link="/".$search;

       return view('Dashbord.order.index',compact('orders','link'));
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order= Order::find($id);
        $date = Carbon::parse($order['تاريخ الانشاء'], 'UTC');
        $order['تاريخ الانشاء']=$date->isoFormat('MMM DD YY'); 
        $link="/".$order['حالة الطلبية']."/".$order['رقم الطلبية'];
        return view('Dashbord.order.edit',compact('order','link'));

    }
    public function update($id,Request $request)
    {
        try {
            $request->userEmail=$request->userEmail==''?Session::get('email'):$request->userEmail;
            $request->userName=$request->userName==''?Session::get('name'):$request->userName;
            $db=app('firebase.firestore')->database();
    
            $request->userName= $db->collection('users')->document($request->userEmail)->snapshot()->data()['name'];
            
            if(Order::orederUpdate($id,$request)){
    
                Session::flash('message', 'تم التعديل بنجاح'); 
                Session::flash('alert-class', 'alert-success'); 
    
            }else {
                Session::flash('message', 'فشلت عملية التعديل'); 
                Session::flash('alert-class', 'alert-danger'); 
            }
        } catch (\Throwable $th) {
            Session::flash('message', 'فشلت عملية التعديل'); 
            Session::flash('alert-class', 'alert-danger'); 
        }
       
       
        return redirect('/order/'.$request->state);
        return redirect()->back();
        return view('Dashbord.order.edit',compact('order'));

    }

    public function printPDF($id)
    {
       

        $order= Order::find($id);
        $date = Carbon::parse($order['تاريخ الانشاء'], 'UTC');
        $order['تاريخ الانشاء']=$date->isoFormat('MMM Do YY'); 
        // dd($order);
        $data=[];
        // $data['orderNumber']=$order['رقم الطلبية'];
        // $data['created_at']=$order['تاريخ الانشاء'];
        // $data['city']=$order['المدينة'];
        // $data['area']=$order['المنطقة'];
        // $data['name']=$order['الاسم'];
        // $data['profile']=$order['بروفايل'];
        // $data['phone']=$order['رقم الهاتف'];
        // $data['total']=$order['اجمالي سعر الطلبية'];
        return view('pdf.test',compact('order')); 
        // $pdf = PDF::loadeView('pdf.test');

        // // return $pdf->download('event_qrcode.pdf');
        // return $pdf->stream('document.pdf');
        $pdf = PDF::loadView('pdf.test' ,compact('order'));
		return $pdf->stream('document.pdf');
    }
    public function chengeStatusItem(Request $request, $status, $id)
    {
        try {
            if(Order::chengeStatusItem($status, $id,$request->all())){

                Session::flash('message', 'تم التعديل بنجاح'); 
                Session::flash('alert-class', 'alert-success'); 
    
            }else {
                Session::flash('message', 'فشلت عملية التعديل'); 
                Session::flash('alert-class', 'alert-danger'); 
            }
        } catch (\Throwable $th) {
            Session::flash('message', 'فشلت عملية التعديل'); 
            Session::flash('alert-class', 'alert-danger'); 
        }
       
        return redirect()->back();
    }
    public function sendToUser(Request $request,  $id)
    {
        try {
            $name = $this->db->collection('users')->document($request->email)->snapshot()['name'];
            if(Order::sendToUser($id,$name,$request->email)){
    
                Session::flash('message', 'تم التعديل بنجاح'); 
                Session::flash('alert-class', 'alert-success'); 
    
            }else {
                Session::flash('message', 'فشلت عملية التعديل'); 
                Session::flash('alert-class', 'alert-danger'); 
            }
        } catch (\Throwable $th) {
            
            Session::flash('message', 'فشلت عملية التعديل'); 
            Session::flash('alert-class', 'alert-danger'); 
        }
        
        return redirect()->back();
    }
    public function paginate($items, $perPage = 10, $page = null, $options = [])

    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
          

    }

}
