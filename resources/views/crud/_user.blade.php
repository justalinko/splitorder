@extends('layouts.app') 

@section('content') 
<section class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header row">
                <div class="card-title col-9">
                    <h3>Semua Anggota</h3>
                </div>
                <div class="btn-group col-3">
                    <a href="/anggota/add" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Anggota</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover datatable">
                        <thead>
                            <th>
                                Nama 
                            </th>
                            <th>
                                Email / Phone
                            </th>
                            <th>
                                Komunitas
                            </th>
                            <th>
                                Level 
                            </th>
                            <th>
                                Alamat
                            </th>
                            <th>Maks Produksi</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}} / {{$user->phone}}</td>
                                    <td>{{$user?->community?->name}}</td>
                                    <td>
                                        {!!user_level($user->level)!!}
                                    </td>
                                    <td>
                                        {{$user->address}}
                                    </td>
                                    <td>
                                        {{$user->max_production}}
                                    </td>
                                    <td>
                                        {!!actionBtn('anggota' , $user->id , ['edit' , 'delete'])!!}
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
