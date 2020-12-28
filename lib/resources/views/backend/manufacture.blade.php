<?php 
$open = "manufacture";
?>
@extends('backend.master')
@section('title','Hãng Sản Xuất')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Thêm Hãng Sản Xuất
			</div>
			<div class="panel-body">
				<div class="form-group">
					<form method="post" enctype="multipart/form-data">
						@include('error.note')
						<div class="col-md-12">
							<label>Tên Hãng Sản Xuất:</label>
							<input type="text" value="{{old('manu_name')}}" name="manu_name" class="form-control" placeholder="Tên Hãng Sản Xuất..."><br>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Hình Ảnh</label>
								<input type="file" id="img" name="img" class="form-control" required onchange="return fileValidation()">
								<img width="120px" height="60px" id="chon" src="{{asset('lib/storage/app/image/chonhinh.png')}}" alt="">
							</div>
							<img src="" alt="">
						</div>
						<div class="col-md-6">
							<label>Hình</label>
							<img src="" width="100%" height="100%" id="viewimg"> 
						</div>
						<input type="submit" class="form-control btn btn-success" value="Thêm Hãng Sản Xuất">
						@csrf
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-7 col-lg-7">
		<div class="panel panel-primary">
			<div class="panel-heading">Danh sách Hãng Sản Xuất - {{$count_manu}}</div>
			@include('error.notes')
			<div class="panel-body">
				@if ($count_manu == 0)
					<center><b style="color:red">Không Có Hãng Sản Xuất Nào!!!!</b></center>
				@else
				<div class="bootstrap-table">
					<table class="table table-bordered">
						<thead>
							<tr class="bg-primary">
								<th>Tên Hãng Sản Xuất</th>
								<th>Hình Ảnh</th>
								<th style="width:30%">Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $item)
							<tr>
								<td>{{$item->manu_name}}</td>
								<td><img width="100px" height="100px" src="{{url('lib/storage/app/image/'.$item->manu_image)}}" alt=""></td>
								<td>
									<a href="{{url('admin/manufacture/edit/'.$item->manu_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
									<a href="{{url('admin/manufacture/delete/'.$item->manu_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
								</td>
							</tr> 	
							@endforeach
						</tbody>
					</table>
				</div>
				@endif
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--/.row-->
@stop
	