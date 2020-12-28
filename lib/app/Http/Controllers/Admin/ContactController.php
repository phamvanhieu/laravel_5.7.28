<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Rep;

class ContactController extends Controller
{
    public function getContactShow(){
        $contact = Contact::where('contact_id','!=',0)->orderBy('contact_id','desc')->get();
        $count_contact = count($contact);
        $arr = [
            'data'=>$contact,
            'count_contact'=>$count_contact
        ];
        return view('backend.contact',$arr);
    }
    public function getContactDelete($id){
        $rep = new Rep;
        $rep::where('contact_id',$id)->delete();
        $contact = new Contact;
        $contact::where('contact_id',$id)->delete();
        return redirect()->back()->withInput()->with('message','Xóa Liên Hệ Thành Công');
    }
    public function getContactRep($id){

    }
    public function postContactRep($id,Request $request){
        $rep = new Rep;
        $rep['contact_id'] = $id;
        $rep['email_user'] = $request->email;
        $rep['note'] = $request->note;
        $rep->save();
        $contact = Contact::find($id);
        $contact['status'] = 1;
        $contact->save();
        return back()->withInput()->with('message','Trả Lời Liên Hệ thành công');
    }
}
