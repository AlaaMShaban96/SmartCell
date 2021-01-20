<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use Illuminate\Support\Facades\Session;


class TeamController extends Controller
{
    protected $db;
    public function __construct() {
        try {
            $this->db = app('firebase.firestore')->database();

        } catch (\Throwable $th) {
            return view('login');
        }
       


    }
    public function index()
    {
        $users=[];
        try {
            $usersEmail=$this->db->collection('Stores')->document(Session::get('store_id'))->snapshot()['users'];
            foreach ($usersEmail as $key => $email) {
                $user=$this->db->collection('users')->document($email)->snapshot();
                array_push($users,$user->data());
            }
        } catch (\Throwable $th) {
            return view('login');
        }
        return view('Dashbord.team.index',compact('users'));
    }
    public function store(TeamRequest $request)
    {
        // dd($request);
        $user = $this->db->collection('users')->document($request->email);

        $user->set([
          'name' => $request->name,
          'email' => $request->email,
          'phoned'  => '0927780208',
          'rule'  => $request->rule,
          'store_id'  =>Session::get('store_id') ,
        ]); 
        $store=$this->db->collection('Stores')->document(Session::get('store_id'))->snapshot();
        $emails=$store['users'];
        array_push($emails,$request->email);
        $this->db->collection('Stores')->document(Session::get('store_id'))->update([
            ['path' => 'users','value' => $emails]
          ]); 
        Session::flash('message', 'تم اضافة المستخدم  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }
    public function update(TeamRequest $request,$email)
    {
            $user = $this->db->collection('users')->document($email)->update([
            ['path' => 'name','value' => $request->name],
            // ['path' => 'email','value' => $request->email],
            ['path' => 'phoned','value' => $request->phoned],
            ['path' => 'rule','value' => $request->rule],
          ]); 
       
        Session::flash('message', 'تم تعدبل المستخدم  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }
    public function destroy($email)
    {
        # code...document('8suVf4FphzZLuTFJtdFe')->delete(); 
        $this->db->collection('users')->document($email)->delete(); 
        $store=$this->db->collection('Stores')->document(Session::get('store_id'))->snapshot();
        $emails=array_diff($store['users'],[$email]);
        $this->db->collection('Stores')->document(Session::get('store_id'))->update([
            ['path' => 'users','value' => $emails]
          ]); 
        Session::flash('message', 'تم حدف المستخدم  بنجاح'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }
}
