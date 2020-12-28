<?php 
$open = 'product';
?>
@include('error.note')
@extends('backend.master')
@section('title','Thêm Sản Phẩm')
@section('content')		
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">Thêm sản phẩm</div>
			<div class="panel-body">
				
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
						@include('error.note')
						<div class="col-md-6">
							<div class="form-group">
								<label>Tên Sản Phẩm</label>
								<input value="{{old('name')}}" type="text" name="name" class="form-control" placeholder="Tên Sản Phẩm" value="" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Sản Phẩm Hot </label>
								<select name="hot" id="" class="form-control">
									<option value="0">Không</option>
									<option value="1">Hot</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Hình Ảnh</label><br>
								<input type="file" id="img" name="img" class="form-control" required onchange="return fileValidation()">
								<img width="120px" height="60px" id="chon" src="{{asset('lib/storage/app/image/chonhinh.png')}}" alt="">
							</div>
							<img src="" alt="">
						</div>
						<div class="col-md-1">
							<label>Hình</label>
							<img src="" width="100%" height="60px" id="viewimg">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Giá </label>
								<input pattern="[0-9]{1,}" id="price" value="{{old('price')}}" type="text" name="price" class="form-control" value="" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Giá Khuyến Mãi </label>
								<input pattern="[0-9]{1,}" id="sale" value="{{old('sale')}}" type="text" name="sale" class="form-control" value="0">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Hãng SX </label>
								<select name="manu_id" id="" class="form-control" required>
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
									@foreach ($category as $item)
									<option value="{{$item->cate_id}}">{{$item->cate_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Mô Tả:   </label>
						<textarea name="description" id="" class="form-control" rows="10">{{old('description')}}</textarea>
						<script>
							CKEDITOR.replace('description');
						</script>
					</div>
					<input type="submit"value="Thêm Sản Phẩm" class="form-control btn btn-primary">
					@csrf
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--/.row-->
@endsection
		
