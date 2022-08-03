<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <title>{{ config('app.name', 'Holomia') }} | @yield('title')</title> --}}
<meta name="description" content="Holomia">
<meta name="author" content="Holomia">
<link rel="shortcut icon" type="image/jpg" href="{{ asset('images/icon.png') }}"/>
<meta name="csrf-token" content={{ csrf_token() }}>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://kit.fontawesome.com/f75ab26951.js" crossorigin="anonymous"></script>
@routes
</head>
<body class="hold-transition skin-blue sidebar-mini" >

@inertia

<script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
</body>
</html>
