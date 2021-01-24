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
        'Under category id'=>(float)isset($request['titel'])?$request['titel']:"1",
        'Product name'=>$request['name'],
        'category or not'=>1,
        'Product price'=>"",
        'Describe it in 80 characters or less.'=>isset($request['detals'])?$request['detals']:"",
        'Product Keyword'=>"",
        'image url'=>$request['image'],
        'show'=>(boolean)isset($request['show'])?'TRUE':'FALSE',
        'Qyantity'=>'',
        'id'=>(float )$id,
        'Button name'=>$request['name'],
        'details'=>isset($request['info'])?$request['info']:"",
        ];
        
        $data = Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet('Shop')->append([$data]);
        
        return true;
    }
    static public function updateCategory($request,$id)
    {
        $ids = Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet('Shop')->majorDimension('COLUMNS')->range('J:J')->all();
        // dd($ids[0]);
        foreach ($ids[0] as $key => $value) {
            if ($value==$id) {
                $data = Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Shop')->range('A'.($key+1).':L'.($key+1))->majorDimension('ROWS')->all();
                // dd($request->all());
                $data[0][1]=$request['name'];
                $data[0][0]=(float)$request['titel'];
                $data[0][6]=isset($request['image'])?$data[0][6]:$request['image'];
                $data[0][7]=(boolean)isset($request['show'])?'TRUE':'FALSE';
                $data[0][10]=isset($request['info'])?$request['info']: $data[0][10];
                Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Shop')->
                range('A'.($key+1))->update([$data[0]]);
                break;
            }
        }
  
       
       return true ;

    }
}
