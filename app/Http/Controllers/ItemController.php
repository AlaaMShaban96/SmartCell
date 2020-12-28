<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Session;

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
        // dd();
        setcookie("items", serialize($items) );
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
    public function store(Request $request)
    {
        //
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
            $data=$request->all();
            $data['image']="";
            if ($request->has('image')) {
                $data['image']=$this->compress($request);
            }
            
            dd(Item::itemUpdate($id,$data));
        
       


    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
