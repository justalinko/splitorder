@extends('layouts.app')

@section('content')
    <section class="row">
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
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><h3>Distribusi Order Ke Komunitas</h3></div>
                </div>
                <div class="card-body">
                    <form action="/orders/{{$order->id}}/distribute" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Di Distribusikan ke :</label>
                            <select name="community_id" id="" class="form-control">
                                @foreach ($communities as $community)
                                @php $anggota = \App\Models\User::where('community_id' , $community->id) @endphp
                                @if($anggota->sum('max_production') < $order->qty) 
                                    <option value="{{$community->id}}" disabled>{{$community->name}} - {{$anggota->count()}} Anggota  - {{$anggota->sum('max_production')}} Max Produksi</option>
                                @else
                                <option value="{{$community->id}}" >{{$community->name}} - {{$anggota->count()}} Anggota  - {{$anggota->sum('max_production')}} Max Produksi</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary w-100">Distribusikan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection