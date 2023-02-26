@extends('layouts.app') 

@section('content') 
<section class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>@if($isEdit) Sunting @else Daftarkan @endif Anggota</h3>
                </div>
            </div>
            <div class="card-body">
                <form @if($isEdit) action="/anggota/{{$edit->id}}/edit" @else  action="/anggota/add" @endif method="post">
                @csrf
                <div class="form-group row">
                    <label for="" class="col-3 text-end">Komunitas </label>
                    <div class="col-9">
                        <select name="community_id" id="" class="form-control choices" required>
                            <option value="">Pilih Komunitas</option>
                            @foreach(\App\Models\Community::all() as $x)
                                <option value="{{$x->id}}" @if($isEdit) {{$edit->community_id == $x->id ? 'selected' : ''}} @endif>{{$x->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-3 text-end">Nama </label>
                    <div class="col-9">
                        <input type="text" name="name" class="form-control" value="{{$isEdit ? $edit->name : ''}}"  required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-3 text-end">Email </label>
                    <div class="col-9">
                        <input type="email" name="email" class="form-control" value="{{$isEdit ? $edit->email : ''}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-3 text-end">Phone </label>
                    <div class="col-9">
                        <input type="tel" name="phone" class="form-control" value="{{$isEdit ? $edit->phone : ''}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-3 text-end">Maks Produksi </label>
                    <div class="col-9">
                        <input type="tel" name="max_production" class="form-control" value="{{$isEdit ? $edit->max_production : ''}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-3 text-end">Alamat </label>
                    <div class="col-9">
                        <textarea name="address" id="" cols="30" rows="10" class="form-control" required>{{$isEdit ? $edit->address : ''}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-3 text-end">Level </label>
                    <div class="col-9">
                        <select name="level" id="" class="form-control" required>
                            <option value="">Pilih Level</option>
                            <option value="admin" @if($isEdit) @if($edit->level == 'admin') selected @endif @endif>Admin</option>
                            <option value="user" @if($isEdit) @if($edit->level == 'user') selected @endif @endif>Anggota</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-3 text-end">Password </label>
                    <div class="col-9">
                        <input type="password" name="password" class="form-control" >
                        <small class="text-muted">* Kosongkan jika tidak ingin mengubah password</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-3 text-end">Confirm Password </label>
                    <div class="col-9">
                        <input type="password" name="confirm_password" class="form-control" >
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-3"></div>
                    <div class="col-9">
                        <button class="btn btn-primary w-100" type="submit"><i class="bi bi-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection
