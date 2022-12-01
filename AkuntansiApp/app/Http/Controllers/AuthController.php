<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;
use Hash;
use Carbon\Carbon;
use DB;

class AuthController extends Controller
{
    public function loginPage(){
        $title = 'Login Page';
        return view('auth.login_page',compact('title'));
    }
    public function registerPage(){
        $title = 'Register Page';
        return view('auth.register_page',compact('title'));
    }
    public function doRegister(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,[
            'username' => 'required',
            'name' => 'required',
            'password' => 'required|same:c_password',
            'c_password' => 'required'
        ],
        ['password.same' => 'Password and Re-type Password must be same',
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error',$validator->errors());
        }
        DB::beginTransaction();
        try{
            User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'role' => 'user',
                'last_login' => Carbon::now()->toDateTimeString(),
            ]);
            DB::commit();
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error','There was an error, please call admin');
        }
        return redirect('/login')->with('success','Your account has been created');
    }
    public function doLogin(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,[
            'username' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error',$validator->errors());
        }
        DB::beginTransaction();
        try {
            if(!Auth::attempt(['username' => $data['username'], 'password' => $data['password']])){
                return redirect()->back()->with('error','Invalid username or password');
            }
            else {
                $user = User::where('username',$data['username'])->first();
                $request->session()->put('token_login', Hash::make($user->id));
                $request->session()->put('timestamp', Carbon::now()->toDateTimeString());
                return redirect('dashboard');
            }
            DB::commit();
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error',$validator->errors());
        }
    }
    public function logout(){
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }
}
