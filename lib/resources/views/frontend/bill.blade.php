@extends('frontend.master')
@section('content')
    <div class="col-sm-8 col-lg-9 mtb_50">
      <div class="panel panel-primary">
        @if ($count_bill > 0)
        <div class="panel-heading">Có Tổng -  {{$count_bill}} đơn hàng</div>
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
                      <td>{{date( "H:i:s d/m/Y ",strtotime($item->created_at))}}</td>
                      <td>{{number_format($item->total_price)}} đ</td>
                      <td>{{$item->note}}</td>
                      <td><?php
                      if($item->status == 0){
                        ?>
                        <p style="color:red">Chờ Xác Nhận</p>
                        <?php
                      }else{
                        echo "Đã Xác Nhận";
                      }
                      ?></td>
                      
                      <td>
                        <a href="{{url('viewdetailbill/'.$item->bill_id)}}" class="btn btn-warning">
                          chi tiết</a>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
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