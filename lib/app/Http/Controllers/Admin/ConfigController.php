<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Config;

class ConfigController extends Controller
{
    public function getLogoEdit(){
        $image = Config::first()->logo;
        return view('backend.editsite.logo',['image'=>$image]);
    }
    public function postLogoEdit(Request $request){
        $id = Config::first()->config_id;
        $img_file = Config::first()->logo;
        $config = new Config();
        if($request->hasFile('img')){
            $filename = $request->img->getClientOriginalName();
            $time = time();
            $filename = rand(0,99999).$time.$filename;
            $configs['logo'] = $filename ;
            $request->img->storeAs('image',$filename);
            $config->where('config_id',$id)->update($configs);
            if(is_file('lib/storage/app/image/'.$img_file)){
                unlink('lib/storage/app/image/'.$img_file);
            }
            return back()
            ->withInput()
            ->with('message','Sửa Logo Thành Công');
        }
    }
    public function getNamesiteEdit(){
        $name_site = Config::first()->name_site;
        return view('backend.editsite.namesite',['name_site'=>$name_site]);
    }
    public function postNamesiteEdit(Request $request){
        $name_site = $request->name_site;
        $id = Config::first()->config_id;
        $config = new Config;
        $arr['name_site'] = $name_site;
        $config->where('config_id',$id)->update($arr);
        return back()
            ->withInput()
            ->with('message','Sửa Tên Website Thành Công');

    }
    public function getPhonesiteEdit(){
        $phone_site = Config::first()->phone_site;
        return view('backend.editsite.phonesite',['phone_site'=>$phone_site]);
    }
    public function postPhonesiteEdit(Request $request){
        $phone_site = $request->phone_site;
        $id = Config::first()->config_id;
        $config = new Config;
        $arr['phone_site'] = $phone_site;
        $config->where('config_id',$id)->update($arr);
        return back()
            ->withInput()
            ->with('message','Sửa Số Điện Thoại Website Thành Công');

    }
    public function getAddresssiteEdit(){
        $address_site = Config::first()->address_site;
        $source_map = Config::first()->source_map;
        $link_map = Config::first()->link_map;
        $arr = [
            'address_site'=>$address_site,
            'source_map'=>$source_map,
            'link_map'=>$link_map
        ];
        return view('backend.editsite.addresssite',$arr);
    }
    public function postAddresssiteEdit(Request $request){
        $address_site = $request->address_site;
        $source_map = $request->source_map;
        $link_map = $request->link_map;
        $id = Config::first()->config_id;
        $config = new Config;
        $arr['address_site'] = $address_site;
        $arr['source_map'] = $source_map;
        $arr['link_map'] = $link_map;
        $config->where('config_id',$id)->update($arr);
        return back()
            ->withInput()
            ->with('message','Sửa Địa Chỉ Thành Công Website Thành Công');
    }
}
