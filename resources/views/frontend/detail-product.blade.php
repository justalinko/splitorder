@extends('frontend.layouts.app')

@section('content')
    	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{$product?->image}}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$product->name}}</h3>
						<p class="single-product-pricing">{{rupiah($product->price)}} / pcs</p>
						<div class="card mb-2">
							<div class="card-header">
								<h4 class="mt-0">Deskripsi</h4>
							</div>
							<div class="card-body">
								<p class="mb-0">{!!$product->description!!}</p>
							</div>
						</div>
						<div class="single-product-form">
							<form action="/home/beli/{{$product->id}}">
								<input name="qty" min="{{$product->min_order}}" max="{{$product->max_order}}" value="
								{{$product->min_order}}" type="number" placeholder="0">
								<button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-shopping-cart"></i> Beli</button>
							</form>
							
						
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	{{-- <div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Genteng Mangli</h3>
						<h5 class="product-price"><span>Rp. 6500 / Pcs</span></h5>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Genteng Mangli</h3>
						<h5 class="product-price"><span>Rp. 6500 / Pcs</span></h5>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Genteng Mangli</h3>
						<h5 class="product-price"><span>Rp. 6500 / Pcs</span></h5>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- end more products -->
@endsection