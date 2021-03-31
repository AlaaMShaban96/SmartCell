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


        $data = Sheets::spreadsheet(Session::get('id_system'))
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
        // dd( $request['title'] ,$request);
            $data=[
               
            (boolean)isset($request['product-show'])?TRUE:FALSE,
            (int)$id,
            (float) self::setPrice($request),
            $request['title'],
            isset($request['keywords'])?$request['keywords']: "",
            isset($request['subtitle'])?$request['subtitle']:'', //بتع 80 حر,
            isset($request['image'])?$request['image']:asset("images/logo.svg"),
            floatval(isset($request['parentId'])?$request['parentId']: 0),
            'flow step',
            isset($request['button-1-type'])?$request['button-1-name']:'',
            isset($request['button-1-type']) && $request['button-1-type']=='BUY'?'SubCategories':'details',
            isset($request['button-1-type']) && $request['button-1-type']=='BUY'?'set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value , set_field_value':'set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value',
            isset($request['button-1-type']) && $request['button-1-type']=='BUY'?'set order, price, photo, set_quantity, quantity_text, cate1, order id':'details, set order, price, photo, set_quantity, quantity_text, cate1, order id',
            
            isset($request['button-1-type']) && $request['button-1-type']=='BUY'? $request['title'].'||'.(isset($request['button-1-price'])?$request['button-1-price']:'').'||'.$request['image'].'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id :($request['button-1-details'].$request['title'].'||'.(isset($request['button-1-price'])?$request['button-1-price'] : '').'||'.$request['image'].'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id),            
           
            isset($request['button-2-name']) && $request['button-2-type']=='DATA'?"flow step":"none",
            isset($request['button-2-name']) && $request['button-2-type']=='DATA'?$request['button-2-name']:"",
            isset($request['button-2-name']) && $request['button-2-type']=='DATA'?'details':$request['button-2-type']=='BUY'?"SubCategories":'',
            isset($request['button-2-name']) && $request['button-2-type']=='DATA'?"set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value":"",
            isset($request['button-2-name']) && $request['button-2-type']=='DATA'?"details, set order, price, photo, set_quantity, quantity_text, cate1, order id":"",
            isset($request['button-2-name']) && $request['button-2-type']=='DATA'?$request['button-2-details'].$request['button-2-name'].'||'.(isset($request['button-2-price'])?$request['button-2-price']:'').'||'.$request['image'].'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id :"",

            "",
            "",
            "",
            "",
            "",
            self::setImage($request),
            (int)isset($request['qyantity'])?$request['qyantity']:'',
            self::setDetails($request),
            (int)'0',
            ];
            
            // dd($data ,$request);
           Sheets::spreadsheet(Session::get('id_system'))
            ->sheet('Shop Logic')->append([$data]);
           

        // }
        
        
        return true;
    }
    static public function itemUpdate($id,$request)
    { 
            $ids = Sheets::spreadsheet(Session::get('id_system'))
                            ->sheet('Shop Logic')
                            ->majorDimension('COLUMNS')
                            ->range('B:B')
                            ->all();

            foreach ($ids[0] as $key => $value) {
                if ($value==$id) {
                    $data = Sheets::spreadsheet(Session::get('id_system'))
                    ->sheet('Shop Logic')
                    ->range('A'.($key+1).':AC'.($key+1))
                    ->majorDimension('ROWS')
                    ->all();
                    
                    $data[0][0]=(boolean)isset($request['product-show'])?TRUE:FALSE;
                    $data[0][2]=self::setPrice($request, $data[0][2]);
                    $data[0][3]=isset($request['title'])?$request['title']: $data[0][3];
                    $data[0][4]=isset($request['keywords'])?$request['keywords']: $data[0][4];
                    $data[0][5]=isset($request['subtitle'])?$request['subtitle']:""; //بتع 80 حرف
                    $data[0][6]=isset($request['image'])?$request['image']:$data[0][6];
                    $data[0][7]=floatval(isset($request['parentId'])?$request['parentId']:$data[0][7]);
                    $data[0][9]= isset($request['button-1-type'])?$request['button-1-name']:$data[0][9];


                    $data[0][10]=isset($request['button-1-type']) && $request['button-1-type']=='BUY'?'SubCategories':'details';
                    $data[0][11]= isset($request['button-1-type']) && $request['button-1-type']=='BUY'?'set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value , set_field_value':'set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value';
                    $data[0][12]=isset($request['button-1-type']) && $request['button-1-type']=='BUY'?'set order, price, photo, set_quantity, quantity_text, cate1, order id':'details, set order, price, photo, set_quantity, quantity_text, cate1, order id';
                    
                    $data[0][13]= isset($request['button-1-price'])?(isset($request['title'])? $request['title']: $data[0][3]).'||'.(isset($request['button-1-price'])?$request['button-1-price']:'').'||'.(isset($request['image'])?$request['image']:$data[0][6]).'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id :(self::setDetails($request).'||'.(isset($request['title'])?$request['title']: $data[0][3] ).(isset($request['button-1-price'])?'||'.$request['button-1-price']:'').'||'.(isset($request['image'])?$request['image']:$data[0][6]).'||'.(isset($request['qyantity'])?$request['qyantity']:"-1").'||'.(isset($request['qyantity'])?"محدودة":"غير محدودة").'||0||'.$id);
                    
                    $data[0][14]=isset($request['button-2-name'])? "flow step":"none";
                    $data[0][15]=isset($request['button-2-name']) && $request['button-2-type']=='DATA' || $request['button-2-type']=='BUY'?$request['button-2-name']:'';
                    $data[0][16]=isset($request['button-2-name']) && $request['button-2-type']=='DATA'? 'details':(($request['button-2-type']=='BUY')?"SubCategories":'');
                    $data[0][17]=isset($request['button-2-name']) ?'set_field_value, set_field_value, set_field_value, set_field_value, set_field_value, set_field_value , set_field_value'.((($request['button-2-type']=='DATA')?", set_field_value":'')):'';
                    $data[0][18]=isset($request['button-2-name']) ?((($request['button-2-type']=='DATA')?"details,":''))."set order, price, photo, set_quantity, quantity_text, cate1, order id":'';
                    $data[0][19]=isset($request['button-2-name']) ?((($request['button-2-type']=='DATA')?self::setDetails($request).'||':'')).$request['title'].'||'.(isset($request['button-2-price'])?$request['button-2-price']:'').'||'.((($request['button-2-type']=='DATA')?self::setImage($request).'||':$data[0][6])).'||'.(isset($request['avalible-product'])?'1':"0").'||'.(self::setImage($request,$data[0][25])).'||0||'.$id :'';
                    
                    $data[0][25]=self::setImage($request,$data[0][25]);
                    $data[0][26]=isset($request['price'])?(float)isset($request['qyantity'])?$request['qyantity']:'0':'';
                    $data[0][27]=self::setDetails($request);
                    $data[0][28]=(float)'0';
                    // dd($data,$request);

                    Sheets::spreadsheet(Session::get('id_system'))->sheet('Shop Logic')->
                    range('A'.($key+1))->update([$data[0]]);
                    break;
                }
            }
     
       return true ;

    }
    static public function chengeStatusItem($status, $id)
    {
  
        $data = Sheets::spreadsheet(Session::get('id_system'))->sheet('Shop')->range('A'.$id.':k'.$id)->majorDimension('ROWS')->all();       
        $data[0][0]=$request['titel'];
        $data[0][2]=$data[0][3]=='yes'?"":$request['price'];
        $data[0][4]=$request['detals'];
        $data[0][5]=isset($request['keyWords'])?$request['keyWords']:"";
        $data[0][6]=isset($request['image'])?$data[0][6]:$request['image'];
        $data[0][7]= isset($request['show'])?'TRUE':'FALSE';
        $data[0][8]=isset($request['qyantity'])?(FLOAT)$request['qyantity']:(FLOAT)$data[0][8];
        $data[0][9]=$data[0][9];
        $data[0][10]=$request['info'];
        Sheets::spreadsheet(Session::get('id_system'))->sheet('Shop')->
        range('A'.$id)->update([$data[0]]);
       return true ;

    }
    static private function setPrice($request,$oldPrice=null)
    {
        if (isset($request['button-2-price'])) {
           return $request['button-2-price'];
        }
        if (isset($request['button-1-price'])) {
           return $request['button-1-price'];
        }
        if (isset($oldPrice)) {
            return $oldPrice;
         }
        return 0;
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
