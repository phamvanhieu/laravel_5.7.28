<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Config;
use App\Manufacture;
use App\Customer;
use App\Bill;
use App\Billdetail;
use App\Author;
use App\User;
use App\Contact;
use App\Rep;
use Cart;
use Auth;
class HomeController extends Controller
{
    public function getHome(){
        $products = Product::where('hot','=',1)->orderBy('pro_id','desc')->take(8)->get();
        $arr = [
            'data'=>$products,
        ];
        return view('frontend.index',$arr);
    }
    public function getCategory($cate_id,$manu_id = NULL){
        if($manu_id != NULL){
            $cate_name = Category::find($cate_id)->cate_name;
            $manu_name = Manufacture::find($manu_id)->manu_name;
            $products = Product::where('cate_id', '=',$cate_id)
                                ->where('manu_id', '=',$manu_id)
                                ->orderBy('pro_id','desc')
                                ->paginate(8);
            $arr = [
                'data'=>$products,
                'cate_name'=>$cate_name,
                'manu_name'=>$manu_name
            ];
        }else{
            $cate_name = Category::find($cate_id)->cate_name;
            $products = Product::where('cate_id', '=',$cate_id)
                                ->orderBy('pro_id','desc')
                                ->paginate(8);
            $arr = [
                'data'=>$products,
                'cate_name'=>$cate_name
            ];
            
        }
        return view('frontend.category',$arr);
    }
    public function getManufacture($manu_id){
        $manu_name = Manufacture::find($manu_id)->manu_name;
        $products = Product::where('manu_id', '=',$manu_id)->orderBy('pro_id','desc')->paginate(8);
        $arr = [
            'data'=>$products,
            'manu_name'=>$manu_name
        ];
        return view('frontend.manufacture',$arr);
    }
    //Hien thi Chuc Nang Trang Tim Kiem
    public function search(Request $request){
        $result = $request->search;
        $product_search = Product::where('name','like','%'.$result.'%')->paginate(8);
        $arr =[
            'product_search'=>$product_search,
            'result'=>$result
        ];
        return view('frontend.search',$arr);
    }
    //Xu Ly Chuc Nang Dat Hang
    public function getOrder(Request $request){
        //Kiem Tra Xe Co Khach Hang Chua Neu Co Thi Cap Nhat Khong Thi Them Khach Hang Moi
        $cus = new Customer;
        $cus->fullname = $request->fullname;
        $cus->phone = $request->phone;
        $cus->email = $request->email;
        $cus->country = $request->country;
        $cus->address = $request->address;
        $customer = Customer::where('email','=',$cus->email)
                            ->where('phone','=',$cus->phone)
                            ->first();
        if(!$customer){
            $cus->save();
            $cus_id = $cus->customer_id;
        }else{
            $cus_id = $customer->customer_id;
        }
        //Them Don Hang Moi Cho Khach Hang 
        $bill = new Bill;
        $bill->customer_id = $cus_id;
        $bill->note = $request->note;
        $total_carts = explode('.00',Cart::total());
        $total_cart = $total_carts[0];
        $total_cart = str_replace(',','',$total_cart);
        $bill->total_price = $total_cart;
        $bill->save();
        //Them Cac San Pham Co Trong Gio Hang Vao Don Hang Tren
        $cart = Cart::content();
        foreach ($cart as $key => $value) {
            $bill_detail = new Billdetail;
            $bill_detail->bill_id = $bill->bill_id;
            $bill_detail->pro_id = $value->id;
            $bill_detail->qty = $value->qty;
            if($value->sale == 0){
                $bill_detail->unit_price = $value->price;
            }else{
                $bill_detail->unit_price = $value->sale;
            }
            $bill_detail->save();
        }
        //Xoa Thong Tin Gio Hang
        Cart::destroy();
        return redirect(url('complete'));
    }
    //Dat Hang Thanh Cong Se Chuyen Den Trang Hoan Thanh
    public function getComplete(){
        return view('frontend.complete');
    }
    //Hien Thi Trang Lien He
    public function getContact(){
        $site_map_address = Config::first()->source_map;
        $author = Author::take(3)->orderBy('au_id','asc')->get();
        $arr = [
            'data'=>$author,
            'site_map_address'=>$site_map_address
        ];
        return view('frontend.contact',$arr);
    }
    //Xu Ly Trang Lien He
    public function postContact(Request $request){
        $contact = new Contact;
        $contact['email'] = Auth::user()->email;
        $contact['vande'] = $request->vande;
        $contact['note'] = $request->note;
        $contact->save();
        return redirect()->back()->withInput()->with('message','Đã Gửi Liên Hệ Thành Công!!!');
    }
    public function getAccount(){
        return view('frontend.account');
    }
    public function postAccount(Request $request){
        $email = Auth::user()->email;
        $user = new User;
        $arr = [
            'fullname' => $request->fullname,
            'phone'    => $request->phone,
            'country' => $request->country,
            'address' => $request->address
        ];
        $user = User::where('email',$email)->update($arr);
        return redirect()->back()->withInput()->with('message','Cập Nhật Thành Công');

    }
    public function getMessage(){
        $email = Auth::user()->email;
        $message = Rep::where('email_user',$email)->orderBy('rep_id','desc')->paginate(10);
        $count_mess = Rep::where('email_user',$email)->count();
        $arr = [
            'data'=>$message,
            'count_message'=>$count_mess
        ];
        return view('frontend.message',$arr);
    }
    public function geBill(){
        $email = Auth::user()->email;
        $id_cus = Customer::where('email',$email)->first();
        if($id_cus != NULL){
            $id_cus = $id_cus->customer_id;
        }
        $bill = Bill::where('customer_id',$id_cus)->orderBy('bill_id','desc')->paginate(10);
        $count_bill = Bill::where('customer_id',$id_cus)->count();
        $arr = [
            'data'=>$bill,
            'count_bill'=>$count_bill
        ];
        return view('frontend.bill',$arr);
    }
    public function geViewDetailBill($id){
        $bill = Bill::find($id);
        $cus_id = $bill->customer_id;
        $customer = Customer::find($cus_id);
        $product = Billdetail::where('bill_id',$id)->get();
        $arr = [
            'data'=>$product,
            'customer'=>$customer,
            'bill'=>$bill
        ];
        return view('frontend.detailbill',$arr);
    }
}
