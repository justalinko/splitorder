
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<!-- title -->
	<title>{{env('APP_NAME')}} - {{env('APP_TITLE')}}</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{asset('assets_frontend/img/favicon.png')}}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{asset('assets_frontend/css/all.min.css')}}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets_frontend/bootstrap/css/bootstrap.min.css')}}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.css')}}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{asset('assets_frontend/css/magnific-popup.css')}}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{asset('assets_frontend/css/animate.css')}}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{asset('assets_frontend/css/meanmenu.min.css')}}">
	<!-- main style -->
	<link rel="stylesheet" href="{{asset('assets_frontend/css/main.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets_frontend/css/responsive.css')}}">
	<!-- costum css -->
	<link rel="stylesheet" href="{{asset('assets_frontend/css/costum.css')}}">

</head>
<body>	
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{url('/')}}">
								{{-- <img src="{{asset('assets_frontend/img/logo.png')}}" alt=""> --}}
								<h5 class="text-danger">{{env('APP_NAME')}}</h5>
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu mx-auto">
							<ul>
								<li class="current-list-item"><a href="{{url('/')}}">Beranda</a></li>
								<li><a href="{{url('/home/tentang-kami')}}">Tentang Kami</a></li>
								<li><a href="{{url('/home/produk')}}">Produk</a></li>
								<li><a href="{{url('/home/kontak')}}">Kontak</a></li>
								<li><a href="{{url('/auth/login')}}">Login</a></li>
								<li>
									<div class="header-icons">
										
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 mx-auto mt-5 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<h2 class="text-white">{{env('APP_TITLE')}}</h2>
							{{-- <h1>{{env('APP_TITLE')}}</h1> --}}
							<div class="hero-btns">
								<!-- <a href="shop.html" class="boxed-btn">Fruit Collection</a> -->
								<a href="https://wa.me/62871233193913" target="_blank" class="bordered-btn">Hubungi Kami</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- product section -->
	<div class="product-section mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Produk</span> Kami</h3>
						<p>Menyediakan produksi genteng yang berkualitas.</p>
					</div>
				</div>
			</div>

			<div class="row">

                @foreach($products as $pro)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/home/produk/{{$pro->slug}}"><img src="{{$pro?->image}}" alt=""></a>
						</div>
						<h3>{{$pro->title}}</h3>
						<h5 class="product-price"><span>{{rupiah($pro->price)}} / Pcs</span></h5>
						<a href="/home/produk/{{$pro->slug}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Beli</a>
					</div>
				</div>
                @endforeach
			
			</div>
			<div class="row">
				<div class="col-lg-12 text-right">
					<a href="/home/produk" class="boxed-btn">Produk Lainnya</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- latest news -->
	<div class="latest-news pb-4">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Berita</span> Terbaru</h3>
						<p>Berita terbaru seputar produk kami.</p>
					</div>
				</div>
			</div>

			<div class="row">

                @foreach($news as $p)
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg" style="background-image: url({{$p?->image}});"></div></a>
						<div class="news-text-box">
							<h3><a href="/home/berita/{{$p->slug}}">{{$p->title}}</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> {{$p->author}}</span>
								<span class="date"><i class="fas fa-calendar"></i> {{$p->created_at->diffForHumans()}}</span>
							</p>
							<p class="excerpt">{{strip_tags(substr($p->content,0,100))}}...</p>
							<a href="/home/berita/{{$p->slug}}" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
                @endforeach
			
			</div>
			<div class="row">
				<div class="col-lg-12 text-right">
					<a href="/home/berita" class="boxed-btn">Tampilkan Lebih Banyak</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->


	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; {{date('Y')}} - <a href="{{url('/')}}">{{env('APP_NAME')}}</a>,  All Rights Reserved.
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="{{asset('assets_frontend/js/jquery-1.11.3.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets_frontend/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- count down -->
	<script src="{{asset('assets_frontend/js/jquery.countdown.js')}}"></script>
	<!-- isotope -->
	<script src="{{asset('assets_frontend/js/jquery.isotope-3.0.6.min.js')}}"></script>
	<!-- waypoints -->
	<script src="{{asset('assets_frontend/js/waypoints.js')}}"></script>
	<!-- owl carousel -->
	<script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
	<!-- magnific popup -->
	<script src="{{asset('assets_frontend/js/jquery.magnific-popup.min.js')}}"></script>
	<!-- mean menu -->
	<script src="{{asset('assets_frontend/js/jquery.meanmenu.min.js')}}"></script>
	<!-- sticker js -->
	<script src="{{asset('assets_frontend/js/sticker.js')}}"></script>
	<!-- main js -->
	<script src="{{asset('assets_frontend/js/main.js')}}"></script>

</body>
</html>