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
        $object=[]; 
        foreach ($items as $value) {
            
            $object[] = [
                'active'=>$value[0],
                'product_id'=>$value[1],
                'price'=>$value[2],
                'title'=>$value[3],
                'keywords'=>$value[4],
                'subtitle'=>$value[5],
                'image'=>$value[6],
                'Category'=>$value[7],
                'addButton1'=>$value[8],
                'button1Caption'=>$value[9],
                'button1Target'=>$value[10],
                'button1Action'=>$value[11],
                'button1ActionName'=>$value[12],
                'button1ActionValue'=>$value[13],
                'addButton2'=>$value[14],
                'button2Caption'=>$value[15],
                'button2Target'=>$value[16],
                'button2Action'=>$value[17],
                'button2ActionName'=>$value[18],
                'button2ActionValue'=>$value[19],
                'addButton3'=>$value[20],
                'button3Caption'=>$value[21],
                'button3Target'=>$value[22],
                'button3Action'=>$value[23],
                'button3ActionName'=>$value[24],
                'detail_image'=>$value[25],
                'avalible-product'=>$value[26],
                'details'=> $value[27],
                'category_or_not'=>$value[28],
            ];
        }
        // dd( $object);
        $link="/منتجات";
        return view('Dashbord.item.index',compact('object','link'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemUpdateRequest $request)
    {   
        switch ($request->create) {
            case 0:

               $this->update($request,$request->productId);
                break;
            
            case 1:
                switch ($request->category) {
                    case '1':
        
                        $this->storeCategory($request);
        
                        break;
                    
                    case '0':

                            try {
                                $data=$request->all();
                                $data['image'] = null;
                                 $data['button-1-image'] = null;
                                 $data['button-2-image'] =null;
                                 if ($request->has('image')) {
                                    $data['image']=$this->compress($request,'image');
                                }
                                if ($request->has('button-1-image')) {
                                    $data['button-1-image']=$this->compress($request,'button-1-image');
                                }
                                if ($request->has('button-2-image')) {
                                    $data['button-2-image']=$this->compress($request,'button-2-image');
                                }
                                Item::createItems( $data);
                            } catch (\Throwable $th) {
                                Session::flash('message', 'فشلت عملية الاضافة'); 
                                Session::flash('alert-class', 'alert-danger'); 
                                return redirect()->back();
                            }
        
                        break;
                    
                    default:
                        # code...
                        break;
                }
                Session::flash('message', 'تم اضافة المنتج  بنجاح'); 
                Session::flash('alert-class', 'alert-success'); 
                
                
        }
       
        return redirect()->back();
        
       

        
    }
    public function storeCategory(ItemUpdateRequest $request)
    {   
        $data=$request->all();
        $data['image']=null;
        $data['button-1-image']=null;
        $data['category']="yes";
        if ($request->has('image')) {
            $data['image']=$this->compress($request,'image');
        }
        if ($request->has('button-1-image')) {
            $data['button-1-image']=$this->compress($request,'button-1-image');
        }
        if ($request->has('button-2-image')) {
            $data['button-2-image']=$this->compress($request,'button-2-image');
        }

        try {
            Category::createCategory( $data) ;
        } catch (\Throwable $th) {
            Session::flash('message', 'فشلت عملية الاضافة'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        Session::flash('message', 'تم اضافة المنتج  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
       

        
    }
    public function updateCategory(ItemUpdateRequest $request,$id)
    {   
        $data=$request->all();
        $data['image']=null;
        $data['category']="yes";
        if ($request->has('image')) {
            $data['image']=$this->compress($request);
        }
        if ($request->has('button-1-image')) {
            $data['button-1-image']=$this->compress($request,'button-1-image');
        }
        if ($request->has('button-2-image')) {
            $data['button-2-image']=$this->compress($request,'button-2-image');
        }

        // try {
            Category::updateCategory( $data,$id);
        // } catch (\Throwable $th) {
        //     Session::flash('message', 'فشلت عملية التعديل'); 
        //     Session::flash('alert-class', 'alert-danger'); 
        // }
        // Session::flash('message', 'تم تعديل الصنف  بنجاح'); 
        // Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
       

        
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
              

        switch ($request->category) {
            case '1':
                // dd($request, $id);
                $this->updateCategory($request, $id);

                break;
            
            case '0':

                // dd($request->all());
                        $data=$request->all();
                        $data['image']=null;
                        $data['image']=null;
                        $data['button-1-image']=null;
                        $data['button-2-image']=null;
                        $data['category']="yes";

                        if ($request->has('image')) {
                            $data['image']=$this->compress($request,'image');
                        }
                        if ($request->has('button-1-image')) {
                            $data['button-1-image']=$this->compress($request,'button-1-image');
                        }
                        if ($request->has('button-2-image')) {
                            $data['button-2-image']=$this->compress($request,'button-2-image');
                        }
                        
                        // try {
                            Item::itemUpdate($id,$data);
                        // } catch (\Throwable $th) {
                        //     Session::flash('message', 'فشلت عملية التعديل'); 
                        //     Session::flash('alert-class', 'alert-danger'); 
                        //     return redirect()->back();
                        // }
                break;

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
                Session::flash('message', 'فشلت عملية الحدف'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect()->back();
                // return view('errors.404');
            }
            Session::flash('message', 'تم الحدف بنجاح'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect()->back();  
    }
  
    private function compress(Request $request,$name=null)
    {

        if ($request->has('image') && $name=='image') {
            $photo =  $request->file('image');
        }
        if ($request->has('button-1-image') && $name=='button-1-image') {
            $photo =  $request->file('button-1-image');
        }
        if ($request->has('button-2-image') && $name=='button-2-image') {
            $photo =  $request->file('button-2-image');
        }

        $nameFile=Session::get('store_name').(string) Str::uuid().'.png';
        $img = Image::make($photo->getRealPath())->resize(466, 466)->save('storage/'.$nameFile);
        $s3 = Storage::disk('s3');
        $filePath = 'images/' .Session::get('store_name').(string) Str::uuid();
        $s3->put($filePath, file_get_contents(public_path('storage/'. $nameFile)), 'public');
        $path='https://smartcellimage.s3.af-south-1.amazonaws.com/'.$filePath;
        return $path;

    } 
}
