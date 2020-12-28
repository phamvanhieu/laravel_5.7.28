@extends('frontend.master')
@section('content')
<!-- Login  -->
<div class="col-sm-8 col-lg-9 mtb_20">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <center>
            <h3 href="#" id="register-form-link">Đăng Ký</h3>
      </center>
      <div class="panel-login panel">
        <div class="panel-heading">
          <hr>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form id="login-form" action="{{url('register')}}" method="post">
                @include('error.note')
                <div class="form-group">
                  <input type="text" name="fullname" value="{{old('fullname')}}"  class="form-control" placeholder="Họ Tên ...">
                  @if($errors->has('fullname'))
                    <div class="error-text">
                      {{$errors->first('fullname')}}
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email ...">
                  @if($errors->has('email'))
                    <div class="error-text">
                      {{$errors->first('email')}}
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Mật Khẩu ...">
                  @if($errors->has('password'))
                    <div class="error-text">
                      {{$errors->first('password')}}
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" name="repassword" class="form-control" placeholder="Nhập Lại Mật Khẩu ... ">
                  @if($errors->has('repassword'))
                    <div class="error-text">
                      {{$errors->first('repassword')}}
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                      <input type="submit"class="form-control btn btn-register" value="Đăng Ký">
                    </div>
                  </div>
                </div>
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Login  -->
@endsection