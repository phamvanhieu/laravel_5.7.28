
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- =====  BASIC PAGE NEEDS  ===== -->
  <meta charset="utf-8">
  <title>Web Bán Hàng - Nhóm 4</title>
  <!-- =====  SEO MATE  ===== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="distribution" content="global">
  <meta name="revisit-after" content="2 Days">
  <meta name="robots" content="ALL">
  <meta name="rating" content="8 YEARS">
  <meta name="Language" content="en-us">
  <meta name="GOOGLEBOT" content="NOARCHIVE">
  <!-- =====  MOBILE SPECIFICATION  ===== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width">
  <!-- =====  CSS  ===== -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/font-awesome.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/magnific-popup.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/owl.carousel.css') }}">
  <link rel="shortcut icon" href="{{ asset('lib/storage/app/image/favicon.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('lib/storage/app/image/apple-touch-icon.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('lib/storage/app/image/apple-touch-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('lib/storage/app/image/apple-touch-icon-114x114.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
</head>

<body>
  <div class="wrapper">
    <!-- =====  HEADER START  ===== -->
    <header id="header">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="header-top-left">
                  <?php 
                  $config = App\Config::first();
                  $logo = $config->logo;
                  $site_name = $config->site_name;
                  $address_site = $config->address_site;
                  $phone_site = $config->phone_site;
                  $source_map = $config->source_map;
                  $link_map = $config->link_map;
                  if($logo == ''){
                    $logo = 'logo.png';
                  }
                  ?>
                <div class="contact"><a href="tel:{{ $phone_site }}">Gọi Ngay !</a> <span>{{$phone_site}}</span> || 
                  <a target="_blank" href="{{$link_map}}">
                  Địa Chỉ :</a> <span>{{$address_site}}.</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="main-search mt_40">
                <form action="{{ url('search/')}}" method="get">
                  <input required id="search-input" name="search" placeholder="Tìm Kiếm" class="form-control input-lg" autocomplete="off" type="text">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                </form>
              
              </span> </div>
            </div>
            <div class="navbar-header col-xs-6 col-sm-4"> <a class="navbar-brand" href="{{ url('home')}}"> <img width="229px" height="40px" alt="Logo" 
            src="{{ asset('lib/storage/app/image/'.$logo) }}"> </a> </div>
            <div class="col-xs-6 col-sm-4 shopcart">
              <a href="{{ url('cart/show')}}">
              <div id="cart" class="btn-group btn-block mtb_40">
                <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true">
                  <span id="shippingcart">Giỏ Hàng</span><span id="cart-total">({{Cart::count()}}) Sản Phẩm </span> </button>
              </div></a>
            </div>
          </div>
        </div>
        <nav class="navbar">
          <div class="container">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> 
              <span class="i-bar"><i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse js-navbar-collapse" style="left: 20px;height: 1px;">
              <ul id="menu" class="nav navbar-nav">
                <li> <a href="{{ url('home')}}">Trang Chủ</a></li>
                <?php 
                $category = App\Category::all();
                ?>
                @foreach ($category as $item)
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $item->cate_name}} </a>
                  <ul class="dropdown-menu">
                    <?php 
                    $manufacture = App\Manufacture::all();  
                    ?>
                    @foreach ($manufacture as $item_manu)
                  <li> <a href="{{ url('category')}}/{{$item->cate_id}}/{{$item_manu->manu_id}}">{{ $item_manu->manu_name}}</a></li>
                    @endforeach
                  </ul>
                </li>
                @endforeach
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Trang </a>
                  <ul class="dropdown-menu">
                    <li> <a href="{{ url('contact')}}">Liên Hệ</a></li>
                  </ul>
                </li>
                @if(Auth::check())
                <li style="float:right" class="dropdown"> <a href="mobi-admin" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->email}}</a>
                  <ul class="dropdown-menu">
                    <li> <a href="{{ url('account')}}">Thông Tin</a></li>
                    <li> <a href="{{ url('message')}}">Tin Nhắn</a></li>
                    <li> <a href="{{ url('bill')}}">Đơn Hàng</a></li>
                    <li> <a href="{{ url('logout')}}">Đăng Xuất</a></li>
                  </ul>
                </li>
                @else
                <li style="float:right" class="dropdown"> <a href="" class="dropdown-toggle" data-toggle="dropdown">Tài Khoản </a>
                  <ul class="dropdown-menu">
                    <li> <a href="{{ url('login')}}">Đăng Nhập</a></li>
                    <li> <a href="{{ url('register')}}">Đăng Ký</a></li>
                  </ul>
                </li>  
                @endif  
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>