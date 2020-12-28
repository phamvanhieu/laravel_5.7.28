@extends('frontend.master')
@section('content')
<!-- Login  -->
<div class="col-sm-8 col-lg-9 mtb_20">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <center>
        <h3>Đăng Nhập</h3>
      </center>
      <div class="panel-login panel">
        <div class="panel-heading">
          <div class="row">
          </div>
          <hr>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form method="post">
                @include('error.note')
                <div class="form-group">
                  <input required type="email" name="email" class="form-control" placeholder="Email ..." value="{{old('email')}}">
                </div>
                <div class="form-group">
                  <input required pattern="\w{6,}" type="password" name="password" class="form-control" placeholder="Mật Khẩu ...">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                      <input type="submit" class="form-control btn btn-login" value="Đăng Nhập">
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