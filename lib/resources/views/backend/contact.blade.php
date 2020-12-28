<?php 
$open = 'contact';
?>
@extends('backend.master')
@section('title','Liên Hệ')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
		@if($count_contact != 0)
		<div class="panel-heading">Danh sách Liên Hệ - {{$count_contact}}</div>
			<div class="panel-body">
				@include('error.note')
				<div class="bootstrap-table">
					<div class="table-responsive">
						<table class="table table-bordered" style="margin-top:20px;">				
							<thead>
								<tr class="bg-primary">
									<th>Email</th>
									<th>Vấn Đề</th>
									<th>Nội Dung</th>
									<th>Ngày Gửi</th>
									<th>Trả Lời</th>
									<th width="10%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $item)
								<tr>
                                    <td>{{$item->email}}</td>
									<td>{{$item->vande}}</td>
									<td>{{$item->note}}</td>
                                    <td>{{date( "H:i:s d/m/Y ",strtotime($item->created_at))}}</td>
                                    <td>
										@if($item->status == 0)
										<form method="post" action="{{url('admin/contact/show/'.$item->contact_id)}}">
											<div class="col-md-8">
												<input type="hidden" name="email"  value="{{$item->email}}" class="form-control">
												<input type="text" name="note" class="form-control">
											</div>
											<div class="col-md-4">
												<button type="submit" class="btn btn-info">Gửi</button>
											</div>
											@csrf
										</form>
										@else
										<p>Đã Trả Lời</p>
										@endif
									</td>
									<td>
										<a href="{{url('admin/contact/delete/'.$item->contact_id)}}" 
										onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>Xóa Liên Hệ</a>
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
						{{-- <center>{{ $data->links()}}	</center> --}}
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		@else
		<center><b style="color:red">Không Có Bình Luận Nào!!!</b></center>
		@endif
	</div>
</div><!--/.row-->
@endsection
	