<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    
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


    static public function Search($search)
    {
        $column = Sheets::spreadsheet(config('sheet.sheet_id'))
        ->sheet('Orders')->majorDimension('COLUMNS')->range('AQ1:AQ')->all();

        $filtered = array_filter( $column[0], function ($value) use($search) {
            return $value == $search ;
        });
        return  $filtered ;
    }
    static public function SelectRows($search)
    {
        $rows = Sheets::sheet('Orders')->range('')->majorDimension('')->get();
        $header = $rows->pull(0);
        $row= array();
            foreach ( $search as $key => $value) {
                
                array_push($row,$rows[$key+1]);
            }

        return 
        Sheets::collection($header,$row)
        // Sheets::collection(Self::$data,$row)
        ->all();
    }
    static public function saveOrder(Order $order)
    {
        try {
            dd($order->toArray());
            // Sheets::spreadsheet(config('sheet.sheet_id'))->sheet('Orders')->append($order->toArray());
            Sheets::spreadsheet(config('sheet.sheet_id'))->sheet('Orders')->append([['الاسم'=>'3', 'رقم الهاتف'=>'name3']]);
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
       

    }
    static public function updateOrder(Order $order)
    {
        try {
            $data=array_values($order->toArray());
            Sheets::spreadsheet(config('sheet.sheet_id'))
            ->sheet('Orders')
            ->range('A'.$order['رقم الطلبية'])
            ->update([$data]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
       

    }
}
