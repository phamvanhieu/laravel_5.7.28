<?php 
$open = 'user';
?>
@extends('backend.master')
@section('title','User')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
		
		<div class="panel-heading">Danh sách User - {{$count_user}}</div>
		@include('error.note')
			<div class="panel-body">
				<div class="bootstrap-table">
					<div class="table-responsive">
						<a href="{{url('admin/user/add')}}" class="btn btn-primary">Thêm User</a>
						<table class="table table-bordered" style="margin-top:20px;">				
							<thead>
								<tr class="bg-primary">
									<th>email</th>
									<th>fullname</th>
									<th>phone</th>
									<th>address</th>
									<th>level</th>
									<th width="11%">Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
									<td>{{$item->email}}</td>
									<td>{{$item->fullname}}</td>
									<td>{{$item->phone}}</td>
									<td>{{$item->address}}</td>
									
									<td><?php if( $item->level == 2) echo "Admin";else echo "User" ?></td>
									<td>
									<a href="{{url('admin/user/edit/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
									<a href="{{url('admin/user/delete/'.$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<center>{{ $data->links('vendor.pagination.default')}}	</center>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--/.row-->
@endsection
	