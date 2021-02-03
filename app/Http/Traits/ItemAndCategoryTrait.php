<?php

namespace App\Http\Traits;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use Revolution\Google\Sheets\Facades\Sheets;



trait ItemAndCategoryTrait {

    static public function deleteItemOrCategory($id)
    {
        $ids = Sheets::spreadsheet(Session::get('sheet_id'))
        ->sheet('Shop Logic')
        ->majorDimension('COLUMNS')
        ->range('B:B')
        ->all();

        foreach ($ids[0] as $key => $value) {
        if ($value==$id) {
            echo $key;
                $batchUpdateRequest = new \Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array(
                    'requests' => array(
                      'deleteDimension' => array(
                          'range' => array(
                              'sheetId' => 1247890525, // the ID of the sheet/tab shown after 'gid=' in the URL
                              'dimension' => "ROWS",
                              'startIndex' => $key, // row number to delete
                              'endIndex' => $key+1
                          )
                      )    
                    )
                ));
                Sheets::getService()->spreadsheets->batchUpdate(Session::get('sheet_id'), $batchUpdateRequest);
                break;
            }
        }
    
    }
}