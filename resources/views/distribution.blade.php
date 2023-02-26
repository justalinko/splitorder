@extends('layouts.app')


@section('content')
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Distribusi Pesanan Ke Komunitas</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>ID ORDER</th>
                            <th>Produk</th>
                            <th>Jumlah Pesanan</th>
                            <th>Anggota</th>
                            <th>Komunitas</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Tanggal Pesan</th>
                            <th>Estimasi Jadi</th>
                            <th>Kirim</th>
                        </thead>
                        <tbody>
                            @foreach ($distributions as $distribution)
                                <tr>
                                    <td>{{$distribution->id}}</td>
                                    <td>{{$distribution->product->name}}</td>
                                    <td>{{$distribution->qty}}</td>
                                    <td>
                                        @foreach(\App\Models\User::where('community_id' , $distribution?->community_id)->get() as $user)
                                            <span class="badge bg-info">{{$user->name}}</span>
                                        @endforeach
                                    </td>
                                    <td><span class="badge bg-success"> {{$distribution?->community?->name}} </span></td>
                                    <td>
                                        {!!order_status($distribution->status)!!}
                                    </td>
                                    <td>
                                       <a href="#" data-bs-toggle="modal" data-bs-target="#ingfo_{{$distribution->id}}" class="btn btn-info"><i class="bi bi-info"></i></a>
                                    </td>
                                    <td>{{$distribution?->created_at}}</td>
                                    <td>{{$distribution->estimate_time}}</td>
                                    <td>
                                        @if($distribution->status == 'production_done')
                                         <div class="btn-group">
                                            <a href="/shipping/{{$distribution->id}}/add" class="btn btn-sm btn-primary"><i class="bi bi-truck"></i> </a>
                                         </div>
                                        @else
                                        <span class="badge bg-warning">Belum Jadi</span>
                                        @endif
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