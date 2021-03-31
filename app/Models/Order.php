<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    static $delivered ;
    static $recovery ;
    static $wasCanceled ;
    static $connecting ;
    static $personalReceipt ;
    
    protected $fillable = [
        'الاسم',
        'بروفايل',
        'رقم الهاتف',
        
        'المنتج 1','عدد قطع المنتج 1','سعر المنتج 1',

        'المنتج 2','عدد قطع المنتج 2','سعر المنتج 2',
            
        'المنتج 3','عدد قطع المنتج 3','سعر المنتج 3',
            
        'المنتج 5','عدد قطع المنتج 5','سعر المنتج 5',
            
        'المنتج 6','عدد قطع المنتج 6','سعر المنتج 6',
            
        'المنتج 7','عدد قطع المنتج 7','سعر المنتج 7',
            
        'المنتج 8','عدد قطع المنتج 8','سعر المنتج 8',
            
        'المنتج 9','عدد قطع المنتج 9','سعر المنتج 9',
            
        'المنتج 10','عدد قطع المنتج 10','سعر المنتج 10',
      
        'المدينة',
        'المنطقة',
        'ملاحظة الزبون',
        'اجمالي سعر الطلبية',
        'سعر التوصيل',
        'اجمالي الفتورة',
        'المندوب',
        'تاريخ الانشاء',
        'تاريخ التوصيل',
        'حالة الطلبية',
        'ملاحظة المندوب / الادمن',
        'رقم الطلبية',
        'ملاحظة المندوب / الادمن',
        'ملاحظة المندوب / الادمن',
        'ملاحظة المندوب / الادمن',

    ];


    static public function find($id)
    {
       
        $rows = Sheets::spreadsheet(Session::get('id_data'))->sheet('Orders')->range('A'.($id-1).':AV'.($id-1))->majorDimension('ROWS')->get();
        $header = Sheets::range('A1:AV1')->get();
        $row= Sheets::collection($header->toArray()[0],$rows)->all();
        return  $row[0]->toArray() ;
    }
    static public function todayOrder()
    {
        $column = Sheets::spreadsheet(Session::get('id_data'))->sheet('Orders')->majorDimension('')->range('')->all();
        $data=[];
        foreach ($column as $key => $value) {
            if ($key != 0) {

                $date = Carbon::parse($value[40]);
                // $date = Carbon::parse($value[40]);
                $now  = Carbon::now();
        
                $diff = $date->diffInDays($now);
                // dd($diff,'2020-09-29T11:00:58+02:00');
                if ($diff==0) {
                    array_push($data,$value);
                }
            }
           
            
        }
        // $data =array_filter( $column[40] , function ($value)  {
        //     return $value;
        //     // return $value == "2020-09-29T11:00:58+02:00";
        // });
        return  $data;
    }
    static public function orederUpdate($id,$request)
    {

        $data = Sheets::spreadsheet(Session::get('id_data'))->sheet('Orders')->range('A'.$id.':AV'.$id)->majorDimension('ROWS')->all();
        $data[0][44]=$request->userEmail;
        $data[0][42]=$request->orderStatus;
        $data[0][39]=$request->userName;
        Sheets::spreadsheet(Session::get('id_data'))->sheet('Orders')->
        range('A'.$id)->update([$data[0]]);
       return true ;

    }
    static public function chengeStatusItem($status, $id,$request)
    { 
        $data = Sheets::spreadsheet(Session::get('id_data'))->sheet('Orders')->range('A'.($id).':AV'.($id))->majorDimension('ROWS')->all();
        // trim($status, '"')=='تم الالغاء'?
        $data[0][42]=trim($status, '"');
        $data[0][43]=isset($request['note'])?$request['note']:$data[0][43];
        Sheets::spreadsheet(Session::get('id_data'))->sheet('Orders')->
        range('A'.($id))->update([$data[0]]);
       return true ;

    }
    static public function sendToUser($id,$name,$email)
    {
        $data = Sheets::spreadsheet(Session::get('id_data'))->sheet('Orders')->range('A'.$id.':AV'.$id)->majorDimension('ROWS')->all();
        $data[0][39]=trim($name, '"');
        $data[0][44]=trim($email, '"');
        $data[0][42]='قيد التوصيل';
        Sheets::spreadsheet(Session::get('id_data'))->sheet('Orders')->
        range('A'.$id)->update([$data[0]]);
       return true ;

    }
    static public function Search($search)
    {
        $column = Sheets::spreadsheet(Session::get('id_data'))
        ->sheet('Orders')->majorDimension('COLUMNS')->range('AQ1:AQ')->all();
        
        $filtered = array_filter(  $column[0], function ($value) use($search) {
            
            return  $value == $search;
        });
        return  $filtered ;
    }
    static public function allOrder()
    {
        
        $data =Sheets::spreadsheet(Session::get('id_data'))->sheet('Orders')->range('')->majorDimension('')->get();    
        $orders=$data->toArray();
        rsort($orders);
        // dd($orders);
        return $orders;
    }
    static public function SelectRows($search)
    {
        $rows = Sheets::sheet('Orders')->range('')->majorDimension('')->get();
        $header = $rows->pull(0);
        
      
        $row= array();
            foreach ( $search as $key => $value) {
                
                array_push($row,$rows[$key]);
            }
            // dd('on function SelectRows', $row);   
        return 
        Sheets::collection($header,$row)
        // Sheets::collection(Self::$data,$row)
        ->all();
    }
    static public function saveOrder(Order $order)
    {
        try {
            dd($order->toArray());
            // Sheets::spreadsheet(Session::get('id_data'))->sheet('Orders')->append($order->toArray());
            Sheets::spreadsheet(Session::get('id_data'))->sheet('Orders')->append([['الاسم'=>'3', 'رقم الهاتف'=>'name3']]);
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
       

    }
    static public function updateOrder(Order $order)
    {
        try {
            $data=array_values($order->toArray());
            Sheets::spreadsheet(Session::get('id_data'))
            ->sheet('Orders')
            ->range('A'.$order['رقم الطلبية'])
            ->update([$data]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
       

    }
    static public function orderState()
    {
       
        $orderState= array();
        // dd(Session::get('id_data'));
        // $column = Sheets::spreadsheet(Session::get('id_data'))
        $column = Sheets::spreadsheet(Session::get('id_data'))
        ->sheet('Orders')->majorDimension('COLUMNS')->range('AQ1:AQ')->all();
        
       $delivered = array_filter( $column[0], function ($value)  {
            return $value == "تم التوصيل";
        });
       
        $recovery = array_filter( $column[0], function ($value) {
            return $value == "استرجاع";
        });
        
       $wasCanceled = array_filter( $column[0], function ($value)  {
            return $value == "تم الالغاء";
        });
        
        $connecting = array_filter( $column[0], function ($value)  {
            return $value == "قيد التوصيل";
        });
        
        $personalReceipt = array_filter( $column[0], function ($value)  {
            return $value == "استلام شخصي";
        }); 
        $admin = array_filter( $column[0], function ($value)  {
            return $value == "انتظار موافقة الادمن";
        }); 
        $waiting = array_filter( $column[0], function ($value)  {
            return $value == "قيد الانتظار";
        }); 

        array_push($orderState,[
            'count'=>count($admin),
            'prameter'=>'delivered',
            'name'=>"انتظار موافقة الادمن",
            'colorCardIcon'=>"card-header-success",
            // 'icon'=>"image/dashbord/orderState/fromshop.png",
            'icon'=>"images/Component 3 – 1.svg",
        ]);
        array_push($orderState,[
            'count'=>count($waiting),
            'prameter'=>'delivered',
            'name'=>"قيد الانتظار",
            'colorCardIcon'=>"card-header-success",
            // 'icon'=>"image/dashbord/orderState/fromshop.png",
            'icon'=>"images/waiting logo.svg",
        ]);
        array_push($orderState,[
            'count'=>count($delivered),
            'prameter'=>'delivered',
            'name'=>"تم التوصيل",
            'colorCardIcon'=>"card-header-success",
            // 'icon'=>"image/dashbord/orderState/fromshop.png",
            'icon'=>"images/Component 3 – 1.svg",
        ]);
        array_push($orderState,[
            'count'=>count($recovery),
            'prameter'=>'recovery',
            'name'=>"استرجاع",
            'colorCardIcon'=>"card-header-info",
            'icon'=>"images/recovary icon.svg",
            // 'icon'=>"image/dashbord/orderState/fromshop.png",
        ]);
        array_push($orderState,[
            'count'=>count($wasCanceled),
            'prameter'=>'wasCanceled',
            'name'=>"تم الالغاء",
            'colorCardIcon'=>"card-header-warning",
            'icon'=>"images/Component 4 – 1.svg",
            // 'icon'=>"image/dashbord/orderState/fromshop.png",
        ]);
        array_push($orderState,[
            'count'=>count($connecting),
            'prameter'=>'connecting',
            'name'=>"قيد التوصيل",
            'colorCardIcon'=>"card-header-warning",
            'icon'=>"images/Component 2 – 1.svg",
            // 'icon'=>"image/dashbord/orderState/fromshop.png",
        ]);
        array_push($orderState,[
            'count'=>count($personalReceipt),
            'prameter'=>'personalReceipt',
            'name'=>"استلام شخصي",
            'colorCardIcon'=>"card-header-warning",
            'icon'=>"images/from shop.svg",
            // 'icon'=>"image/dashbord/orderState/fromshop.png",
        ]);
     
        return $orderState;
    }

}
