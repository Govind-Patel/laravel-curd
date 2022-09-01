<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
class UserController extends Controller
{
    function showloginform(){
        return view('admin.users.login');
    }
    function login(Request $request){
        // print_r($request->all()); die;
        $getUser = User::where('email',$request->email)->first();     
        if(!empty($getUser)){
            if(Hash::check($request->password,$getUser->password)){
                $request->session()->put('loginUser',$getUser);
                // echo $request->session()->get('loginUser');
                
                // die; 
                return redirect('dashboard')->with('success','user login Successfully');
            }
            else { 
                return redirect('/')->with('error','your password dos`t match');
            }

        }
        else { 
            return redirect('/')->with('error','wrong email id');
        }

    }
    function dashboard(Request $request){
        // echo $request->session()->get('loginUser'); 
        
        // die();
        return view('admin.users.dashboard');
    }
    function logout(Request $request){
        $request->session()->forget('loginUser');
        return redirect('/')->with('success','logout user');
    }
    function register(){
        return view('admin.users.register');
    }
    function saveData(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'address'=>'required',
            'password'=>'required|min:6',
            'mobile'=>'required|digits:10'

        ]);
        $save = [
            "name"=>$request->name,
            "email"=>$request->email,
            "address"=>$request->address,
            "password"=>Hash::make($request->password),
            "mobile"=>$request->mobile
        ];
        $saveData= User::create($save);
        return redirect('/')->with('success','User Register Successfully');
    }
    function userDetails(Request $request){
        // echo $request->session()->get('loginUser');
        // echo Session::has('loginUser');
        // print_r($request->session()->all());
        // die; 
        $getdata['showData']=User::paginate(2);
        return view('admin.users.userList')->with($getdata);
    }
    function editUser(Request $request){
        $getdata['userGet']= User::where('id',$request->row_id)->first();
        return view('admin.users.editUser', $getdata);
    }
    function updateData(Request $request){
        $this->validate($request,[
        'name'=>'required',
        'email'=>'required|email',
        'address'=>'required',
        'password'=>'required|min:6',
        'mobile'=>'required|digits:10'
       ]);
        $updateData = [
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'password'=>$request->password,
            'mobile'=>$request->mobile
        ];
        User::where('id',$request->row_id)->update($updateData);
        return redirect('userList')->with('success','User update successfully');
    }
    function deleteUser(Request $request){
        // echo $request->id; die;
        User::where('id',$request->id)->delete();
        return redirect('userList')->with('success','Deleted user data successfully');
    }
}
