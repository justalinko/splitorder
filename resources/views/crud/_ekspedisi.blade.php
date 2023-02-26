@extends('layouts.app') 

@section('content') 
<section class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header row">
                <div class="card-title col-9">
                    <h3>Semua Ekspedisi</h3>
                </div>
                <div class="btn-group col-3">
                    <a href="/ekspedisi/add" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Ekspedisi</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover datatable">
                        <thead>
                            <th>
                               Nama Ekspedisi
                            </th>
                            <th>
                                Alamat
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Status 
                            </th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                           @foreach($expeditions as $x)
                           <tr>
                            <td>
                                {{$x->name}}
                            </td>
                            <td>
                                {{$x->address}}
                            </td>
                            <td>
                                {{$x->phone}}
                            </td>
                            <td>
                                {!!ekspedisi_status($x->status)!!}
                            </td>
                            <td>
                                {!!actionBtn('ekspedisi' , $x->id , ['edit' , 'delete'])!!}
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
