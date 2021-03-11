<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use GuzzleHttp\Client;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ItemUpdateRequest;
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
        $data['image']=null;
        if ($request->has('image')) {
            $data['image']=$this->compress($request);
        }
        
        
        try {
            Item::createItems( $data);
            // dd($data);
        } catch (\Throwable $th) {
            Session::flash('message', 'فشلت عملية الاضافة'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        Session::flash('message', 'تم اضافة المنتج  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
       

        
    }
    public function storeCategory(CategoryRequest $request)
    {   
        $data=$request->all();
        $data['image']=null;
        $data['category']="yes";
        if ($request->has('image')) {
            $data['image']=$this->compress($request);
        }
        

        try {
            Category::createCategory( $data);
        } catch (\Throwable $th) {
            Session::flash('message', 'فشلت عملية الاضافة'); 
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
            Session::flash('message', 'فشلت عملية التعديل'); 
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
        $data['image']=null;
        if ($request->has('image')) {
            $data['image']=$this->compress($request);
        }
        try {
            Item::itemUpdate($id,$data);
        } catch (\Throwable $th) {
            Session::flash('message', $th.'فشلت عملية التعديل'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
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
            try { 
                Item::deleteItemOrCategoryOrLocation($id,'Shop Logic','1247890525');
            } catch (\Throwable $th) {
                
                return view('errors.404');
            }
            Session::flash('message', 'تم الحدف بنجاح'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect()->back();  
    }
  
    private function compress(Request $request)
    {
        $photo =  $request->file('image');
        $nameFile=Session::get('store_name').(string) Str::uuid().'.png';
        $img = Image::make($photo->getRealPath())->resize(466, 466)->save('storage/'.$nameFile);
        $s3 = Storage::disk('s3');
        $filePath = 'images/' .Session::get('store_name').(string) Str::uuid();
        $s3->put($filePath, file_get_contents(public_path('storage/'. $nameFile)), 'public');
        $path='https://smartcellimage.s3.af-south-1.amazonaws.com/'.$filePath;
        return $path;

    } 
}
