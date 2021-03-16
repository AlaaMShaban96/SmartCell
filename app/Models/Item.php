<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\ItemAndCategoryTrait;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Item extends Model
{
    use HasFactory;
    use ItemAndCategoryTrait;

    static public function allItems()
    {


        $data = Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet('Shop Logic')->majorDimension('')->range('')->all();
        
        return $data;
    }
    static public function createItems($request)
    {

        $store_id=Session::get('store_id');
        
        switch (strlen($store_id)) {
            case 1:
                $store_id='000'.$store_id;
                break;
            
            case 2:
                $store_id= '00'.$store_id;
                break;
            case 3:
                $store_id= '0'.$store_id;
                break;
            case 4:
                $store_id;
                break;
            default:
            $store_id= '0001';
                break;
        }
        $mont=Carbon::now('libya')->format('m');
        $year=Carbon::now('libya')->format('Y')-2000;
        $id=$store_id.$year.$mont.date("dhis");
        
        // if ($index!=null) {
        //     Item::itemUpdate($index,$request,$id);
        // }else {
            // dd( $id.'||0||'.(isset($request['qyantity'])?"غير محدودة":"محدودة").'||'.$request['qyantity'].'||'.$request['image'].'||'.$request['price'].'||'.$request['name']);
            $data=[
               
            (boolean)isset($request['product-show'])?TRUE:FALSE,
            (int)$id,
            (float) self::setPrice($request),
            $request['title'],
            isset($request['keywords'])?$request['keywords']: "",
            isset($request['subtitle'])?$request['subtitle']:'', //بتع 80 حر,
            isset($request['image'])?$request['image']:asset("images/logo.svg"),
            (float)isset($request['parentId'])?$request['parentId']: 0,
            'flow step',
           
           
            isset($request['button-1-type'])?$request['button-1-name']:'',
            isset($request['button-1-type']) && $request['button-1-type']=='BUY'?'SubCategories':'details',
            isset($request['button-1-type']) && $request['button-1-type']=='BUY'?'set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value , set_field_value':'set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value',
            isset($request['button-1-type']) && $request['button-1-type']=='BUY'?'set order, price, photo, set_quantity, quantity_text, cate1, order id':'details, set order, price, photo, set_quantity, quantity_text, cate1, order id',
            isset($request['button-1-type']) && $request['button-1-type']=='BUY'?$request['title'].'||'.(isset($request['button-1-price'])?$request['button-1-price']:'').'||'.$request['image'].'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id :($request['button-1-details'].$request['titel'].'||'.(isset($request['button-1-price'])?$request['button-1-price']:'').'||'.$request['image'].'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id),            
           
            isset($request['button-2-type']) && $request['button-2-type']=='DATA'?"flow step":"none",
            isset($request['button-2-type']) && $request['button-2-type']=='DATA'?$request['button-2-name']:"",
            isset($request['button-2-type']) && $request['button-2-type']=='DATA'?'details':"SubCategories",
            isset($request['button-2-type']) && $request['button-2-type']=='DATA'?"set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value":"",
            isset($request['button-2-type']) && $request['button-2-type']=='DATA'?"details, set order, price, photo, set_quantity, quantity_text, cate1, order id":"",
            isset($request['button-2-type']) && $request['button-2-type']=='DATA'?$request['button-2-details'].$request['button-2-name'].'||'.(isset($request['button-2-price'])?$request['button-2-price']:'').'||'.$request['image'].'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id :"",
           
           
           
           
            // isset($request['price'])?'شراء المنتج 🛒':'تفاصيل أكثر',
            // isset($request['price'])?'SubCategories':'details',
            // isset($request['price'])?'set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value , set_field_value':'set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value',
            // isset($request['price'])?'set order, price, photo, set_quantity, quantity_text, cate1, order id':'details, set order, price, photo, set_quantity, quantity_text, cate1, order id',
            // isset($request['price'])?$request['name'].'||'.(isset($request['price'])?$request['price']:'').'||'.$request['image'].'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id :($request['info'].$request['name'].'||'.(isset($request['price'])?$request['price']:'').'||'.$request['image'].'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id),            
           
            // isset($request['price'])?isset($request['info'])?"flow step":"none":'',
            // isset($request['price'])?isset($request['info'])?"تفاصيل أكثر":"":'',
            // isset($request['price'])?isset($request['info'])?"details":"":'',
            // isset($request['price'])?isset($request['info'])?"set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value":"":'',
            // isset($request['price'])?isset($request['info'])?"details, set order, price, photo, set_quantity, quantity_text, cate1, order id":"":'',
            // isset($request['price'])?isset($request['info'])?$request['info'].$request['name'].'||'.(isset($request['price'])?$request['price']:'').'||'.$request['image'].'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id :"":'',
            "",
            "",
            "",
            "",
            "",
            "",
            (int)isset($request['qyantity'])?$request['qyantity']:'',
            self::setDetails($request),
            (int)'0',
            ];
            // dd($data);
            $data = Sheets::spreadsheet(Session::get('sheet_id'))
            ->sheet('Shop Logic')->append([$data]);
           

        // }
        
        
        return true;
    }
    static public function itemUpdate($id,$request)
    { 
        // dd($request,isset($request['image']));
            $ids = Sheets::spreadsheet(Session::get('sheet_id'))
                            ->sheet('Shop Logic')
                            ->majorDimension('COLUMNS')
                            ->range('B:B')
                            ->all();

            foreach ($ids[0] as $key => $value) {
                if ($value==$id) {
                    $data = Sheets::spreadsheet(Session::get('sheet_id'))
                    ->sheet('Shop Logic')
                    ->range('A'.($key+1).':AC'.($key+1))
                    ->majorDimension('ROWS')
                    ->all();
                    // dd($request->all());
                    
                    $data[0][0]=(boolean)isset($request['show'])?TRUE:FALSE;
                    $data[0][2]=(float)isset($request['price'])?$request['price']:'';
                    $data[0][3]=isset($request['name'])?$request['name']: $data[0][3];
                    $data[0][4]=isset($request['keywords'])?$request['keywords']: $data[0][4];
                    $data[0][5]=isset($request['subtitle'])?$request['subtitle']:""; //بتع 80 حرف
                    $data[0][6]=isset($request['image'])?$request['image']:$data[0][6];
                    $data[0][7]=(float)$request['titel'];
                    // $data[0][8]='flow step';
                    // $data[0][9]='شراء المنتج';
                    // $data[0][10]='SubCategories';
                    // $data[0][11]='set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value , set_field_value';
                    // $data[0][12]='set order, price, photo, set_quantity, quantity_text, cate1, order id';
                    $data[0][13]=isset($request['price'])?(isset($request['name'])?$request['name']: $data[0][3]).'||'.(isset($request['price'])?$request['price']:'').'||'.(isset($request['image'])?$request['image']:$data[0][6]).'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id :($request['info'].'||'.(isset($request['name'])?$request['name']: $data[0][3] ).(isset($request['price'])?'||'.$request['price']:'').'||'.(isset($request['image'])?$request['image']:$data[0][6]).'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id);
                    $data[0][14]=isset($request['price'])?isset($request['info'])?"flow step":"none":'';
                    $data[0][15]=isset($request['price'])?isset($request['info'])?"تفاصيل أكثر":"":'';
                    $data[0][16]=isset($request['price'])?isset($request['info'])?"details":"":'';
                    $data[0][17]=isset($request['price'])?isset($request['info'])?"set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value":"":'';
                    $data[0][18]=isset($request['price'])?isset($request['info'])?"details, set order, price, photo, set_quantity, quantity_text, cate1, order id":"":'';
                    $data[0][19]=isset($request['price'])?$request['info'].'||'.$request['name'].'||'.$data[0][2].'||'.$data[0][6].'||'.(isset($request['qyantity'])?$request['qyantity']:$data[0][26]).'||'.(isset($request['qyantity'])?$request['qyantity']:"غير محدودة").'||0||'.$id:'';
                    $data[0][26]=isset($request['price'])?(float)isset($request['qyantity'])?$request['qyantity']:'0':'';
                    $data[0][27]=isset($request['price'])?isset($request['info'])?$request['info']:$data[0][27]:isset($request['info'])?$request['info']:$data[0][27];
                    $data[0][28]=(float)'0';
                    // dd($data);
                    Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Shop Logic')->
                    range('A'.($key+1))->update([$data[0]]);
                    break;
                }
            }
        
            
        

            // dd('itemUpdate on create item');

     
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
    static private function setPrice($request)
    {
        if (isset($request['button-2-price'])) {
           return $request['button-2-price'];
        }
        if (isset($request['button-1-price'])) {
           return $request['button-1-price'];
        }
        return 0;
    }
    static private function setDetails($request)
    {
        if (isset($request['button-2-details'])) {
           return $request['button-2-details'];
        }
        if (isset($request['button-1-details'])) {
           return $request['button-1-details'];
        }
        return '';
    }

} 
