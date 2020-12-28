<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function getUserShow(){
        $user = User::where('id','!=','0')->orderBy('id','desc')->paginate(10);
        $count_user = User::all()->count();
        $arr = [
            'data'=>$user,
            'count_user'=>$count_user
        ];
        return view('backend.user',$arr);
    }
    public function getUserAdd(){
        return view('backend.adduser');
    }
    public function postUserAdd(Request $request){
        $level = $request->level;
        $pass_admin = $request->pass_admin;
        $fullname = $request->fullname;
        $password = $request->password;
        $repassword = $request->repassword;
        $address = $request->address;
        $country = $request->country;
        $phone = $request->phone;
        $email = $request->email;
        if($level == 2 && $pass_admin == ''){
            return back()->withInput()->with('error','Phải Nhập Mật Mã Admin Để Tạo Admin Mới!!!');
        }
        $isset_email = User::where('email',$email)->count();
        if($isset_email > 0){
            return back()->withInput()->with('error','Email này đã được sử dụng!!!');
        }else{
            if($repassword == $password){
                $password = bcrypt($password);
                if($country == '------------------------------- Mời Chọn --------------------------------'){
                    return back()->withInput()->with('error','Mời Chọn Tỉnh Thành Phố!!!');
                }else{
                    $user = new User;
                    $user['email'] = $email;
                    $user['password'] = $password;
                    $user['level'] = $level;
                    $user['fullname'] = $fullname;
                    $user['phone'] = $phone;
                    $user['country'] = $country;
                    $user['address'] = $address;
                    $user->save();
                    return redirect(url('admin/user/show'))->withInput()->with('message','Thêm '.$email.' thành công');
                }
            }else{
                return back()->withInput()->with('error','Password không trùng nhau!!!');
            }
        }
        
        
    }
    public function getUserDelete($id){
        $user = User::find($id);
        if($user->level == 2){
            $admin = User::where('level',2)->count();
            if($admin == 1){
                return redirect()->back()->withInput()->with('error','Chỉ còn 1 admin duy nhất không thể xóa');
            }
        }
        $user->delete();
        return back()->withInput()->with('message','Xóa thành Công');
    }
    public function getUserEdit($id){
        $user = User::find($id);
        $arr = [
            'data'=>$user
        ];
        return view('backend.edituser',$arr);
    }
    public function postUserEdit($id,Request $request){
        $user = new User;
        $arr = [
            'fullname'  => $request->fullname,
            'phone'     => $request->phone,
            'country'   => $request->country,
            'address'   => $request->address
        ];
        $user->where('id',$id)->update($arr);
        return redirect(url('admin/user/show'))->withInput()->with('message','Sửa '.$request->fullname.' thành công');
    }
}
