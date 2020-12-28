<?php 
$open = "user";
?>
@extends('backend.master')
@section('title','Sửa User')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">Sửa User</div>
            <div class="panel-body">
                <form method="post">
                    @include('error.note')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email:</label>
                            <input disabled value="@if(old('email')){{old('email')}}@else{{$data->email}}@endif" 
                            type="email" name="email" class="form-control" placeholder="Email ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Họ Tên:</label>
                            <input required value="@if(old('fullname')){{old('fullname')}}@else{{$data->fullname}}@endif" 
                            type="text" name="fullname" class="form-control" placeholder="Họ Tên ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mật Khẩu:</label>
                            <input disabled value="{{$data->password}}" type="password" name="password" class="form-control" placeholder="Mật Khẩu ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Level:</label>
                            <select disabled id="level" class="form-control" onchange="return CheckAdmin()" name="level">
                                @if($data->level == 1)
                                <option value="{{$data->level}}">User</option>
                                @elseif($data->level == 2)
                                <option value="{{$data->level}}">Admin</option>
                                @endif
                                <option value="1">User</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Số Điện Thoại:</label>
                            <input required value="@if(old('phone')){{old('phone')}}@else{{$data->phone}}@endif" 
                            type="text" name="phone" class="form-control" placeholder="Số Điện Thoại ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tỉnh/Thành Phố *</label>
                            <select required class="form-control" id="input-country" name="country">
                                @if($data->country)
                                <option value="{{$data->country}}">{{$data->country}}</option>
                                @endif
                                <option value="">------------------------------- Mời Chọn --------------------------------</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                <option value="Cần Thơ">Cần Thơ</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Hải Phòng">Hải Phòng</option>
                                <option value="An Giang">An Giang</option>
                                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                <option value="Bắc Giang">Bắc Giang</option>
                                <option value="Bắc Kạn">Bắc Kạn</option>
                                <option value="Bạc Liêu">Bạc Liêu</option>
                                <option value="Bắc Ninh">Bắc Ninh</option>
                                <option value="Bến Tre">Bến Tre</option>
                                <option value="Bình Định">Bình Định</option>
                                <option value="Bình Dương">Bình Dương</option>
                                <option value="Bình Phước">Bình Phước</option>
                                <option value="Bình Thuận">Bình Thuận</option>
                                <option value="Cà Mau">Cà Mau</option>
                                <option value="Cao Bằng">Cao Bằng</option>
                                <option value="Đắk Lắk">Đắk Lắk</option>
                                <option value="Đắk Nông">Đắk Nông</option>
                                <option value="Điện Biên">Điện Biên</option>
                                <option value="Đồng Nai">Đồng Nai</option>
                                <option value="Đồng Tháp">Đồng Tháp</option>
                                <option value="Gia Lai">Gia Lai</option>
                                <option value="Hà Giang">Hà Giang</option>
                                <option value="Hà Nam">Hà Nam</option>
                                <option value="Hà Tĩnh">Hà Tĩnh</option>
                                <option value="Hải Dương">Hải Dương</option>
                                <option value="Hậu Giang">Hậu Giang</option>
                                <option value="Hòa Bình">Hòa Bình</option>
                                <option value="Hưng Yên">Hưng Yên</option>
                                <option value="Khánh Hòa">Khánh Hòa</option>
                                <option value="Kiên Giang">Kiên Giang</option>
                                <option value="Kon Tum">Kon Tum</option>
                                <option value="Lai Châu">Lai Châu</option>
                                <option value="Lâm Đồng">Lâm Đồng</option>
                                <option value="Lạng Sơn">Lạng Sơn</option>
                                <option value="Lào Cai">Lào Cai</option>
                                <option value="Long An">Long An</option>
                                <option value="Nam Định">Nam Định</option>
                                <option value="Nghệ An">Nghệ An</option>
                                <option value="Ninh Bình">Ninh Bình</option>
                                <option value="Ninh Thuận">Ninh Thuận</option>
                                <option value="Phú Thọ">Phú Thọ</option>
                                <option value="Quảng Bình">Quảng Bình</option>
                                <option value="Quảng Nam">Quảng Nam</option>
                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                <option value="Quảng Ninh">Quảng Ninh</option>
                                <option value="Quảng Trị">Quảng Trị</option>
                                <option value="Sóc Trăng">Sóc Trăng</option>
                                <option value="Sơn La">Sơn La</option>
                                <option value="Tây Ninh">Tây Ninh</option>
                                <option value="Thái Bình">Thái Bình</option>
                                <option value="Thái Nguyên">Thái Nguyên</option>
                                <option value="Thanh Hóa">Thanh Hóa</option>
                                <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                <option value="Tiền Giang">Tiền Giang</option>
                                <option value="Trà Vinh">Trà Vinh</option>
                                <option value="Tuyên Quang">Tuyên Quang</option>
                                <option value="Vĩnh Long">Vĩnh Long</option>
                                <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                <option value="Yên Bái">Yên Bái</option>
                                <option value="Phú Yên">Phú Yên</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Địa Chỉ Giao Hàng:</label>
                            <input value="@if(old('address')){{old('address')}}@else{{$data->address}}@endif" required 
                            type="text" name="address" class="form-control" placeholder="Địa Chỉ ...">
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-info form-control" value="Sửa User">
                    @csrf
                </form>
                </div>
            </div>
        </div>
	</div>
</div><!--/.row-->
@stop