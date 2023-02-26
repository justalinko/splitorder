@extends('layouts.app') 
@section('content') 
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    @if($isEdit)
                        Sunting 
                    @else
                        Tambah
                    @endif
                    Postingan
                </div>
            </div>
            <div class="card-body">
                <form @if($isEdit) action="/post/{{$edit->id}}/edit" @else action="/post/add" @endif>
                    @csrf

                    <div class="form-group row">
                        @if($isEdit)
                            <div class="col-8 mx-auto">
                            <img src="{{$edit->image}}" alt="" class="img-fluid">
                            </div>
                        @endif
                        <label for="" class="col-3 text-end">Thumbnail Image</label>
                        <div class="col-9">
                            <input type="file" name="image" class="image-preview-filepond">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-3 text-end">Judul</label>
                        <div class="col-9">
                            <input type="text" name="title" class="form-control" value="{{$isEdit ? $edit->title : ''}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-3 text-end">Author</label>
                        <div class="col-9">
                            <input type="text" name="author" class="form-control" value="{{$isEdit ? $edit->author : auth()->user()->name}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-3 text-end">Konten</label>
                        <div class="col-9">
                            <textarea name="content" id="summernote" cols="30" rows="10"  required>{{$isEdit ? $edit->content : ''}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
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
