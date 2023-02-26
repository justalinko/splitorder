@include('layouts.header')
<div id="main">
    <header class="mb-3">
      <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
      </a>
    </header>
    
    <div class="m-3">
        <h3><i class="bi bi-arrow-right"></i> {{ucfirst(basename(url()->current()))}}</h3>
      </div>
      <div class="page-content">
    @yield('content')
      </div>
    <footer class="mt-5">
        <div class="footer clearfix mb-0 text-muted">
          <div class="float-start">
            <p>&copy; {{date('Y')}}</p>
          </div>
          <div class="float-end">
            <p>
              Sistem Pengelolahan Kelompok Home Industri Genteng 
            </p>
          </div>
        </div>
      </footer>
    </div>
  </div>

</div>

@include('layouts.footer')