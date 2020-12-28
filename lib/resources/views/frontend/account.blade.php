@extends('frontend.master')
@section('content')
<!-- Contact -->
<div class="col-sm-8 col-lg-9 mt-1">
  <!-- contact  -->
  <div class="row">
    <div class="col-md-12">
      <div class="heading-part mb_10" style="margin-top: 6px;">
        <h2 class="main_title">Thông Tin Tài Khoản</h2>
      </div><br>
      @include('error.note')
    </div>
    <!-- Contact FORM -->
    <div id="contact_form">
      <form id="contact_body" method="post">
        <div class="col-md-6">
          <label>Email:</label>
          <input disabled value="{{Auth::user()->email}}" name="email" type="text" class="full-with-form"/>
        </div>
        <div class="col-md-6">
          <label>Mật Khẩu:</label>
          <input disabled class="full-with-form" type="text" value="****************" />
        </div>
        <div class="col-md-6">
          <label>Họ Tên:</label>
          <input value="{{Auth::user()->fullname}}" class="full-with-form " type="text" name="fullname" placeholder="Tên" />
        </div>
        <div class="col-md-6">
          <label>Số Điện Thoại:</label>
          <input value="{{Auth::user()->phone}}" class="full-with-form" type="text" name="phone" placeholder="Số Điện Thoại"/>
        </div>
        <div class="col-md-6">
          <label>Thành Phố:</label>
          <select required class="form-control" id="input-country" name="country">
            <option value="@if(Auth::user()->country != ''){{Auth::user()->country}}@endif"> @if(Auth::user()->country != ''){{Auth::user()->country}}@else --- Mời Chọn --- @endif </option>
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
        <div class="col-md-6">
          <label>Địa Chỉ:</label>
          <input value="{{Auth::user()->address}}" class="full-with-form" type="text" name="address" placeholder="Địa chỉ" />
        </div>
        <div class="col-md-12">
          <input class="btn mt_30" type="submit" value="Cập Nhật"> 
        </div>
        @csrf
      </form>
    </div>
    <!-- END Contact FORM -->
    </div>
  </div>
<!-- End Contact -->
@endsection