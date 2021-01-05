<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    static public function allCategory()
    {


        $data = Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet('Category')->majorDimension('')->range('')->all();
        
        return $data;
    }
    static public function createCategory($request)
    {
        $store_id=Session::get('store_id');
        
        switch (strlen($store_id)) {
            case 1:
                $store_id='00'.$store_id;
                break;
            
            case 2:
                $store_id= '0'.$store_id;
                break;
            case 4:
                $store_id= '001';
                break;
            
            default:
            $store_id;
                break;
        }
        $mont=Carbon::now('libya')->format('m');
        $year=Carbon::now('libya')->format('Y')-2000;
        $type=0;
        $id=$store_id.$year.$mont.$type.rand(1,50000);
        
        $data=[
        'Under category'=>(float)isset($request['titel'])?$request['titel']:"",
        'Product name'=>$request['name'],
        'Product price'=>"",
        'Describe it in 80 characters or less.'=>isset($request['detals'])?$request['detals']:"",
        'Product Keyword'=>"",
        'image url'=>$request['image'],
        'show'=>isset($request['show'])?'TRUE':'FALSE',
        'Qyantity'=>'',
        'id'=>$id,
        'details'=>isset($request['info'])?$request['info']:"",
        ];
        
        $data = Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet('Category')->append([$data]);
        
        return true;
    }
}
