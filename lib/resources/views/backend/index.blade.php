<?php $open = "home" ?>
@extends('backend.master')
@section('title','Trang Chủ')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-3">
		<a href="{{url('admin/product/show')}}">
			<div class="panel panel-blue panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{$count_product}}</div>
						<div class="text-muted">Sản phẩm</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-3">
		<a href="{{url('admin/comment/show')}}">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{$count_cmt}}</div>
						<div class="text-muted">Bình luận</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-3">
		<a href="{{url('admin/user/show')}}">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{$count_user}}</div>
						<div class="text-muted">User</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-3">
		<a href="{{url('admin/category/show')}}">
			<div class="panel panel-red panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">{{$count_cate}}</div>
						<div class="text-muted">Danh mục</div>
					</div>
				</div>
			</div>
		</a>
	</div>
</div><!--/.row-->
<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
			<a href="{{url('admin/bill/show')}}">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$count_bill}}</div>
							<div class="text-muted">Đơn Hàng</div>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<a href="{{url('admin/contact/show')}}">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$count_contact}}</div>
							<div class="text-muted">Liên Hệ</div>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<a href="{{url('admin/customer/show')}}">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$count_customer}}</div>
							<div class="text-muted">Khách Hàng</div>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<a href="{{url('admin/manufacture/show')}}">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$count_manu}}</div>
							<div class="text-muted">Hãng Sản Xuất</div>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div><!--/.row-->
@endsection	