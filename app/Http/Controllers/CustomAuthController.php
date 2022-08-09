<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function registration(){
        return view("auth.registration");
    }

    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if($res){
            return back()->with('success','User registered successfully!');
            return redirect('login');
        }else{
            return back()->with('fail','Registration failed!');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','Incorrect password!');
            }
        }else{
            return back()->with('fail','Email not registered!');
        }
    }

    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

    public function editUser(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('edituser',compact('data'));
    }

    public function updateUser(Request $request, User $user){
        $user = User::where('id','=',Session::get('loginId'))->first();
        $request->validate([
            'email'=>'email'
            // 'email'=>'email|unique:users'.$user->id,
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        session()->flash('success', 'Profile updated successfully!');

        return redirect('dashboard');
        
    }

    public function deleteUser(User $user){
        $user = User::where('id','=',Session::get('loginId'));
        $user->delete();
        return redirect('login');
    }
}
