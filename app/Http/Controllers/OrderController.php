<?php

namespace App\Http\Controllers;

use PDF;
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
      
       

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    //    $orders= $this->paginate($order);
    //    $orders->setPath($request->url());
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
        // dd($request->state);
       
        return redirect('/order/'.$request->state);
        return redirect()->back();
        return view('Dashbord.order.edit',compact('order'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function printPDF($id)
    {
       

    // $order= Order::find($id);
    // $date = Carbon::parse($order['تاريخ الانشاء'], 'UTC');
    // $order['تاريخ الانشاء']=$date->isoFormat('MMM Do YY'); 
    // dd($order['تاريخ الانشاء']);
    $data=[];
        // $data['orderNumber']=$order['رقم الطلبية'];
        // $data['created_at']=$order['تاريخ الانشاء'];
        // $data['city']=$order['المدينة'];
        // $data['area']=$order['المنطقة'];
        // $data['name']=$order['الاسم'];
        // $data['profile']=$order['بروفايل'];
        // $data['phone']=$order['رقم الهاتف'];
        // $data['total']=$order['اجمالي سعر الطلبية'];
        return view('pdf.test'); 
        // $pdf = PDF::loadeView('pdf.test');

        // // return $pdf->download('event_qrcode.pdf');
        // return $pdf->stream('document.pdf');
        $pdf = PDF::loadView('pdf.test');
		return $pdf->stream('document.pdf');
    }

    public function paginate($items, $perPage = 10, $page = null, $options = [])

    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
          

    }

}
