<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manufacture;
use App\Product;

class ProductController extends Controller
{
    //Hiển Thị Danh Sách Sản Phẩm Từ Mới Đến Cũ
    public function getProductShow(){
        $product = Product::where('pro_id','>',0)->orderBy('pro_id','desc')->paginate(10);
        $count_product = Product::all()->count();
        $arr = [
            'data'=>$product,
            'count_product'=>$count_product
        ];
        return view('backend.product',$arr);
    }
    //Hiển Thị Trang Thêm Mới 1 Sản Phẩm
    public function getProductAdd(){
        $manufacture = Manufacture::all();
        $category = Category::all();
        $arr = [
            'manufacture'=>$manufacture,
            'category'=>$category,
        ];
        return view('backend.addproduct',$arr);
    }
    //Chức Năng Thêm Mới Sản Phẩm
    public function postProductAdd(Request $request){
        $filename = $request->img->getClientOriginalName();
        $duoi_file = explode('.',$filename);
        $count = count($duoi_file);
        $time = time();
        $filename = rand(0,999999).$time.'.'.$duoi_file[$count - 1];
        $product = new Product;
        $product->name = $request->name;
        $product->image = $filename;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->hot = $request->hot;
        $product->sale = $request->sale;
        if($request->sale >= $request->price){
            return redirect()->back()->withInput()
            ->with('error','Giá khuyến mãi phải nhỏ hơn giá bán');
        }
        $product->manu_id = $request->manu_id;
        $product->cate_id = $request->cate_id;
        $request->img->storeAs('image',$filename);
        $product->save();
        return redirect()
            ->intended(url('admin/product/show'))
            ->withInput()
            ->with('message','Thêm Sản Phẩm Thành Công');
    }
    //Chức Năng Xóa Sản Phẩm
    public function getProductDelete($id){
        $product = Product::find($id);
        $img = $product->image;
        $link_img = 'lib/storage/app/image/'.$img;
        if (is_file($link_img))
        {
            unlink($link_img);
        }
        $product->delete();
        return redirect()
            ->intended(url('admin/product/show'))
            ->withInput()
            ->with('message','Xóa Sản Phẩm Thành Công');
    }
    //Hiển Thị Trang Sửa Sản Phẩm
    public function getProductEdit($id){
        $product = Product::find($id);
        $manufacture = Manufacture::all();
        $category = Category::all();
        $arr = [
            'manufacture'=>$manufacture,
            'category'=>$category,
            'data'=>$product
        ];
        return view('backend.editproduct',$arr);
    }
    //Chức Năng Sửa Sản Phẩm
    public function postProductEdit($id,Request $request){
        $product_img = Product::find($id)->image;
        $product = new Product;
        if($request->hasFile('img')){
            $filename = $request->img->getClientOriginalName();
            $duoi_file = explode('.',$filename);
            $count = count($duoi_file);
            $time = time();
            $filename = rand(0,999999).$time.'.'.$duoi_file[$count - 1];
            $arr['image'] = $filename;
            $request->img->storeAs('image',$filename);
            if(is_file('lib/storage/app/image/'.$product_img)){
                unlink('lib/storage/app/image/'.$product_img);
            }
        }
        if($request->sale >= $request->price){
            return redirect()->back()->withInput()
            ->with('error','Giá khuyến mãi phải nhỏ hơn giá bán');
        }
        $arr['name'] = $request->name;
        $arr['price'] = $request->price;
        $arr['sale'] = $request->sale;
        $arr['description'] = $request->description;
        $arr['manu_id'] = $request->manu_id;
        $arr['cate_id'] = $request->cate_id;
        $product->where('pro_id',$id)->update($arr);
        return redirect()
            ->intended(url('admin/product/show'))
            ->withInput()
            ->with('message','Sửa Sản Phẩm Thành Công');
    }
}
