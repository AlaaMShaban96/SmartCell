<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\ItemAndCategoryTrait;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use ItemAndCategoryTrait;
    static public function allCategory()
    {


        $data = Sheets::spreadsheet(Session::get('id_system'))
        ->sheet('Category')->majorDimension('')->range('')->all();
        
        return $data;
    }
    static public function createCategory($request)
    {
        // dd($request);

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
        $id=$store_id.$year.$mont.date("dhis");
        $data=[
           
            (boolean)isset($request['product-show'])?TRUE:FALSE,
            (int)$id,
            "",
            isset($request['title'])?$request['title']:'',
            isset($request['keywords'])?$request['keywords']: "",
            isset($request['subtitle'])?$request['subtitle']:"", //بتع 80 حر,
            isset($request['image'])?$request['image']:Session::get('logo'),
            (float)isset($request['parentId'])?$request['parentId']: 0,
            'flow step',
            $request['button-1-name'],
            'SubCategories',
            'set_field_value, set_field_value',
            'cate1, order id',
            '1||'.$id,            
            !(isset($request['button-2-type'])) ?"flow step":"none",
            !(isset($request['button-2-type'])) ?$request['button-2-name']:"",
            !(isset($request['button-2-type'])) ?$request['button-2-details']:"",
            !(isset($request['button-2-type'])) ?"set_field_value, set_field_value, set_field_value":"",
            !(isset($request['button-2-type'])) ?"details, cate1, order id":"",
            !(isset($request['button-2-type'])) ?$request['button-2-details'].'||1||'.$id :"",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            (isset($request['button-2-type'])) ?'':$request['button-2-details'],
            (int)'1',
        ];
        // dd(!(isset($request['button-2-type'])) ?'fff':$request['button-2-details'],$request);
        // dd($data,(isset($request['image'])?$request['image']:Session::get('logo')),Session::get('logo'));
        // dd($data ,$request);

        Sheets::spreadsheet(Session::get('id_system'))
        ->sheet('Shop Logic')->append([$data]);
        return true;
    }
    static public function updateCategory($request,$id)
    {
        // dd('updateCategory',$request);
        $ids = Sheets::spreadsheet(Session::get('id_system'))
        ->sheet('Shop Logic')->majorDimension('COLUMNS')->range('B:B')->all();
        // dd($request);
        foreach ($ids[0] as $key => $value) {
            
            if ($value==$id) { 
                $data = Sheets::spreadsheet(Session::get('id_system'))->sheet('Shop Logic')->range('A'.($key+1).':AC'.($key+1))->majorDimension('ROWS')->all();
               
                $data[0][0]=(boolean)isset($request['product-show'])?TRUE:FALSE;
                $data[0][2]="";
                $data[0][3]=$request['title'];
                $data[0][4]=isset($request['keywords'])?$request['keywords']: $data[0][4];
                $data[0][5]=isset($request['subtitle'])?$request['subtitle']:$data[0][5]; //بتع 80 حرف
                $data[0][6]=isset($request['image'])?$request['image']:$data[0][6];
                $data[0][7]=floatval($request['parentId']==$id?$data[0][7]:$request['parentId']);
                // $data[0][8]='flow step';
                $data[0][9]=$request['button-1-name'];
                $data[0][10]= isset($request['button-1-name']) && $request['button-1-type']=='DATA'? 'details':(($request['button-1-type']=='SHOW')?"SubCategories":'');
                $data[0][11]= (isset($request['button-1-name'])) ?"set_field_value, set_field_value, set_field_value".((($request['button-1-type']=='DATA')?", set_field_value, set_field_value":'')):"";
                
                
                $data[0][12]= (isset($request['button-1-name'])) ?"cate1, order id".((($request['button-1-type']=='DATA')?", details,  quantity_text":'')):"";
                $data[0][13]= (isset($request['button-1-name'])) ?'1||'.$id .((($request['button-1-type']=='DATA')?'||'.self::setDetails($request)."||".self::setImage($request):'')):"";

                // $data[0][12]='set order, price, photo, set_quantity, quantity_text, cate1, order id';
                
                $data[0][14]= (isset($request['button-2-name'])) ?"flow step":"none";
                $data[0][15]= (isset($request['button-2-name'])) ?$request['button-2-name']:"";
                $data[0][16]= isset($request['button-2-name']) && $request['button-2-type']=='DATA'? 'details':(($request['button-2-type']=='SHOW')?"SubCategories":'');
                $data[0][17]= (isset($request['button-2-name'])) ?"set_field_value, set_field_value, set_field_value".((($request['button-2-type']=='DATA')?", set_field_value, set_field_value":'')):"";
                $data[0][18]= (isset($request['button-2-name'])) ?"cate1, order id".((($request['button-2-type']=='DATA')?", details,  quantity_text":'')):"";
                $data[0][19]= (isset($request['button-2-name'])) ?'1||'.$id .((($request['button-2-type']=='DATA')?'||'.self::setDetails($request)."||".self::setImage($request):'')):"";

                $data[0][25]=self::setImage($request,$data[0][25]);
                $data[0][26]='';
                $data[0][27]=self::setDetails($request);
                $data[0][28]=(float)'1';
                dd($request, $data);
                Sheets::spreadsheet(Session::get('id_system'))->sheet('Shop Logic')->
                range('A'.($key+1))->update([$data[0]]);

                break;
            }
        }
            // dd('here');
       
       return true ;

    }
    static private function setDetails($request,$oldDetails=null)
    {
        if (isset($request['button-2-details'])) {
           return $request['button-2-details'];
        }
        if (isset($request['button-1-details'])) {
           return $request['button-1-details'];
        }
        if (isset($oldDetails)) {
            return $oldDetails;
         }
        return '';
    }
    static private function setImage($request,$oldImage=null)
    {
        if (isset($request['button-1-image'])) {
           return $request['button-1-image'];
        }
        if (isset($request['button-2-image'])) {
           return $request['button-2-image'];
        }
        if (isset($oldImage)) {
            return $oldImage;
         }
        return '';
    }
}
