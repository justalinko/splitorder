@extends('layouts.app') 

@section('content') 
<section class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header row">
                <div class="card-title col-9">
                    <h3>Semua Komunitas</h3>
                </div>
                <div class="btn-group col-3">
                    <a href="/komunitas/add" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Komunitas</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover datatable">
                        <thead>
                            <th>
                                Ketua Komunitas
                            </th>
                            <th>
                                Nama Komunitas
                            </th>
                            <th>
                                Jumlah Anggota
                            </th>
                            <th>
                                Maks Produksi 
                            </th>
                            <th>
                                Alamat
                            </th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($communities as $kom)
                            @php
                            if($kom->user_id != null){
                            $ketua = \App\Models\User::find($kom->user_id);
                            $ketua = $ketua->nama;
                            }else{
                            $ketua = 'Belum ada';
                            }
                            $totalAnggota = $kom->users()->count();
                            $maxProduction = $kom->users()->sum('max_production');
                            @endphp
                                <tr>
                                    <td>{{$ketua}}</td>
                                    <td>{{$kom->name}}</td>
                                    <td>{{$totalAnggota}}</td>
                                    <td>
                                        {{$maxProduction}}
                                    </td>
                                    <td>
                                        {{$kom->address}}
                                    </td>
                                    <td>
                                        {!!actionBtn('komunitas' , $kom->id , ['edit' , 'delete'])!!}
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
