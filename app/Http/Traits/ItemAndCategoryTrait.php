<?php

namespace App\Http\Traits;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use Revolution\Google\Sheets\Facades\Sheets;



trait ItemAndCategoryTrait {

    static public function deleteItemOrCategoryOrLocation($id,$sheetName,$sheetId)
    {
        if ($sheetName=='Shop Logic') {
                $ids = Sheets::spreadsheet(Session::get('id_system'))
                ->sheet($sheetName)
                ->majorDimension('COLUMNS')
                ->range('B:B')
                ->all();
        
                foreach ($ids[0] as $key => $value) {
                if ($value==$id) {
                    // Storage::disk('s3')->delete('images/'.substr(strrchr(Session::get('logo'), "/"), 1));// for delete photos
                    $batchUpdateRequest = new \Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array(
                            'requests' => array(
                            'deleteDimension' => array(
                                'range' => array(
                                    'sheetId' => $sheetId, // the ID of the sheet/tab shown after 'gid=' in the URL
                                    'dimension' => "ROWS",
                                    'startIndex' => $key, // row number to delete
                                    'endIndex' => $key+1
                                )
                            )    
                            )
                        ));
                        Sheets::getService()->spreadsheets->batchUpdate(Session::get('id_system'), $batchUpdateRequest);
                        break;
                    }
                }
        }else{
            $ids = Sheets::spreadsheet(Session::get('id_system'))
            ->sheet($sheetName)
            ->majorDimension('COLUMNS')
            ->range('Z:Z')
            ->all();

            $batchUpdateRequest = new \Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array(
                'requests' => array(
                  'deleteDimension' => array(
                      'range' => array(
                          'sheetId' => $sheetId, // the ID of the sheet/tab shown after 'gid=' in the URL
                          'dimension' => "ROWS",
                          'startIndex' => $id-1, // row number to delete
                          'endIndex' => $id,
                      )
                  )    
                )
            ));
            
            Sheets::getService()->spreadsheets->batchUpdate(Session::get('id_system'), $batchUpdateRequest);
        }
        
    
    }
}