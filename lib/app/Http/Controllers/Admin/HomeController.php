<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\Manufacture;
use App\Product;
use App\User;
use App\Bill;
use App\Comment;
use App\Contact;
use App\Customer;

class HomeController extends Controller
{
    public function getHome(){
        $count_cate = Category::all()->count();
        $count_manu = Manufacture::all()->count();
        $count_product = Product::all()->count();
        $count_user = User::all()->count();
        $count_bill = Bill::all()->count();
        $count_cmt = Comment::all()->count();
        $count_contact = Contact::all()->count();
        $count_customer = Customer::all()->count();
        $arr = [
            'count_product'=>$count_product,
            'count_cate'=>$count_cate,
            'count_manu'=>$count_manu,
            'count_user'=>$count_user,
            'count_bill'=>$count_bill,
            'count_cmt'=>$count_cmt,
            'count_contact'=>$count_contact,
            'count_customer'=>$count_customer,
        ];
        return view('backend.index',$arr);
    }
    
}
