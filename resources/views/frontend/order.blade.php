@extends('frontend.layouts.app')

@section('content')
    
	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap shadow-sm">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Informasi Pembeli
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="/home/beli" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
										<div class="form-group">
											<label class="font-weight-bold">Jumlah pesanan</label>
											<p><input type="text" placeholder="Quantity" name="qty" id="qtyv" onchange="ubahHarga()" value="{{$qty}}" min="{{$product->min_order}}" max="{{$product->max_order}}"></p>
										</div>
										<div class="form-group">
											<label class="font-weight-bold">nama costumer</label>
											<p><input type="text"  name="customer_name" placeholder="Name" required></p>
										</div>
										<div class="form-group">
											<label class="font-weight-bold">Nomer HP</label>
											<p><input type="tel" placeholder="Phone" name="customer_phone" required></p>
										</div>
									
										<div class="form-group">
											<label class="font-weight-bold">Catatan</label>
											<p><textarea name="note" id="bill" cols="30" rows="10" placeholder="isikan detail / alamat anda..."></textarea></p>
										</div>

                                        <button class="btn btn-primary w-100 mt-2"><i class="fa fa-shopping-cart"></i> Beli Sekarang</button>
						        	</form>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Detil Pesanan</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Produk</td>
									<td>Total</td>
								</tr>
								<tr>
									<td>{{$product->name}}</td>
									<td>{{rupiah($product->price)}}/pcs</td>
								</tr>
                                <tr>
                                    <td>
                                        Qty:  <b id="qty_qty">{{$qty}}</b> pcs 
                                    </td>
                                    <td>
                                        <b id="qty_price">{{rupiah($product->price * $qty)}}</b>
                                    </td>
                                </tr>
								
							</tbody>
							<tbody class="checkout-details">
								
								<tr>
									<td>Total</td>
									<td id="total">{{rupiah($product->price * $qty)}}</td>
								</tr>
							</tbody>
						</table>
						
                        
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->

@endsection

@section('js')
    <script>
        const rupiah = (angka) => {
            var number_string = angka.toString(),
            sisa  = number_string.length % 3,
            rupiah  = number_string.substr(0, sisa),
            ribuan  = number_string.substr(sisa).match(/\d{3}/g);
            
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return 'Rp. ' + rupiah;
        }
        const ubahHarga = () => {
            const qty = document.getElementById('qtyv').value;
            const price = document.getElementById('qty_price');
            const qty_qty = document.getElementById('qty_qty');
            const total = document.getElementById('total');
            const harga = {{$product->price}};

            price.innerHTML = `{{rupiah($product->price)}} x ${qty} = ${rupiah(qty*harga)}`;
            qty_qty.innerHTML = qty;
            total.innerHTML = `{{rupiah($product->price * $qty)}}`;
        }
    </script>
@endsection