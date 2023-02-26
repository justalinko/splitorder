@extends('layouts.app')


@section('content')
    <section class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-content">
                  <img src="{{$order->product->image}}" class="card-img-top img-fluid" alt="singleminded">
                  <div class="card-body">
                    <h5 class="card-title">{{$order->product->name}}</h5>
                    <p class="card-text">
                    {{$order->product->description}}
                    </p>
                  </div>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Qty Order : {{$order->qty}}</li>
                  <li class="list-group-item">Harga / pcs : {{rupiah($order->product->price)}}</li>
                  <li class="list-group-item">Total Harga : {{rupiah($order->total_price)}}</li>
                  <li class="list-group-item"><i class="bi bi-person"></i>  </li>
                </ul>
              </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Kirim Pesanan</h3>
                    </div>
                </div>
                <form method="POST" action="/shipping/{{$order->id}}/add">
                    @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-3">Ekspedisi Pengiriman</label>
                        <div class="col-9">
                            <select name="expedition_id" id="" class="form-control select2">
                               @foreach($expeditions as $expedition)
                                 <option value="{{$expedition->id}}" @if($expedition->status != 'available') disabled @endif>{{$expedition->name}} [ {{strip_tags(ekspedisi_status($expedition->status))}} ]</option>
                                 @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="" class="col-3">Estimasi Pengiriman</label>
                        <div class="col-9">
                            <input type="text" name="estimated_time" class="form-control" value="{{old('estimated_time')}}">
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="" class="col-3">Tanggal Pengiriman</label>
                        <div class="col-9">
                            <input type="date" name="delivery_date" class="form-control" value="{{old('delivery_date')}}">
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="" class="col-3">Catatan ( Alamat , dll )</label>
                        <div class="col-9">
                            <textarea name="note" id="" cols="30" rows="10" class="form-control">{{old('note')}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <div class="col-3"></div>
                        <div class="col-9">
                            <button type="submit" class="btn btn-primary w-100"><i class="bi bi-share"></i> Kirim Pesanan</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection