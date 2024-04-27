<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('meta_title'){{ config('app.name', 'CMS') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/admin-style.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="app bg-main-gradient">
    @yield('body')
    <p class="text-center text-white">&copy; Copyright {{date('Y')}} by <a href="//rhiss.net" target="_blank">Rhiss.net</a></p>
</div>
<!-- Scripts -->
<script src="{{ asset('js/admin-global.min.js') }}" defer></script>
@yield('scripts')
</body>