<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
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

    public function paginate($items, $perPage = 10, $page = null, $options = [])

    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
          

    }
    private function getOrderCollection($data)
    {
        dd($data);
        $user= new Order();
       return $user->newCollection($data);

    }
}
