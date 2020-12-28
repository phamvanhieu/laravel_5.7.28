<?php 
$open = "name_site";
?>
@extends('backend.master')
@section('title','Sửa Tên Website')
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
						Sửa Tên Website
				</div>
				<div class="panel-body">
					<div class="form-group">
						<form method="post">
							@include('error.note')
							<label>Tên Website:</label>
							<input required value="{{$name_site}}" type="text" name="name_site" class="form-control" placeholder="Tên Website..."><br>
							<input type="submit" class="btn btn-info form-control" value="Sửa Tên Website">
							@csrf
						</form>
					</div>
				</div>
			</div>
	</div>
</div><!--/.row-->
@stop