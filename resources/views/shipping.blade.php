@extends('layouts.app')

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Pengiriman</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped tabled-hover datatable">
                        <thead>
                            <th>ID Pengiriman</th> <th>ORDER ID</th> <th>Produk</th><th>Ekspedisi</th><th>Status</th><th>Catatan</th><th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach($shippings as $sh)
                            <tr>
                                <td>{{$sh->id}}</td>
                                <td>{{$sh->order->id}}</td>
                                <td>{{$sh->order->product->name}}</td>
                                <td>{{$sh->expedition->name}}</td>
                                <td>{!!shipping_status($sh->status)!!}<br> {{$sh->estimated_time}}</td>
                                <td>{{$sh->note}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection