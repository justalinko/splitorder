@extends('layouts.app')

@section('content')
    <section class="row">
        @if($isEdit)
        <div class="col-4">
            <div class="card">
                <div class="card-content">
                  <img src="{{$edit->product->image}}" class="card-img-top img-fluid" alt="singleminded">
                  <div class="card-body">
                    <h5 class="card-title">{{$edit->product->name}}</h5>
                    <p class="card-text">
                    {{$edit->product->description}}
                    </p>
                  </div>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Qty Order : {{$edit->qty}}</li>
                  <li class="list-group-item">Harga / pcs : {{rupiah($edit->product->price)}}</li>
                  <li class="list-group-item">Total Harga : {{rupiah($edit->total_price)}}</li>
                  <li class="list-group-item"><i class="bi bi-person"></i>  </li>
                </ul>
              </div>
        </div>
        @endif
        <div @if($isEdit) class="col-8" @else class="col-12" @endif>
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><h3> {{$isEdit ? 'Sunting' : 'Tambah'}} Pesanan </h3></div>
                </div>
                <div class="card-body">
                    <form @if($isEdit) action="/orders/{{$edit->id}}/edit" @else action="/orders/add" @endif method="POST">
                        @csrf
                       @if($isEdit == false)
                       <div class="form-group row">
                        <label for="" class="col-3">Produk</label>
                        <div class="col-9">
                            <select name="product_id" id="" class="form-control select2">
                                @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}} [ Harga : {{rupiah($product->price)}} ]</option>
                                @endforeach
                            </select>
                       </div>
                       </div>

                

                    <div class="form-group row mt-2">
                        <label for="" class="col-3">Jumlah Pesanan</label>
                        <div class="col-9">
                            <input type="number" name="qty" class="form-control" value="{{old('qty')}}">
                        </div>
                    </div>
                    @endif

                    <div class="form-group row mt-2">
                        <label for="" class="col-3">Nama kustomer</label>
                        <div class="col-9">
                            <input type="text" name="customer_name" class="form-control"  value="{{$isEdit ? $edit->customer_name : ''}}">
                        </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3">Nomer HP Kustomer</label>
                            <div class="col-9">
                                <input type="text" name="customer_phone" class="form-control" value="{{$isEdit ? $edit->customer_phone : ''}}">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3">Metode Pembayaran</label>
                            <div class="col-9">
                                <input type="text" name="payment_method" class="form-control" value="{{$isEdit ? $edit->payment_method : ''}}">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3">DP ( Down Payment )</label>
                            <div class="col-9">
                                <input type="tel" name="down_payment" class="form-control" value="{{$isEdit ? $edit->down_payment : ''}}">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3">Total Harga</label>
                            <div class="col-9">
                                <input type="tel" name="total_price" class="form-control" value="{{$isEdit ? $edit->total_price : ''}}">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3">Status Bayar</label>
                            <div class="col-9">
                                <select name="payment_status" id="" class="form-control select2">
                                    @php $p = ['down_payment' , 'paid','unpaid'] @endphp
                                    @foreach ($p as $item)
                                    <option value="{{$item}}" @if($isEdit) @if($item == $edit->payment_status) selected @endif @endif>{{strip_tags(payment_status($item))}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3">Status Pesanan</label>
                            <div class="col-9">
                                <select name="status" id="" class="form-control select2">
                                    @php $p = ['pending' ,'production' , 'on_hold' , 'production_done'] @endphp
                                    @foreach ($p as $item)
                                    <option value="{{$item}}" @if($isEdit) @if($item == $edit->status) selected @endif @endif>{{strip_tags(order_status($item))}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3">Catatan</label>
                            <div class="col-9">
                                <input type="text" name="note" class="form-control" value="{{$isEdit ? $edit->note : ''}}">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3">Estimasi Selesai</label>
                            <div class="col-9">
                                <input type="text" name="estimate_time" class="form-control" value="{{$isEdit ? $edit->estimate_time : ''}}">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-3"></div>
                            <div class="col-9">
                                <button class="btn btn-primary w-100" type="submit"><i class="bi bi-save"></i> Simpan</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection