<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Item extends Model
{
    use HasFactory;


    static public function allItems()
    {


        $data = Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet('Shop')->majorDimension('')->range('')->all();
        
        return $data;
    }
    static public function createItems($request)
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
        $type=1;
        $id=$store_id.$year.$mont.$type.rand(1,50000);
        
        $data=[
        'Under category id'=>(float)isset($request['titel'])?$request['titel']:"0",
        'Product name'=>$request['name'],
        'Product price'=>(float)isset($request['price'])?$request['price']:"",
        'category or not'=>(float)0,
        'Describe it in 80 characters or less.'=>isset($request['detals'])?$request['detals']:"",
        'Product Keyword'=>isset($request['keyWords'])?$request['keyWords']:"",
        'image url'=>$request['image'],
        'show'=>(boolean)isset($request['show'])?'TRUE':'FALSE',
        'Qyantity'=>(FLOAT)isset($request['qyantity'])?$request['qyantity']:'',
        'id'=>(float )$id,
        'Button name'=>'🛒إضافة الي السلة',
        'details'=>isset($request['info'])?$request['info']:"",
        ];
        
        $data = Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet('Shop')->append([$data]);
        
        return true;
    }
    static public function itemUpdate($id,$request)
    { 
        $ids = Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet('Shop')->majorDimension('COLUMNS')->range('J:J')->all();
        // dd($ids[0]);
        foreach ($ids[0] as $key => $value) {
            if ($value==$id) {
                $data = Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Shop')->range('A'.($key+1).':L'.($key+1))->majorDimension('ROWS')->all();
                // dd($request->all());
                $data[0][1]=$request['name'];
                $data[0][2]=(float)$data[0][3]=='1'?"":$request['price'];
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
    static public function chengeStatusItem($status, $id)
    {
  
        $data = Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Shop')->range('A'.$id.':k'.$id)->majorDimension('ROWS')->all();       
        $data[0][0]=$request['titel'];
        $data[0][2]=$data[0][3]=='yes'?"":$request['price'];
        $data[0][4]=$request['detals'];
        $data[0][5]=isset($request['keyWords'])?$request['keyWords']:"";
        $data[0][6]=isset($request['image'])?$data[0][6]:$request['image'];
        $data[0][7]= isset($request['show'])?'TRUE':'FALSE';
        $data[0][8]=isset($request['qyantity'])?(FLOAT)$request['qyantity']:(FLOAT)$data[0][8];
        $data[0][9]=$data[0][9];
        $data[0][10]=$request['info'];
        Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Shop')->
        range('A'.$id)->update([$data[0]]);
       return true ;

    }

} 
