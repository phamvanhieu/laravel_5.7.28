<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class CategoryController extends Controller
{
    //Hiển Thị Danh Sách Danh Mục
    public function getCateShow(){
        $category = Category::all();
        $count_cate = count($category);
        $arr = [
            'data'=>$category,
            'count_cate'=>$count_cate
        ];
        return view('backend.category',$arr);
    }
    //Chức Năng Thêm Danh Mục
    public function postCateShow(Request $request){
        $cate_name = $request->cate_name;
        $cate_find = Category::where('cate_name',$cate_name)->get()->count();
        if($cate_find == 0){
            $category = new Category;
            $arr['cate_name'] = $cate_name;
            $category->insert($arr);
            return redirect(url('admin/category/show'));
        }else{
            return redirect(url('admin/category/show'))->withInput()->with('error','Tên Danh Mục Đã Tồn Tại!!!');
        }
    }
    //Hiển Thị Trang Sửa Danh Mục
    public function getCateEdit($id){
        $cate_name = Category::find($id)->cate_name;
        $arr = [
            'cate_name'=>$cate_name,
        ];
        return view('backend.editcategory',$arr);
    }
    //Chức Năng Sửa Danh Mục
    public function postCateEdit($id,Request $request){
        $cate_name = $request->cate_name;
        $category_name = Category::find($id)->cate_name;
        if($cate_name == $category_name){
            return redirect(url('admin/category/show'));
        }else{
            $cate_find = Category::where('cate_name',$cate_name)->get()->count();
            if($cate_find == 0){
                $category = new Category;
                $arr['cate_name'] = $cate_name;
                $category->where('cate_id',$id)->update($arr);
                return redirect(url('admin/category/show'));
            }else{
                return back()->withInput()->with('error','Tên Danh Mục Đã Tồn Tại!!!');
            }
        }
        
    }
    //Chức Năng Xóa Danh Mục
    public function getCateDelete($id){
        $cate = Category::find($id);
        $product = Product::where('cate_id',$id)->count();
        if($product > 0){
            return back()->withInput()->with('errors','Danh Mục Có Sản Phẩm Không Thể Xóa');
        }
        $cate->delete();
        return back();
    }
}
