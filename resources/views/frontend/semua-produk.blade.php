@extends('frontend.layouts.app')

@section('content')
    <!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3>Produk Kami</h3>
					</div>
				</div>
			</div>

			<div class="row product-lists">
                @foreach($products as $p)
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{$p->image}}" alt=""></a>
						</div>
						<h3>{{$p->title}}</h3>
						<h5 class="product-price"><span>{{rupiah($p->price)}} / Pcs</span></h5>
						<a href="/home/produk/{{$p->id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Beli</a>
					</div>
				</div>
                @endforeach
			

			<div class="row">
				<div class="col-lg-12 text-center">
					
						{{$products->links()}}
					
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->

@endsection