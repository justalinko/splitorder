
@extends('frontend.layouts.app')
@section('content')
    

	<div class="mt-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img src="assets/img/img3.jpg" class="img-fluid w-100 rounded shadow-sm" style="filter: brightness(80%);" alt="">
				</div>
				<div class="col-md-6">
					<div class="card border-0">
						<div class="card-body">
							<h4>Genteng Mayong</h4>
							<p><strong>Lorem ipsum dolor sit amet,</strong>consectetur adipisicing elit. Dolorem cumque enim ducimus necessitatibus animi qui unde tempora maxime! Adipisci quidem nisi veniam necessitatibus nulla asperiores molestias reprehenderit sed ipsam quia.
								<strong>Lorem ipsum dolor sit amet,</strong>consectetur adipisicing elit. Dolorem cumque enim ducimus necessitatibus animi qui unde tempora maxime! Adipisci quidem nisi veniam necessitatibus nulla asperiores molestias reprehenderit sed ipsam quia.
							</p>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- team section -->
	<div class="mt-lg-5 mb-0">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="card shadow-sm">
						<div class="card-header bg-white border-0">
							<h2><i class="fa fa-user text-orange"></i></h2>
						</div>
						<div class="card-body">
							<h4>Profile</h4>
							<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, esse!</p>
							<a href="profile.html" class="read-more-btn">Baca Selanjutnya <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card shadow-sm">
						<div class="card-header bg-white border-0">
							<h2><i class="fa fa-chart-line text-orange"></i></h2>
						</div>
						<div class="card-body">
							<h4>Visi</h4>
							<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, esse!</p>
							<a href="visi.html" class="read-more-btn">Baca Selanjutnya <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card shadow-sm">
						<div class="card-header bg-white border-0">
							<h2><i class="fa fa-chart-line text-orange"></i></h2>
						</div>
						<div class="card-body">
							<h4>Misi</h4>
							<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, esse!</p>
							<a href="misi.html" class="read-more-btn">Baca Selanjutnya <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end team section -->

	<!-- featured section -->
	<div class="feature-bg" style="margin-bottom: 0px !important;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="featured-text">
						<h2 class="pb-3 text-center">Kenapa <span class="orange-text">Genteng Mayong</span></h2>
						<div class="row">
							<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-shipping-fast"></i>
									</div>
									<div class="content">
										<h3>Jasa Antar Ke Rumah</h3>
										<p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-money-bill-alt"></i>
									</div>
									<div class="content">
										<h3>Harga Terjangkau</h3>
										<p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-briefcase"></i>
									</div>
									<div class="content">
										<h3>Genteng Kostum</h3>
										<p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-sync-alt"></i>
									</div>
									<div class="content">
										<h3>Cepat Dan Tepat</h3>
										<p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end featured section -->

    @endsection