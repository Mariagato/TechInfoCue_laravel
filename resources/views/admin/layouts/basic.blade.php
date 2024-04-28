<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('meta_title'){{ config('app.name', 'CMS') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/admin-style.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="app bg-main-gradient">
        @yield('body')
        <p class="text-center text-white">&copy; Copyright {{ date('Y') }} by <a href="//rhiss.net"
                target="_blank">Rhiss.net</a></p>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/admin-global.min.js') }}" defer></script>

    <!-- Firebase configuration -->

    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-app.js";
        import {
            getAnalytics
        } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyCghdeOqUjplId0WE7tLd91bNi0yG8FtUE",
            authDomain: "ti-database.firebaseapp.com",
            databaseURL: "https://ti-database-default-rtdb.firebaseio.com",
            projectId: "ti-database",
            storageBucket: "ti-database.appspot.com",
            messagingSenderId: "922642142180",
            appId: "1:922642142180:web:49e7a728a9243e92be6df1",
            measurementId: "G-C6835WWHF6"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
    </script>




    @yield('scripts')
</body>
