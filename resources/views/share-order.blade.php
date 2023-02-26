@extends('layouts.app')

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Bagikan pesanan ke  produksi</h3>
                    </div>
                    <div class="card-body">
                       <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-content">
                                  <img src="{{$product->image}}" class="card-img-top img-fluid" alt="singleminded">
                                  <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-text">
                                    {{$product->description}}
                                    </p>
                                  </div>
                                </div>
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item">Qty Order : {{$order->qty}}</li>
                                  <li class="list-group-item">Harga / pcs : {{rupiah($product->price)}}</li>
                                  <li class="list-group-item">Total Harga : {{rupiah($order->total_price)}}</li>
                                  <li class="list-group-item"><i class="bi bi-person"></i>  </li>
                                </ul>
                              </div>
                        </div>
                        <div class="col-8">
                            <div class="alert alert-info">
                                JUMLAH PESANAN : {{$order->qty}}<br>
                                JUMLAH ANGGOTA : {{count($community)}}<br>
                                PESANAN / ANGGOTA : {{round($order->qty / count($community) )}} Produksi / Anggota
                            </div>
                            <form method="POST" action="/orders/{{$order->id}}/share">
                            
                                @csrf
                                @foreach($community as $com)
                                <div class="form-group row mt-2">
                                    <label for="" class="col-3"># {{$com->name}}</label>
                                    <div class="col-9">
                                        <input type="number" name="user[{{$com->id}}]" class="form-control" placeholder="Produksi untuk {{$com->name}} | Max : {{$com->max_production}}" max="{{$com->max_production}}" min="1">
                                    </div>
                                </div>
                                @endforeach

                                <div class="form-group row mt-3">
                                    <label for="" class="col-3">Estimasi Jadi</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="estimate_time" value="30 Hari">
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <div class="col-3"></div>
                                        <div class="col-9">
                                            <button class="btn btn-primary w-100" type="submit"><i class="bi bi-share"></i> Teruskan</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection