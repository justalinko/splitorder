@extends('layouts.app')

@section('content') 

<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>
                        @if($isEdit)
                            Sunting
                        @else
                            Tambah
                        @endif
                        Ekspedisi
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form @if($isEdit) action="/ekspedisi/{{$edit->id}}/edit" @else action="/ekspedisi/add" @endif method="POST" >
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-3 text-end">Nama Ekspedisi</label>
                        <div class="col-9">
                            <input type="text" name="name" class="form-control" value="{{$isEdit ? $edit->name : ''}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-3 text-end">Phone</label>
                        <div class="col-9">
                            <input type="tel" name="phone" class="form-control" value="{{$isEdit ? $edit->phone : ''}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-3 text-end">Alamat</label>
                        <div class="col-9">
                            <textarea name="address" id="" cols="30" rows="10" class="form-control" required>{{$isEdit ? $edit->address : ''}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3"></div>
                        <div class="col-9">
                            <button type="submit" class="btn btn-primary w-100">
                              <i class="bi bi-save"></i>  Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
