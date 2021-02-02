<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use GuzzleHttp\Client;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Http;
use Revolution\Google\Sheets\Facades\Sheets;



class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $items=Item::allItems();
        // dd($categories);
        // dd($items);
        $link="/منتجات";
        return view('Dashbord.item.index',compact('items','link'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemUpdateRequest $request)
    {   
        $data=$request->all();
        $data['image']="";
        if ($request->has('image')) {
            $data['image']=$this->compress($request);
        }
        
        // dd($data);
        // try {
            Item::createItems( $data);
        // } catch (\Throwable $th) {
        //     Session::flash('message', $th.'فشلت عملية الاضافة'); 
        //     Session::flash('alert-class', 'alert-danger'); 
        //     return ;
        // }
        Session::flash('message', 'تم اضافة المنتج  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
       

        
    }
    public function storeCategory(CategoryRequest $request)
    {   
        $data=$request->all();
        $data['image']="";
        $data['category']="yes";
        if ($request->has('image')) {
            $data['image']=$this->compress($request);
        }
        

        try {
            Category::createCategory( $data);
        } catch (\Throwable $th) {
            Session::flash('message', $th.'فشلت عملية الاضافة'); 
            Session::flash('alert-class', 'alert-danger'); 
            return ;
        }
        Session::flash('message', 'تم اضافة المنتج  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
       

        
    }
    public function updateCategory(CategoryRequest $request,$id)
    {   
        $data=$request->all();
        $data['image']="";
        $data['category']="yes";
        if ($request->has('image')) {
            $data['image']=$this->compress($request);
        }
        

        try {
            Category::updateCategory( $data,$id);
        } catch (\Throwable $th) {
            Session::flash('message', $th.'فشلت عملية التعديل'); 
            Session::flash('alert-class', 'alert-danger'); 
            dd($th) ;
        }
        Session::flash('message', 'تم تعديل الصنف  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
       

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, $id)
    {
        // dd($request->all());
        $data=$request->all();
        $data['image']="";
        if ($request->has('image')) {
            $data['image']=$this->compress($request);
        }
        try {
            Item::itemUpdate($id,$data);
        } catch (\Throwable $th) {
            Session::flash('message', $th.'فشلت عملية التعديل'); 
            Session::flash('alert-class', 'alert-danger'); 
            return $th;
        }
        Session::flash('message', 'تم التعديل بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        // try {
            // $response =Http::post('https://sheets.googleapis.com/v4/spreadsheets/'.Session::get('sheet_id').':batchUpdate', 
            //    )->json();
        //     Session::flash('message', 'تم التعديل بنجاح'); 
        //     Session::flash('alert-class', 'alert-success'); 

        // } catch (\Throwable $th) {
        //     Session::flash('message', 'فشلت عملية التعديل'); 
        //     Session::flash('alert-class', 'alert-danger'); 
        // }


            try {
                $batchUpdateRequest = new \Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array(
                    'requests' => array(
                      'deleteDimension' => array(
                          'range' => array(
                              'sheetId' => 1247890525, // the ID of the sheet/tab shown after 'gid=' in the URL
                              'dimension' => "ROWS",
                              'startIndex' => 10, // row number to delete
                              'endIndex' => 11
                          )
                      )    
                    )
                ));
                // dd('done',$batchUpdateRequest);
                $result = Sheets::getService()->spreadsheets->batchUpdate(Session::get('sheet_id'), $batchUpdateRequest);
                dd('done',$result);

            } catch (\Throwable $th) {
                dd($th);
            }
        
    }
  
    private function compress(Request $request)
    {
        $photo =  $request->file('image');
        $img = Image::make($photo->getRealPath())->resize(466, 466)->save('storage/x.jpg');
        $file = base64_encode(file_get_contents(public_path('storage/x.jpg')));
        $client = new Client(['base_uri' => 'https://api.imgbb.com']);
        $response = $client->request('POST', '/1/upload', ['form_params' => [
            'key' => '10d7821a327b25dfa51b8fd036a64cac',
            'image' => $file,
            'name' => Session::get('store_name').Carbon::now()->toDateTimeString(),
        ]]);
        $data=json_decode($response->getBody());
        return $data->data->url;
    }  
}
