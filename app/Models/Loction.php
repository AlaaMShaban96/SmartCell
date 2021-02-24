<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\ItemAndCategoryTrait;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Loction extends Model
{
    use HasFactory;
    use ItemAndCategoryTrait;

    
    static public function getLoctions()
    {
        return Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Cities info Logic')->range('')->majorDimension('')->get();    
       
    }
    static public function updateLoctions( $request)
    {
        // $loaction = Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Cities info Logic')->range('A'.($request->id).':Z'.($request->id))->majorDimension('ROWS')->all();
        self::updateed($request,'Cities info Logic', $request['name']);

        // $loaction[0][2]=(boolean)$request->show=='on'?TRUE:FALSE;
        // $loaction[0][3]=(FLOAT)$request->price;
        // $loaction[0][5]=(FLOAT)$loaction[0][5];
        // Sheets::spreadsheet(Session::get('sheet_id'))
        //     ->sheet('Manage Cities')
        //     ->range('A'.$request->id)
        //     ->update([$loaction[0]]);
    }
    static public function after($thisx, $inthat)
    {
        if (!is_bool(strpos($inthat, $thisx)))
        return substr($inthat, strpos($inthat,$thisx)+strlen($thisx));
    }
    static public function before($thisx, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $thisx));    
    }
    static public function createLoctions($request)
    {
        self::createed($request,'Cities info Logic', $request['name']);
        // dd($request);
    }
       
    static public function createed($request, $sheetName,$titelName)
    {
        $titelID=self::before('#', $request['titel']);
         //    dd($titelID);
        // dd(self::before('#', $request['titel']));
        $ids = Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet($sheetName)
        ->majorDimension('COLUMNS')
        ->range('Z:Z')
        ->all();
            
        $data=[
            (boolean) $request['show']=='on'?TRUE:FALSE,
            $titelName,
            (FLOAT)$request['price'],
            ("السعر".$request['price']."دينار "),
            $request['image'],
            '',
            'flow step',
            $sheetName=='Cities info Logic'?('تصفح العروض😎'):'اختيار',
            'SubCities',
            $sheetName=='Cities info Logic'?('set_field_value'):'set_field_value, set_field_value, set_field_value',
            $sheetName=='Cities info Logic'?'order id':'Delivery price, Get City, order id',
            $sheetName=='Cities info Logic'?(FLOAT)(count($ids[0])+1):$request['price'].'||'.$titelName.'||'. (count($ids[0])+1),
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            (FLOAT)$titelID,
            (FLOAT)(count($ids[0])+1),
        ];
        // dd($data,$request);
        Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet($sheetName)->append([$data]);
        if ($request['type']==1) {

            $loaction = Sheets::spreadsheet(Session::get('sheet_id'))->sheet($sheetName)->range('A'.($titelID).':Z'.($titelID))->majorDimension('ROWS')->all();
            $loaction[0][0]=(boolean)$loaction[0][0];
            $loaction[0][3]='اضغظ '. $loaction[0][1].' لرؤية المناطق';
            $loaction[0][2]="";
            $loaction[0][7]=$loaction[0][1];
            $loaction[0][11]=$loaction[0][11];
            $loaction[0][24]=(FLOAT)$loaction[0][24];
            $loaction[0][25]=(FLOAT)$loaction[0][25];
            Sheets::spreadsheet(Session::get('sheet_id'))
                ->sheet($sheetName)
                ->range('A'.$titelID)
                ->update([$loaction[0]]);
        }
        if ($sheetName=='Cities info Logic') {
            self::createed($request,'Cities Logic', self::after('#', $request['titel']).' '.$request['name']);
        }

  
    }
    static public function updateed($request, $sheetName,$titelName)
    {
        // dd($request);
        $titelID=self::before('#', $request['titel']);
        $loaction = Sheets::spreadsheet(Session::get('sheet_id'))->sheet($sheetName)->range('A'.($request['id']).':Z'.($request['id']))->majorDimension('ROWS')->all();
        // $titelID=$loaction[0][24];

        $loaction[0][0]= (boolean) $request['show']=='on'?TRUE:FALSE;
        $loaction[0][1]=$titelName;
        $loaction[0][2]=(FLOAT)$request['price'];
        $loaction[0][3]=("السعر".$request['price']."دينار ");
        $loaction[0][4]=isset($request['image'])?$request['image']:$loaction[0][4];
        $loaction[0][7]=$sheetName=='Cities info Logic'?('تصفح العروض😎'):'اختيار';
        $loaction[0][9]=$sheetName=='Cities info Logic'?('set_field_value'):'set_field_value, set_field_value, set_field_value';
        $loaction[0][10]=$sheetName=='Cities info Logic'?'order id':'Delivery price, Get City, order id';
        $loaction[0][11]=$sheetName=='Cities info Logic'?$loaction[0][11]:$request['price'].'||'.$titelName.'||'.$loaction[0][11];
        Sheets::spreadsheet(Session::get('sheet_id'))
            ->sheet($sheetName)
            ->range('A'.$request['id'])
            ->update([$loaction[0]]);
            
         //    dd($$request['id']);
        // dd(self::before('#', $request['titel']));
       
        // $data=[
        //     (boolean) $request['show']=='on'?TRUE:FALSE,
        //     $titelName,
        //     (FLOAT)$request['price'],
        //     ("السعر".$request['price']."دينار "),
        //     $request['image'],
        //     '',
        //     'flow step',
        //     $sheetName=='Cities info Logic'?('تصفح العروض😎'):'اختيار',
        //     'SubCities',
        //     $sheetName=='Cities info Logic'?('set_field_value'):'set_field_value, set_field_value, set_field_value',
        //     $sheetName=='Cities info Logic'?'order id':'Delivery price, Get City, order id',
        //     $sheetName=='Cities info Logic'?(FLOAT)(count($ids[0])+1):$request['price'].'||'.$titelName.'||'. (count($ids[0])+1),
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     '',
        //     (FLOAT)$titelID,
        //     (FLOAT)(count($ids[0])+1),
        // ];
        // // dd($data,$request);
        // Sheets::spreadsheet(Session::get('sheet_id'))
        // ->sheet($sheetName)->append([$data]);
        if ($request['type']==1) {

            $loaction = Sheets::spreadsheet(Session::get('sheet_id'))->sheet($sheetName)->range('A'.($titelID).':Z'.($titelID))->majorDimension('ROWS')->all();
            $loaction[0][0]=(boolean)$loaction[0][0];
            $loaction[0][3]='اضغظ '. $loaction[0][1].' لرؤية المناطق';
            $loaction[0][2]="";
            $loaction[0][7]=$loaction[0][1];
            $loaction[0][11]=$loaction[0][11];
            $loaction[0][24]=(FLOAT)$loaction[0][24];
            $loaction[0][25]=(FLOAT)$loaction[0][25];
            Sheets::spreadsheet(Session::get('sheet_id'))
                ->sheet($sheetName)
                ->range('A'.$titelID)
                ->update([$loaction[0]]);
        }
        if ($sheetName=='Cities info Logic') {
            self::updateed($request,'Cities Logic', self::after('#', $request['titel']).' '.$request['name']);
        }

  
    }
}
