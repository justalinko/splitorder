
@extends('layouts.app')
@section('content')
          <section class="row">
            <div class="col-12 col-lg-9">
              <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div
                          class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                          <div class="stats-icon purple mb-2">
                            <i class="iconly-boldShow"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">
                            Total Pesanan
                          </h6>
                          <h6 class="font-extrabold mb-0">{{$total_pesanan}}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div
                          class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                          <div class="stats-icon blue mb-2">
                            <i class="iconly-boldProfile"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Anggota</h6>
                          <h6 class="font-extrabold mb-0">{{$total_anggota}}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div
                          class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                          <div class="stats-icon green mb-2">
                            <i class="iconly-boldAdd-User"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Komunitas</h6>
                          <h6 class="font-extrabold mb-0">{{$total_komunitas}}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div
                          class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                          <div class="stats-icon red mb-2">
                            <i class="iconly-boldBookmark"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Kapasitas Produksi</h6>
                          <h6 class="font-extrabold mb-0">{{$kapasitas_produksi}}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  @if(auth()->user()->level == 'admin')
                  <div class="card">
                    <div class="card-header">
                      <h4>Pesanan Terbaru</h4>
                      <a href="/orders/add" class="btn btn-primary"><i class="bi bi-plus"></i> Pesanan Baru</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th>#ID</th>
                                    <th>Produk</th>
                                    <th>Kuantitas</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    @foreach($latestOrder as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>{{ $order->qty }}</td>
                                        <td>{!!order_status($order->status)!!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                  @else
                  <div class="row">
                    @foreach($orders as $order)
                    <div class="col-md-4 mb-2">
                      <div class="card">
                        <div class="card-content">
                          <img src="{{$order->product->image}}" class="card-img-top img-fluid" alt="singleminded">
                          <div class="card-body">
                            <h5 class="card-title">{{$order->product->name}}</h5>
                           
                          </div>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Qty Order : {{$order->qty}}</li>
                          <li class="list-group-item"> Selesai : {{\App\Models\SharedOrder::where('status','production_done')->where('order_id' , $order->id)->sum('production_total')}}</li>
                          <li class="list-group-item"> Belum Selesai : {{\App\Models\SharedOrder::where('status','production')->where('order_id' , $order->id)->sum('production_total')}}</li>
                          <li class="list-group-item"> Kendala  : {{\App\Models\SharedOrder::where('status','on_hold')->where('order_id' , $order->id)->sum('production_total')}}</li>
                        </ul>
                      </div>
                    </div>
                    @endforeach
                    {{ $orders->links() }}
                  </div>                  
                  @endif
                </div>
              </div>

            </div>
            <div class="col-12 col-lg-3">
              <div class="card">
                <div class="card-body py-4 px-4">
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">
                      <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}} " alt="{{auth()->user()->name}}" />
                    </div>
                    <div class="ms-3 name">
                      <h5 class="font-bold">{{auth()->user()->name}}</h5>
                      <h6 class="text-muted mb-0"><i class="bi bi-phone"></i> {{auth()->user()->phone}}</h6>
                     
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                <div class=" d-flex align-items-center py-1 px-1">
                    <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#propile"><i class="bi bi-person"></i> Profile</a>&nbsp;&nbsp;
                    <a href="/auth/logout" class="btn btn-outline-danger btn-sm ml-2"><i class="bi bi-box-arrow-right"></i> Logout</a>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h4>Anggota Terbaru</h4>
                </div>
                <div class="card-content pb-4">
                    @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                    <div class="recent-message d-flex px-4 py-3">
                      <div class="avatar avatar-lg">
                        <img src="https://ui-avatars.com/api/?name={{$user->name}}" />
                      </div>
                      <div class="name ms-4">
                        <h5 class="mb-1">{{$user->name}}</h5>
                        <h6 class="text-muted mb-0"><i class="bi bi-phone"></i> {{$user->phone}} </h6>
                      </div>
                    </div>
                    @endforeach
             
                  <div class="px-4">
                    <button
                      class="btn btn-block btn-xl btn-outline-primary font-bold mt-3" onclick="window.location.href='/anggota'"
                    >
                      Semua Anggota
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <div class="modal fade" id="propile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Pengaturan Akun ( {{auth()->user()->community?->name}} )</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/auth/update" method="POST">
                    <div class="form-group row">
                    <label for="" class="col-md-3">Nama</label>
                    <div class="col-md-9">
                      <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}">
                    </div>
                    </div>
                    <div class="form-group row mt-2">
                    <label for="" class="col-md-3">Email</label>
                    <div class="col-md-9">
                      <input type="text" name="email" class="form-control" value="{{auth()->user()->email}}">
                    </div>  
                    </div>
                    <div class="form-group row mt-2">
                      <label for="" class="col-md-3">Alamat</label>
                      <div class="col-md-9">
                        <textarea name="address" class="form-control">{{auth()->user()->address}}</textarea>
                      </div>  
                    </div> 
                    <div class="form-group row mt-2">
                      <label for="" class="col-md-3">No. Hp</label>
                      <div class="col-md-9">
                        <input type="text" name="phone" class="form-control" value="{{auth()->user()->phone}}">
                      </div>  
                    </div>
                    <div class="form-group row mt-2">
                      <label for="" class="col-md-3">Max Produksi</label>
                      <div class="col-md-9">
                        <input type="number" name="max_production" class="form-control" value="{{auth()->user()->max_production}}">
                      </div>
                    </div>
                    <div class="form-group row mt-2">
                      <label for="" class="col-md-3">Password</label>
                      <div class="col-md-9">
                        <input type="password" name="password" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                      </div>  
                    </div>     
                    <div class="form-group row mt-4">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                      <button class="btn btn-primary w-100" type="submit">Simpan</button>
                    </div>
                    </div>            
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
@endsection

