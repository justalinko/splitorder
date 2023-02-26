<script src="{{asset('assets/extensions/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

@yield('js')



<script src="{{asset('assets/extensions/toastify-js/src/toastify.js')}}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{asset('assets/js/pages/datatables.js')}}"></script>
<script src="{{asset('assets/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
<script src="{{asset('assets/js/pages/form-element-select.js')}}"></script>
<script src="{{asset('assets/extensions/summernote/summernote-lite.min.js')}}"></script>
<script src="{{asset('assets/js/pages/summernote.js')}}"></script>

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="{{asset('assets/extensions/filepond/filepond.js')}}"></script>
<script src="{{asset('assets/js/pages/filepond.js')}}"></script>

@if(session('success'))
<script>
    Toastify({
    text: "{{session('success')}}",
    duration: 3000,
    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
  }).showToast()
</script>
@endif

@if(session('error'))
<script>
    Toastify({
    text: "{{session('error')}}",
    duration: 3000,
    backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
  }).showToast()
</script>
@endif

</body>
</html>
