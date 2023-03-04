@extends('layouts.app')
 @section('content') 
 <section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>
                        @if($isEdit) Sunting @else Tambah @endif Komunitas
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form @if($isEdit) action="/komunitas/{{$edit->id}}/edit" @else action="/komunitas/add" @endif >
                @csrf
                <div class="form-group row">
                    <label for="" class="col-3 text-end">Nama Komunitas</label>
                    <div class="col-9">
                        <input type="text" name="name" class="form-control choices" value="{{$isEdit ? $edit->name : ''}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-3 text-end">Ketua Komunitas</label>
                    <div class="col-9">
                       <select name="user_id" id="user_id" class="form-control">
                            <option value="">Pilih Ketua Komunitas</option>
                            @foreach(\App\Models\User::all() as $x)
                                 <option value="{{$x->id}}" @if($isEdit) {{$edit->user_id == $x->id ? 'selected' : ''}} @endif>{{$x->name}} - {{$x->community?->name}} </option>
                            @endforeach
                       </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-3 text-end">Alamat</label>
                    <div class="col-9">
                        <textarea name="address" id="" cols="30" rows="10" class="form-control" required>{{$isEdit ? $edit->address : ''}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-3 text-end">Profile</label>
                    <div class="col-9">
                        <textarea name="profile" id="" cols="30" rows="10" class="form-control" required>{{$isEdit ? $edit->profile : ''}}</textarea>
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
