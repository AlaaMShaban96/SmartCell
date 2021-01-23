<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;


class Loction extends Model
{
    use HasFactory;
    
    static public function getLoctions()
    {
        return Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Manage Cities')->range('')->majorDimension('')->get();    
       
    }
    static public function updateLoctions(Request $request)
    {
        $loaction = Sheets::spreadsheet(Session::get('sheet_id'))->sheet('Manage Cities')->range('A'.($request->id).':AV'.($request->id))->majorDimension('ROWS')->all();
    //    $loaction=$loaction[0]->toArray();
    //    dd($loaction);
        $loaction[0][2]=(boolean)$request->show=='on'?'TRUE':'FALSE';
        $loaction[0][3]=(FLOAT)$request->price;
        Sheets::spreadsheet(Session::get('sheet_id'))
            ->sheet('Manage Cities')
            ->range('A'.$request->id)
            ->update([$loaction[0]]);
    }
}
