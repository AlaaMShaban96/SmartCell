<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderController extends Controller
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
        // $orders="";
       $data= Order::Search($search);
      
       $order= Order::SelectRows($data);
       $orders= $this->paginate($order);
       $orders->setPath($request->url());
       return view('Dashbord.order.index',compact('orders'));
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    
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
        // return view('pdf.test',$data); 
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
