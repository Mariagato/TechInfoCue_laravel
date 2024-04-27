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
<div class="app">
    @include('admin.includes.aside')
    <div id="content" class="app-content" role="main">
        <div class="box">
            @include('admin.includes.navbar')
            <div class="box-row">
                <div class="box-cell">
                    <div class="box-inner padding ng-scope">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="page-title">@yield('title')</h3>
                            </div>

                            <div class="col-lg-6">
                                <div class="pull-right">
                                    @yield('breadcrumb')
                                </div>
                            </div>
                        </div>
                        @yield('body')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    var token_src = '{{csrf_token()}}',
        message = '{{$message ?? ''}}',
        type_message = '{{$type_message ?? 'success'}}';
</script>
@yield('js_vars')
<script src="{{ asset('js/admin-global.min.js') }}" defer></script>
@yield('scripts')
</body>