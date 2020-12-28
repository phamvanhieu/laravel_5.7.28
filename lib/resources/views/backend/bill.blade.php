<?php 
$open = 'bill';
?>
@extends('backend.master')
@section('title','Đơn Hàng')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
			@if ($count_bill > 0)
			<div class="panel-heading">{{$cus_name}} - Có Tổng -  {{$count_bill}} đơn hàng</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th >DateOder</th>
										<th>Total Price</th>
										<th>Note</th>
										<th>Status</th>
										<th width="18%">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($data as $item)
									<tr>
										<td>{{$item->created_at}}</td>
										<td>{{number_format($item->total_price)}} đ</td>
										<td>{{$item->note}}</td>
										<td><?php
										if($item->status == 0){
											?>
											<a href="{{url('admin/customer/confirmbill/'.$item->bill_id)}}" class="form-control btn btn-warning">Xác Nhận</a>
											<?php
										}else{
											echo "Đã Xác Nhận";
										}
										?></td>
										
										<td>
											<a href="{{url('admin/customer/viewdetailbill/'.$item->bill_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Xem chi tiết</a>
											<a href="{{url('admin/customer/deletebill/'.$item->bill_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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
			<center><b style="color:red">Không Có Đơn Hàng Nào!!!</b></center>
			@endif
		</div>
	</div>
</div><!--/.row-->
@endsection