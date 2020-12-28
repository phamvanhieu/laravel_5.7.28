<?php 
$open = "category";
?>
@extends('backend.master')
@section('title','Sửa Danh Mục')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Sửa danh mục
				</div>
				<div class="panel-body">
					<div class="form-group">
						<form method="post">
							@include('error.note')
							<label>Tên danh mục:</label>
							<input value="{{$cate_name}}" type="text" name="cate_name" class="form-control" placeholder="Tên danh mục..."><br>
							<input type="submit" class="btn btn-info form-control" value="Sửa Danh Mục">
							@csrf
						</form>
					</div>
				</div>
			</div>
	</div>
</div><!--/.row-->
@stop