<?php 
$open = "address_site";
?>
@extends('backend.master')
@section('title','Sửa Địa Chỉ Website')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
					Sửa Địa Chỉ Website
			</div>
			<div class="panel-body">
				<form method="post">
					@include('error.note')
					<div class="form-group">
						<div class="col-md-12">
							<label>Địa Chỉ Website:</label>
							<input required value="{{$address_site}}" type="text" name="address_site" class="form-control" placeholder="Địa Chỉ Website..."><br>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							<label>Source Bản Đồ</label>
							<textarea required name="source_map" placeholder="https://www.google.com/maps/embed ..." 
							class="form-control" rows="7">{{$source_map}}</textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							<label>Link Bản Đồ</label>
							<textarea required name="link_map" placeholder="https://www.google.com/maps/place/ ..."
							class="form-control" rows="7">{{$link_map}}</textarea><br>
						</div>
					</div>
					<div class="col-md-12">
						<label>Bản Đồ Hiện Tại</label>
						<iframe src="{{$source_map}}" 
						width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
					</div>
					<div class="col-md-12">
						<input type="submit" class="btn btn-info form-control" value="Sửa Địa Chỉ Website">
					</div>
					@csrf
				</form>
			</div>
		</div>
	</div>
</div><!--/.row-->
@stop