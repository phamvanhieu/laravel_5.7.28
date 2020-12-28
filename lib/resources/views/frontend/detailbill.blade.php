@extends('frontend.master')
@section('content')
    <div class="col-sm-8 col-lg-9 mtb_50">
      <div class="panel panel-primary">
        <div class="panel-heading">Chi Tiết Đơn Hàng</div>
        <div class="panel-body">
            <div class="row">
              <div class="col-md-6">
                <p>Tên Khách hàng: {{$customer->fullname}}</p>
                <p>Số Điện Thoại: {{$customer->phone}}</p>
                <p>Email: {{$customer->email}}</p>
                <p>Ghi Chú: {{$bill->note}}</p>
              </div>
              <div class="col-md-6">
                <p>Tỉnh/Thành Phố: {{$customer->country}}</p>
                <p>Địa Chỉ: {{$customer->address}}</p>
                <p>Thời Gian Đặt Hàng: {{date( "H:i:s d/m/Y ",strtotime($bill->created_at))}}</p>
              </div>
              
            </div>
            <div class="bootstrap-table">
              <div class="table-responsive">
                <table class="table table-bordered" style="margin-top:20px;">				
                  <thead>
                    <tr class="bg-primary">
                      <th>Tên Sản Phẩm</th>
                      <th width="90px">Hình Ảnh</th>
                      <th>Số Lượng</th>
                      <th>Giá</th>
                      <th>Thành Tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                      <?php
                      $product = App\Product::find($item->pro_id);
                      echo $product_name = $product->name;
                      $product_img = $product->image;
                      ?>
                      <td><a target="_blank" href="{{ url('detail') }}/{{$item->pro_id}}/{{str_slug($product_name)}}.html">{{$product_name}}</a></td>
                      <td> <img height="70px" width="70px" src="{{ asset('lib/storage/app/image')}}/{{$product_img}}" alt=""> </td>
                      <td>{{$item->qty}}</td>
                      <td>{{number_format($item->unit_price)}} đ</td>
                      <td>{{number_format($item->unit_price * $item->qty)}} đ</td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                <p style="color: red;font-size: 1.5em;float:right">Tổng Tiền: {{ number_format($bill->total_price)}} đ</p>
                {{-- <center>{{ $data->links()}}	</center> --}}
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>	
      </div>
    </div>
  </div><!--/.row-->
@endsection