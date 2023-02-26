<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard </title>

    <link rel="stylesheet" href="{{asset('assets/css/main/app.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/main/app-dark.css')}}" />
    <link
      rel="shortcut icon"
      href="{{asset('assets/images/logo/favicon.svg')}}"
      type="image/x-icon"
    />
 
    <link rel="stylesheet" href="{{asset('assets/css/shared/iconly.css')}}" />
    <link
    rel="stylesheet"
    href="{{asset('assets/extensions/toastify-js/src/toastify.css')}}"
  />
  <link
  rel="stylesheet"
  href="{{asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}"
/>
<link rel="stylesheet" href="{{asset('assets/css/pages/datatables.css')}}" />
<link
rel="stylesheet"
href="{{asset('assets/extensions/choices.js/public/assets/styles/choices.css')}}"
/>

<link rel="stylesheet" href="{{asset('assets/css/pages/summernote.css')}}" />
<link
  rel="stylesheet"
  href="{{asset('assets/extensions/summernote/summernote-lite.css')}}"
/>
<link rel="stylesheet" href="{{asset('assets/extensions/filepond/filepond.css')}}" />
<link
  rel="stylesheet"
  href="{{asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css')}}"
/>
<link
  rel="stylesheet"
  href="{{asset('assets/extensions/toastify-js/src/toastify.css')}}"
/>

    @yield('css')
  </head>

  <body>
    <script src="{{asset('assets/js/initTheme.js')}}"></script>
    <div id="app">
     @if(auth()->user()->level == 'admin')
      @include('layouts.sidebar')
      @else
      @include('layouts.sidebar-user')
      @endif