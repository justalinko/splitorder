@extends('layouts.app')

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Semua Produk</h3>
                        <a href="/product/add" class="btn btn-primary mt-1"><i class="bi bi-plus"></i> Tambah Produk</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover datatable">
                        <thead>
                            <th>
                                #
                            </th>
                            <th>Nama Produk</th>
                            <th>Description</th>
                            <th>Harga/ Pcs</th>
                            <th>Min Order</th>
                            <th>Max Order</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{$p->name}}
                                    </td>
                                    <td>
                                        {{$p->description}}
                                    </td>
                                    <td>{{rupiah($p->price)}}</td>
                                    <td>{{$p->min_order}}</td>
                                    <td>{{$p->max_order}}</td>
                                    <td>{{$p->note}}</td>
                                    <td>
                                       <div class="btn-group">
                                        <a href="/product/{{$p->id}}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                        <a href="/product/{{$p->id}}/delete" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a> 
                                       </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection