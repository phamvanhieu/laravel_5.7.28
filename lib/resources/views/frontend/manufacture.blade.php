@extends('frontend.master')
@section('content')
<!-- Category -->
<div class="col-sm-8 col-lg-9 mtb_5">
  <div class="row">
    <div class="col-md-12">
      <div class="heading-part mb_10 ">
      <h2 class="main_title">{{$manu_name}}</h2>
      </div>
    </div>
  </div>
  <div class="row">
    @foreach ($data as $item)
    <div class="product-layout  product-grid  col-md-3 col-sm-6 col-xs-6 ">
        <div class="items mb_20 boder">
            @if($item->hot == 1)
            <p class="hot">HOT</p>
            @endif
            <a  href="{{ url('detail') }}/{{$item->pro_id}}/{{str_slug($item->name)}}.html">
              <img class="mt_10" width="100%" src="{{ asset('lib/storage/app/image')}}/{{$item->image}}" class="img-responsive"></a>
            <div class="caption product-detail text-center">
            <marquee>
              <h6 data-name="product_name" class="product-name"><a href="{{ url('detail') }}/{{$item->pro_id}}/{{str_slug($item->name)}}.html" title="">{{$item->name}}</a></h6>
            </marquee>
            @if($item->sale != 0)
            <span class="price"><span class="amount"><span class="currencySymbol"></span><s>{{number_format($item->price)}} đ</s></span> <br>
            <span class="price" style="color:red"><span class="amount"><span class="currencySymbol"></span>{{number_format($item->sale)}} đ</span>
            @else
            <span class="price" style="color:red" ><span class="amount"><span class="currencySymbol"></span>{{number_format($item->price)}} đ</span><br><br>
            @endif
            <a href="{{url('cart/add/'.$item->pro_id)}}" style="margin-bottom: -2px!important;" class="btn form-control"><i class="fas fa-cart-plus"></i></a>
          </div>
        </div>
    </div>
    @endforeach
  </div>
  <center>
  {{ $data->links() }}
  </center>
</div>
<!-- End Category -->
@endsection