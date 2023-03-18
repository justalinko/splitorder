@extends('layouts.app')


@section('content')
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Semua Pesanan</h3>
                    @if(auth()->user()->level == 'admin')
                    <a href="/orders/add" class="btn btn-primary end-0"><i class="bi bi-plus"></i> Pesanan Baru</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                 
                    <table class="table table-striped table-hover datatable">
                        <thead>
                            <th>#ID</th>
                            <th>Produk</th>
                            <th>Kuantitas</th>
                            <th>Catatan</th>
                            <th>Kustomer</th>
                            <th>Status Pembayaran</th>
                            <th>Detail Harga</th>
                            <th>Status Pesanan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->product->name}}</td>
                                   
                                    <td>{{$order->qty}}</td>
                                    <td>{{$order->product->note}}</td>
                                    <td>{{$order->customer_name}} ( {{$order->customer_phone}} )</td>
                                    <td>
                                      {!!payment_status($order->payment_status)!!}
                                    </td>
                                    <td>
                                       <span class="badge bg-warning">DP : {{rupiah($order->down_payment)}} </span> <span class="badge bg-success"> TOTAL : {{rupiah($order->total_price)}}</span> <span class="badge bg-danger">KURANG : {{rupiah($order->total_price - $order->down_payment)}}</span>
                                    </td>
                                    <td>
                                      {!!order_status($order->status)!!}
                                      @if($order->status == 'distribute' || $order->status == 'production' || $order->status == 'production_done')
                                      @php
                                          
                                          $kerjakan_siapa = \App\Models\Community::find($order->community_id);
                                    

                                      @endphp
                                        <span class="badge bg-info"> <i class="bi bi-person-workspace"></i> {{$kerjakan_siapa?->name }}</span>
                                        @endif
                                    
                                    </td>
                                  
                                    <td>
                                        <div class="btn-group">
                                        @if(!in_array($order->status ,['distribute' , 'on_hold' , 'production_done' ,'production']))
                                        <a href="/orders/{{$order->id}}/distribute" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-title="Distribusi pesanan" data-bs-placement="top"><i class="bi bi-forward"></i></a>
                                        @endif
                                        <a href="/orders/{{$order->id}}/edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Pesanan " class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection