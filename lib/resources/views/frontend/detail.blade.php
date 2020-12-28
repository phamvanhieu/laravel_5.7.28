@extends('frontend.master')
@section('content')
<!-- Product-Detail -->
<div class="col-sm-8 col-lg-9 mtb_20">
  <div class="row mt_10 ">
    <div class="col-md-6">
      <div><a class="thumbnails"> 
        <img data-name="product_image" src="{{ asset('lib/storage/app/image')}}/{{$data->image}}"/>
      </a></div>
    </div>
    <div class="col-md-6 prodetail caption product-thumb">
    <h4 data-name="product_name" class="product-detail-name"><a href="" title="Tên Sản Phẩm">{{ $data->name}}</a></h4>
       @if($data->sale != 0)
      <span class="price mb_20" style="margin-top:20px"><span class="amount"><span class="currencySymbol"><s>{{ number_format($data->price)}}</s></span> đ</span>
      </span>  <br>
      <span class="price mb_20" style="color:red"><span class="amount"><span class="currencySymbol">{{number_format($data->sale)}}</span> đ</span>
      </span>
      @else
      <span class="price mb_20" style="color:red;margin-top:20px"><span class="amount"><span class="currencySymbol">{{ number_format($data->price)}}</span> đ</span>
      </span>  <br>
      @endif
      <hr>
      <ul class="list-unstyled product_info mtb_20"> 
        <li>
          <label>Danh Mục: </label>
          <span><a href="{{ url('category') }}/{{$data->cate->cate_id}}">{{$data->cate->cate_name}}</a></span>
        </li>
        <li>
          <label>Hãng Sản Xuất: </label>
        <span><a href="{{ url('category') }}/{{$data->cate->cate_id}}/{{$data->manu->manu_id}}">{{$data->manu->manu_name}}</a></span>
        </li>
        {{-- <li>
          <label>Tình Trạng:</label>
          <span> Mới</span>
        </li>
        <li>
          <label>Số Lượng:</label>
          <span> Còn Hàng</span>
        </li> --}}
      </ul>
      <hr>
      {{-- <p class="product-desc mtb_30"> Mô Tả Ngắn ...</p> --}}
      <form action="{{url('cart/add/'.$data->pro_id)}}" method="GET">
      <div id="product">
        <div class="form-group">
          <div class="row">
            <br>
              <div class="Sort-by col-md-12"> 
                <label>Số Lượng</label> <br>
                <input name="qty" min="1" class="form-control" value="1" type="number">
                @csrf
              </div>
          </div>
        </div>
      <button class="btn btn-md btn-link form-control">Thêm Vào Giỏ Hàng</button>
      </form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="exTab5" class="mtb_30">
        <ul class="nav nav-tabs">
          <li class="active"> <a href="#1c" data-toggle="tab">Mô Tả Chi Tiết</a></li>
          @if(Auth::check())
          <li><a href="#2c" data-toggle="tab">Bình Luận</a> </li>
          @endif
          <li><a href="#3c" data-toggle="tab">Sản Phẩm Liên Quan</a> </li>
        </ul>
        <div class="tab-content ">
          <div class="tab-pane active" id="1c">
            <p><?php echo $data->description ?></p>
          </div>
          <div class="tab-pane" id="2c">
            <form class="form-horizontal" method="post">
              <div class="form-group">
                <div class="col-sm-12">
                  <label>Bình Luận</label>
                  <textarea required name="comment" rows="5" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <div class="buttons">
                      <input type="submit" class="btn btn-md btn-link" value="Đánh Giá">
                  </div>
                </div>
              </div>
              @csrf
            </form>
            <div id="comments" class="comments-area mt_20">
              <h3 class="comment-title">{{$count_cmt}} Bình Luận</h3>
              <ul class="comment-list mt_20">
                @foreach ($cmt as $item)
                <li class="comment">
                  <article class="comment-body mtb_20"> 
                    <div class="comment-main">
                    <h5 class="author-name"> <span class="comment-name">{{$item->email}}</span >
                      <small class="comment-date" style="color: #fff">
                        <?php  $timestamps = $item->created_at ;echo date( "H:i:s d/m/Y ",strtotime($timestamps ))?>  </small> </h5>
                        <div class="comment-content mt_10">{{$item->comment}}.</div>
                    </div>
                  </article>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="tab-pane" id="3c">
            <div class="row">
                <div class="col-md-12">
                  <div class="heading-part mb_10 ">
                    <h2 class="main_title">Sản Phẩm Liên Quan</h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="row">
                    <?php 
                    $cate_id = $data->cate_id;
                    $products = App\Product::where('cate_id', '=',$cate_id)->take(4)->get();
                    ?>
                    @foreach ($products as $item)
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
<!-- End Product-Detail -->
@endsection