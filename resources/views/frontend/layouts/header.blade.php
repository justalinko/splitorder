<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<!-- title -->
	<title>{{env('APP_TITLE')}}</title>

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
	<!-- costum -->
	<link rel="stylesheet" href="{{asset('assets_frontend/css/costum.css')}}">
</head>
<body>
	
	<!--PreLoader-->
    
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								{{env('APP_NAME')}}
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a href="{{url('/')}}">Beranda</a></li>
								<li class="current-list-item"><a href="{{url('/home/tentang-kami')}}">Tentang Kami</a></li>
								<li><a href="{{url('/home/produk')}}">Produk</a></li>
								<li><a href="{{url('/home/kontak')}}">Kontak</a></li>
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
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg" style="background-image: url(assets/img/hero-bg.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>{{env('APP_TITLE')}}</p>
						<h1> -- </h1>
					</div>
				</div>
			</div>
		</div>
		<img src="{{asset('assets_frontend/img/homepage-bg-pattern.png')}}" class="position-absolute mb-0 pb-0" style="bottom:0px;" alt="">
	</div>
	<!-- end breadcrumb section -->