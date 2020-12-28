<?php 
$open = "phone_site";
?>
@extends('backend.master')
@section('title','Sửa Số Điện Thoại Website')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
						Sửa Số Điện Thoại Website
				</div>
				<div class="panel-body">
					<div class="form-group">
						<form method="post">
							@include('error.note')
							<label>Số Điện Thoại Website:</label>
							<input required pattern="[0-9]{10,11}" value="{{$phone_site}}" type="text" name="phone_site" class="form-control" placeholder="Số Điện Thoại Website..."><br>
							<input type="submit" class="btn btn-info form-control" value="Sửa Số Điện Thoại Website">
							@csrf
						</form>
					</div>
				</div>
			</div>
	</div>
</div><!--/.row-->
@stop