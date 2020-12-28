<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Trang Admin || @yield('title')</title>
<link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('public/backend/css/styles.css')}}" rel="stylesheet">
<link href="{{asset('public/backend/css/hieu.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="{{url('lib/storage/app/image/favicon.png')}}">
<script type="text/javascript" src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/backend/js/lumino.glyphs.js')}}"></script>
<script src="{{asset('public/backend/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('public/backend/js/myscript.js')}}"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
			<a class="navbar-brand" href="{{url('admin/home')}}">XIN CHÀO Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
							{{Auth::user()->email}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{url('/logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel">
								</use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="<?php if($open == "home") echo "active" ?>"><a href="{{url('admin/home')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li class="<?php if($open == "bill") echo "active" ?>"><a href="{{url('admin/bill/show')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar">
				</use></svg> Đơn Hàng</a></li>
			<li class="<?php if($open == "customer") echo "active" ?>"><a href="{{url('admin/customer/show')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar">
				</use></svg> Khách Hàng</a></li>
			<li class="<?php if($open == "product") echo "active" ?>"><a href="{{url('admin/product/show')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar">
				</use></svg> Sản phẩm</a></li>
			<li class="<?php if($open == "category") echo "active" ?>"><a href="{{url('admin/category/show')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph">
				</use></svg> Danh mục</a></li>
			<li class="<?php if($open == "manufacture") echo "active" ?>"><a href="{{url('admin/manufacture/show')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph">
				</use></svg> Hãng Sản Xuất</a></li>
			<li class="<?php if($open == "user") echo "active" ?>"><a href="{{url('admin/user/show')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph">
				</use></svg> User</a></li>
			<li class="<?php if($open == "cmt") echo "active" ?>"><a href="{{url('admin/comment/show')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph">
				</use></svg> Bình Luận</a></li>
			<li class="<?php if($open == "contact") echo "active" ?>"><a href="{{url('admin/contact/show')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph">
				</use></svg> Liên Hệ</a></li>
			<li>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
					Cài Đặt <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li class="<?php if($open == "logo") echo "active" ?>">
						<a id="dropdowitems" href="{{url('admin/config/logo')}}">Logo</a>
					</li>
					<li class="<?php if($open == "name_site") echo "active" ?>">
						<a id="dropdowitems" href="{{url('admin/config/namesite')}}">Tên WebSite</a></li>
					<li class="<?php if($open == "phone_site") echo "active" ?>">
						<a id="dropdowitems" href="{{url('admin/config/phonesite')}}">Số Điện Thoại</a></li>
					<li class="<?php if($open == "address_site") echo "active" ?>">
						<a id="dropdowitems" href="{{url('admin/config/addresssite')}}">Địa Chỉ</a></li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
		<hr>	
		{{-- <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Trang chủ</h1>
			</div>
        </div><!--/.row--> --}}	

        @yield('content')

        
    </div>	<!--/.main-->
		  

	<script src="{{asset('public/backend/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$('#viewimg').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
		}
		function sale(){
				var a = this.value;
				alert(a);
		}
		$("#img").change(function(){
			readURL(this);
		});
		function CheckAdmin(){
			var a = document.getElementById('level').value;
			if(a == 2){
				alert('Bạn Phải Nhập Mật Mã Admin Mới Có Thể Tạo Admin mới');
			}
		}
	</script>
</body>

</html>
