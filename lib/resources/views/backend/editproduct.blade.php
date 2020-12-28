<?php 
$open = 'product';
?>
@include('error.note')
@extends('backend.master')
@section('title','Sửa Sản Phẩm')
@section('content')		
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">Sửa Sản Phẩm</div>
			<div class="panel-body">
				@include('error.note')
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Tên Sản Phẩm</label>
								<input value="{{$data->name}}" type="text" name="name" class="form-control" placeholder="Tên Sản Phẩm" value="" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Sản Phẩm Hot </label>
								<select name="hot" id="" class="form-control">
									@if ($data->hot == 0)
										<option value="0">Không</option>
									@else
										<option value="1">Hot</option>
									@endif
									<option value="0">Không</option>
									<option value="1">Hot</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Sửa Hình Ảnh</label>
								<input type="file" id="img" name="img" class="form-control" onchange="return fileValidation()">
								<img width="120px" height="60px" id="chon" src="{{asset('lib/storage/app/image/chonhinh.png')}}" alt="">
							</div>
							<img src="" alt="">
						</div>
						<div class="col-md-1">
							<label>Hình</label>
							<img src="{{asset('lib/storage/app/image/'.$data->image)}}" width="100%" height="60px" id="viewimg">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Giá </label>
								<input value="{{$data->price}}" type="text" name="price" class="form-control" value="" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Giá Khuyến Mãi </label>
								<input value="{{$data->sale}}" type="text" name="sale" class="form-control" value="">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Hãng SX </label>
								<select name="manu_id" id="" class="form-control" required>
									<option value="{{$data->manu->manu_id}}">{{$data->manu->manu_name}}</option>
									@foreach ($manufacture as $item)
										<option value="{{$item->manu_id}}">{{$item->manu_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Danh Mục </label>
								<select name="cate_id" id="" class="form-control" required>
									<option value="{{$data->cate->cate_id}}">{{$data->cate->cate_name}}</option>
									@foreach ($category as $item)
									<option value="{{$item->cate_id}}">{{$item->cate_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Mô Tả:   </label>
						<textarea name="description" id="" class="form-control" rows="10">{{$data->description}}</textarea>
						<script>
							CKEDITOR.replace('description');
						</script>
					</div>
					<input type="submit"value="Sửa Sản Phẩm" class="form-control btn btn-primary">
					@csrf
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--/.row-->
@endsection
		
