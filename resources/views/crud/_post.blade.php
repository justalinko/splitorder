@extends('layouts.app') 

@section('content') 
<section class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header row">
                <div class="card-title col-9">
                    <h3>Semua Postingan</h3>
                </div>
                <div class="btn-group col-3">
                    <a href="/post/add" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Post</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover datatable">
                        <thead>
                            <th>
                               Judul
                            </th>
                            <th>
                                Author
                            </th>
                            <th>
                                Link
                            </th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                           @foreach($posts as $x)
                           <tr>
                            <td>
                                {{$x->title}}
                            </td>
                            <td>
                                {{$x->author}}
                            </td>
                            <td>
                                <a href="/post/{{$x->slug}}" target="_blank">{{$x->slug}}</a>
                            </td>
                        
                            <td>
                                {!!actionBtn('post' , $x->id , ['edit' , 'delete'])!!}
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
