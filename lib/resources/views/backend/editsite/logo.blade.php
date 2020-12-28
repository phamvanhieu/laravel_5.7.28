<?php 
$open = 'logo';
?>
@include('error.note')
@extends('backend.master')
@section('title','Sửa Logo')
@section('content')		
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">Sửa Logo</div>
			<div class="panel-body">
				@include('error.note')
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group chon">
								<label>Sửa Hình Ảnh</label>
								<input required type="file" id="img" name="img" class="form-control" onchange="return fileValidation()">
								<img width="101px" height="101px" id="chon" src="{{asset('lib/storage/app/image/chonhinh.png')}}" alt="">
							</div>
							
						</div>
						<div class="col-md-3">
							<label>Logo </label>
							<img style="background: black;"  src="{{asset('lib/storage/app/image/'.$image)}}" width="100%" id="viewimg">
						</div>
					</div><br>
					<input type="submit"value="Sửa Logo" class="form-control btn btn-primary">
					@csrf
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--/.row-->
@endsection
		
