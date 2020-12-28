<?php

namespace App\Http\Controllers\Admin;

use App\Manufacture;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManufactureController extends Controller
{
    //Hiển Thị Danh Sách Hãng Sản Xuất
    public function getManuShow(){
        $manufacture = manufacture::all();
        $count_manu = count($manufacture);
        $arr = [
            'data'=>$manufacture,
            'count_manu'=>$count_manu
        ];
        return view('backend.manufacture',$arr);
    }
    //Chức Năng Thêm Hãng Sản Xuất
    public function postManuShow(Request $request){
        $manu_name = $request->manu_name;
        $filename = $request->img->getClientOriginalName();
        $time = time();
        $filename = rand(0,99999).$time.$filename;
        $manu_find = manufacture::where('manu_name',$manu_name)->get()->count();
        if($manu_find == 0){
            $manufacture = new manufacture;
            $manufacture['manu_name'] = $manu_name;
            $manufacture['manu_image'] = $filename;
            $manufacture->save();
            $request->img->storeAs('image',$filename);
            return redirect(url('admin/manufacture/show'));
        }else{
            return redirect(url('admin/manufacture/show'))->withInput()->with('error','Tên Hãng Sản Xuất Đã Tồn Tại!!!');
        }
    }
    //Hiển Thị Trang Sửa hãng Sản Xuất
    public function getManuEdit($id){
        $manu_name = manufacture::find($id)->manu_name;
        $manu_image = manufacture::find($id)->manu_image;
        $arr = [
            'manu_name'=>$manu_name,
            'manu_image'=>$manu_image
        ];
        return view('backend.editmanufacture',$arr);
    }
    //Chức Năng Sửa Hãng Sản Xuất
    public function postManuEdit($id,Request $request){
        $manu_name = $request->manu_name;
        $manufacture_name = manufacture::find($id)->manu_name;
        $manufacture_image = manufacture::find($id)->manu_image;
        if($manu_name == $manufacture_name){
            if ($request->hasFile('img')) {
                $filename = $request->img->getClientOriginalName();
                $time = time();
                $filename = rand(0, 99999).$time.$filename;
                $manufacture = new manufacture;
                $arr['manu_image'] = $filename;
                $manufacture->where('manu_id', $id)->update($arr);
                $request->img->storeAs('image',$filename);
                if(is_file('lib/storage/app/image/'.$manufacture_image)){
                    unlink('lib/storage/app/image/'.$manufacture_image);
                }
                return redirect(url('admin/manufacture/show'));
            }
            return redirect(url('admin/manufacture/show'));
        }else{
            $manu_find = manufacture::where('manu_name',$manu_name)->get()->count();
            if($manu_find == 0){
                if ($request->hasFile('img')) {
                    $filename = $request->img->getClientOriginalName();
                    $time = time();
                    $filename = rand(0, 99999).$time.$filename;
                    $manufacture = new manufacture;
                    $arr['manu_name'] = $manu_name;
                    $arr['manu_image'] = $filename;
                    $manufacture->where('manu_id', $id)->update($arr);
                    $request->img->storeAs('image',$filename);
                    if(is_file('lib/storage/app/image/'.$manufacture_image)){
                        unlink('lib/storage/app/image/'.$manufacture_image);
                    }
                    return redirect(url('admin/manufacture/show'));
                }else{
                    $manufacture = new manufacture;
                    $arr['manu_name'] = $manu_name;
                    $manufacture->where('manu_id', $id)->update($arr);
                    return redirect(url('admin/manufacture/show'));
                }
            }else{
                return back()->withInput()->with('error','Tên Hãng Sản Xuất Đã Tồn Tại!!!');
            }
        }
        
    }
    //Chức Năng Xóa Hãng Sản Xuất
    public function getManuDelete($id){
        $product = Product::where('manu_id',$id)->count();
        if($product > 0){
            return back()->withInput()->with('errors','Hãng Sản Xuất Có Sản Phẩm Không Thể Xóa');
        }
        $manu = manufacture::find($id);
        $manu_image = manufacture::find($id)->manu_image;
        $manu->delete();
        if(is_file('lib/storage/app/image/'.$manu_image)){
            unlink('lib/storage/app/image/'.$manu_image);
        }
        return back();
    }
}
