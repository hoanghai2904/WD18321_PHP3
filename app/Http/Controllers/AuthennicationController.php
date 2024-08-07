<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

class AuthennicationController extends Controller
{
    public function login(){
        return view('login');
    }
    
    public function postLogin(UserLoginRequest $request){
        // exits bat buoc phai co trong database
        // enique k bat buoc phai co trong database
        // $request->validate([
        //     'email' => 'required|email|exists:users,email',
        //     'password' => 'required|min:8'
        // ],[
        //     'email.required' => 'email khong duoc de trong',
        //     'email.email' => 'email khong dung dinh dang',
        //     'email.exists' => 'email chua duoc dang ky',
        //     'password.required' => 'password khong duoc de trong',
        //     'password.min' => 'password qua ngan',
        // ]);
        
        $dataUserLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = $request->has('remember');
        // check nut remember tra ve true thi gui len server
        if (Auth::attempt($dataUserLogin , $remember)) {
            if ( Auth::user()->role == '1' ) {
         
                return redirect()->route('admin.product.listProducts')->with(['message' => 'Dang nhap thanh cong']);
            }else {
                echo "user";
            }
        }else {
            return redirect()->route('login')->with(['message' => 'email hoac password khong dung']);
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with(['message' => 'dang xuat thanh cong']);
    }
    public function register(){
        return view('register');
    }
    public function postRegister(UserRegisterRequest $request){

        
        $check = User::where('email', $request->email)->exists();
        if ( $check) {
            return redirect()->back()->with(['message' => 'email da ton tai']);
        }else {
            
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $newUser = User::create($data);
            // Auth::login($newUser);
            // return ve trang chu
            return redirect()->route('login')->with(['message' => 'dang ki thanh cong']);

        }
    }
}
