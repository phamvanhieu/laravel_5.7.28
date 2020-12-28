<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use  Auth;
use App\User;
class LoginController extends Controller
{
    //Hien Thi Trang Dang Ky User
    public function getRegister(){
        return view('frontend.register');
    }
    //Xu Ly Trang Dang Ky User
    public function postRegister(LoginRequest $request){
        $fullname = $request->fullname;
        // $address = $request->address;
        // $phone = $request->phone;
        $email = $request->email;
        // $country = $request->country;
        $password = $request->password;
        $repassword = $request->repassword;
        $user = User::where('email','=',$email)->get();
        //Kiem Tra Xem Ten Username Co Nguoi Su Dung Chua Neu Co Thi Bao Loi Neu Khong Thi Tiep Tuc
        if(count($user) > 0){
            return back()->withInput()->with('error','Email đã được sử dụng!!!');
            
        }else{
            if($password == $repassword){
                $password = bcrypt($password);
                $user = new User;
                $user->email = $email;
                $user->password = $password;
                $user->fullname = $fullname;
                // $user->username = $username;
                // $user->address = $address;
                // $user->phone = $phone;
                // $user->country = $country;
                $user->save();
                return redirect()->intended(url('login'))->withInput()->with('alert','Đăng Ký Thành Công!!!');
            }else{
                return back()->withInput()->with('error','Mật Khẩu không trùng Nhau!!!');
            }
        }
        
    }
    public function getLogin(){
        return view('frontend.login');
    }
    public function postLogin(Request $loginRequest){
        $arr = ['email' => $loginRequest->email, 'password' => $loginRequest->password];
        if($loginRequest->remember == "Remember Me"){
            $remember = true;
        }else{
            $remember = false;
        }
        if(Auth::attempt($arr,$remember)){
            return redirect()->intended(url('login'));
        }else{
            return back()->withInput()->with('error','Tài Khoản Hoặc Mật Khẩu Chưa Đúng!!!');
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->intended(url('login'));
    }

}
