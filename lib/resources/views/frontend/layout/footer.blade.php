<div class="container">
      
    <div class="row">
        <div class="col-md-12">
            <div id="product-tab" class="">
                <div class="heading-part">
                  <h2 class="main_title">8 Sản Phẩm Mới</h2>
                </div>
                <div class="tab-content clearfix box">
                  <div class="tab-pane active" id="nArrivals">
                    <div class="nArrivals owl-carousel">
                      <!-- San Pham -->
                      <?php
                      $product_limit = App\Product::orderBy('pro_id','desc')->take(8)->get();
                      ?>
                      @foreach ($product_limit as $item)
                      <div class="product col-md-12">
                          <div class="item mb_20 boder">
                          <p class="new">MỚI</p>
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
</div>
<div class="footer pt_60 mt_30">
<div class="container">
<div class="row">
  <div class="col-md-3 footer-block">
    <h6 class="footer-title ptb_20 mb_20">Thông Tin</h6>
    <ul>
      <?php 
      $config = App\Config::first();
      $logo = $config->logo;
      $site_name = $config->name_site;
      $address_site = $config->address_site;
      $phone_site = $config->phone_site;
      $source_map = $config->source_map;
      $link_map = $config->link_map;
      ?>
      <li><a href="{{ asset('home') }}">{{$site_name}}</a></li>
      <li><a href="{{ asset('contact') }}">Liên Hệ</a></li>
    </ul>
  </div>
  <div class="col-md-3 footer-block">
    <h6 class="footer-title ptb_20 mb_20">Hãng Sản Xuất</h6>
    <ul>
      <?php
      $manufacture = App\Manufacture::all();  
      ?>
      @foreach ($manufacture as $item)
    <li><a href="{{ asset('manufacture/'.$item->manu_id) }}">{{$item->manu_name}}</a></li>
      @endforeach
    </ul>
  </div>
  <div class="col-md-3 footer-block">
    <h6 class="footer-title ptb_20 mb_20">Tác Giả</h6>
    <ul>
      <?php $author = App\Author::all(); ?>
      @foreach ($author as $item)
        <li><a>{{$item->name}}</a></li>
        <li><a>- {{$item->masv}}</a></li>
      @endforeach
    </ul>
  </div>
  <div class="col-md-3 footer-block">
    <h6 class="footer-title ptb_20 mb_20 mb_20">Liên Hệ</h6>
    <ul>
      <li>
      Địa Chỉ :<a target="_blank" href="{{$link_map}}"><span>{{$address_site}}</a></span>
      </li> 
      <li>
      <a href="tel:{{$phone_site}}">{{$phone_site}}</a>
      </li>
    </ul>
  </div>
</div>
</div>
<div class="footer-bottom mt_60 ">
<div class="container">
  <div class="row">
  <div class="text-center">&copy; Sản Phẩm Thuộc Về <a href="{{ url('home') }}" title="">{{$site_name}}</a></div>
  </div>
</div>
</div>
</div>
<!-- =====  FOOTER END  ===== -->
</div>
<a id="scrollup"></a>
<script src="{{ asset('public/frontend/js/jQuery_v3.1.1.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery.firstVisitPopup.js') }}"></script>
<script src="{{ asset('public/frontend/js/custom.js') }}"></script>
<script src="{{ asset('public/frontend/js/script.js') }}"></script>
</body>
</html>