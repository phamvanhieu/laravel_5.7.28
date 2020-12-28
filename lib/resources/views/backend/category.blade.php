<?php 
$open = "category";
?>
@extends('backend.master')
@section('title','Danh Mục')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Thêm danh mục
			</div>
			<div class="panel-body">
				<div class="form-group">
					<form method="post">
						@include('error.note')
						<label>Tên danh mục:</label>
						<input type="text" value="{{old('cate_name')}}" name="cate_name" class="form-control" placeholder="Tên danh mục..."> <br>	
						<input type="submit" class="form-control btn btn-success" value="Thêm Danh Mục">
						@csrf
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-7 col-lg-7">
		<div class="panel panel-primary">
			<div class="panel-heading">Danh sách danh mục - {{$count_cate}}</div>
			@include('error.notes')
			<div class="panel-body">
				@if ($count_cate == 0)
					<center><b style="color:red">Không Có Danh Mục Nào!!!!</b></center>
				@else
				<div class="bootstrap-table">
					<table class="table table-bordered">
						<thead>
							<tr class="bg-primary">
								<th>Tên danh mục</th>
								<th style="width:30%">Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $item)
							<tr>
								<td>{{$item->cate_name}}</td>
								<td>
									<a href="{{url('admin/category/edit/'.$item->cate_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
									<a href="{{url('admin/category/delete/'.$item->cate_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
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
	