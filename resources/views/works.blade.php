@extends('layouts.app')

@section('content')
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3> Kerjaan</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover datatable">
                        <thead>
                            <th>ID ORDER</th>
                            <th>PRODUK</th>
                            <th>Kapasitas Produksi</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach($works as $work)
                            <tr>
                                <td>{{$work->order_id}}</td>
                                <td>{{$work->order?->product?->name}}</td>
                                <td>{{$work->production_total}}</td>
                                <td>{{$work->note}}</td>
                            
                                <td>{!!order_status($work->status)!!}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/works/{{$work->id}}/production" class="btn btn-sm btn-primary">Di Produksi</a>
                                        <a href="/works/{{$work->id}}/done" class="btn btn-sm btn-success">Selesai</a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#kendala_{{$work->id}}"  class="btn btn-sm btn-warning">Kendala</a>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="kendala_{{$work->id}}" tabindex="-1" aria-labelledby="kendala_{{$work->id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="kendala_{{$work->id}}Label">Tuliskan mengapa anda mengalami kendala produksi? </h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="/works/{{$work->id}}/delay" >
                                        @csrf
                                        <label for="">Catatan</label>
                                        <textarea name="note" id="" cols="30" rows="10" class="form-control"></textarea>
                                        <br>
                                        <button type="submit" class="btn btn-primary w-100">Kirim</button>
                                      </form>
                                    </div>
                                  
                                  </div>
                                </div>
                              </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection