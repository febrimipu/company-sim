<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    {{-- <link href="{{ asset('dist/css/tabler.min.css?1684106062')}}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('dist/css/tabler-flags.min.css?1684106062')}}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('dist/css/tabler-payments.min.css?1684106062')}}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('dist/css/tabler-vendors.min.css?1684106062')}}" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('dist/css/demo.min.css?1684106062')}}" rel="stylesheet" /> --}}
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/js/tabler.js', 'resources/sass/tabler.scss'])
</head>

<body>
    {{-- <script src="{{ asset('dist/js/demo-theme.min.js?1684106062')}}"></script> --}}
    <div class="page">
        <!-- Navbar -->
        @include('partials.navigation.navbar')
        @include('partials.navigation.menu')
        <div class="page-wrapper">
            <!-- Page header -->
            @if (isset($header))
                <header class="page-header d-print-none">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            @yield('page-body')
            @yield('content')

        </div>
    </div>
    {{-- Footer --}}
    @include('partials.footer.bottom')

   

    {{-- Libs Scripts  --}}
    @stack('libraries-scripts')

    {{-- <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('dist/js/demo.min.js') }}" defer></script> --}}

    {{-- - Page Scripts - --}}
    @stack('page-scripts')

    {{-- @livewireScripts --}}
</body>

</html>
