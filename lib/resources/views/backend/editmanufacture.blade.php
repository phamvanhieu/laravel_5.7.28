<?php 
$open = "manufacture";
?>
@extends('backend.master')
@section('title','Sửa Hãng Sản Xuất')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Sửa Hãng Sản Xuất
				</div>
				<div class="panel-body">
					<div class="form-group">
						<form method="post" enctype="multipart/form-data">
							@include('error.note')
							<div class="col-md-12">
								<label>Tên Hãng Sản Xuất:</label>
								<input value="{{$manu_name}}" type="text" name="manu_name" class="form-control" placeholder="Tên Hãng Sản Xuất..."><br>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Hình Ảnh</label>
									<input type="file" id="img" name="img" class="form-control" onchange="return fileValidation()">
								</div>
								<img src="" alt="">
							</div>
							<div class="col-md-6">
								<label>Hình</label>
								<img src="{{url('lib/storage/app/image/'.$manu_image)}}" width="100%" height="100%" id="viewimg"> 
							</div>
							<input type="submit" class="btn btn-info form-control" value="Sửa Hãng Sản Xuất">
							@csrf
						</form>
					</div>
				</div>
			</div>
	</div>
</div><!--/.row-->
@stop