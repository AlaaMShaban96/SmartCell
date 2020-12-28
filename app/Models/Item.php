<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Support\Facades\Session;



class Item extends Model
{
    use HasFactory;


    static public function allItems()
    {


        $data = Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet('Shop')->majorDimension('')->range('')->all();
        
        return $data;
    }
    static public function itemUpdate($id,$request)
    {

        $data = Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Shop')->range('A'.$id.':k'.$id)->majorDimension('ROWS')->all();
       
    //    dd( $data ,$request);
       
        $data[0][2]=(FLOAT)$request['price'];
        $data[0][4]=$request['detals'];
        $data[0][5]=$request['keyWords'];
        $data[0][6]=isset($request['image'])?$data[0][6]:$request['image'];
        $data[0][7]= isset($request['show'])?'TRUE':'FALSE';
        $data[0][8]=isset($request['qyantity'])?(FLOAT)$request['qyantity']:(FLOAT)$data[0][8];
        $data[0][9]=$data[0][9];
        $data[0][10]=$request['info'];
        // dd( $data );
        Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Shop')->
        range('A'.$id)->update([$data[0]]);
       return true ;

    }

} 
