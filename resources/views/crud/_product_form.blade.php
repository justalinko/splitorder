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
                            Produk
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" @if($isEdit) action="/product/{{$edit->id}}/edit" @else action="/product/add" @endif >
                        @csrf
                        
                            @if($isEdit)
                            <div class="form-group row">
                                <div class="col-8 mx-auto">
                                <img src="{{$edit->image}}" alt="" class="img-fluid">
                                </div>
                            </div>
                            @endif
                            <div class="form-group row mt-2">
                            <label for="" class="col-3 text-end">Thumbnail Image</label>
                            <div class="col-9">
                                <input type="file" name="image" class="image-preview-filepond">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3 text-end">Nama Produk</label>
                            <div class="col-9">
                                <input type="text" name="name" class="form-control" value="{{$isEdit ? $edit->name : ''}}" required>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3 text-end">Harga/pcs</label>
                            <div class="col-9">
                                <input type="number" name="price" class="form-control" value="{{$isEdit ? $edit->price : ''}}" required>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3 text-end">Deskripsi</label>
                            <div class="col-9">
                                <textarea name="description" id="summernote" cols="30" rows="10"  required>{{$isEdit ? $edit->description : ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="" class="col-3"> Minimal Order</label>
                            <div class="col-9">
                                <input type="number" name="min_order" class="form-control" value="{{$isEdit ? $edit->min_order : ''}}" required>
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="" class="col-3">Maksimal Order</label>
                            <div class="col-9">
                                <input type="number" name="max_order" class="form-control" value="{{$isEdit ? $edit->max_order : ''}}" required>
                        </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="" class="col-3">Catatan</label>
                            <div class="col-9">
                                <textarea name="note" id="" placeholder="Beri catatan :  contoh Estimasi pengerjaan dll" class="form-control" required>{{$isEdit ? $edit->note : ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <div class="col-3"></div>
                            <div class="col-9">
                                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection