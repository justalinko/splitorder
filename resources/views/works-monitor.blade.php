@extends('layouts.app')

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Monitor Kerjaan</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover datatable">
                        <thead>
                            <th>ID ORDER</th>
                            <th>PRODUK</th>
                            <th>Kapasitas Produksi</th>
                            <th>Pekerja</th>
                            <th>Status</th>
                            <th>Catatan</th>
                          
                        </thead>
                        <tbody>
                            @foreach($works as $work)
                            <tr>
                                <td>{{$work->order_id}}</td>
                                <td>{{$work->order?->product?->name}}</td>
                                <td>{{$work->production_total}}</td>
                                <td>{{$work->user?->name}} <span class="badge bg-primary">{{$work->community?->name}}</span></td>
                                <td>{!!order_status($work->status)!!}</td>
                                <td>{{$work->note}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection