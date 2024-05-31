{{-- Head --}}
@include('partials.head.head')
<body>
    <script src="{{ asset('dist/js/demo-theme.min.js') }}"></script>
    <div class="page">
        {{-- Header --}}
        @include('partials.header.header')
        {{-- Navigation --}}
        @include('partials.navigation.menu')
        <div class="page-wrapper">
            <div>
                @yield('content')
            </div>
        </div>
    </div>
    {{-- Footer --}}
    @include('partials.footer.bottom')
    <!-- Libs JS -->
    @stack('page-libraries')
    <!-- Tabler Core -->
    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js') }}" defer></script>
    {{-- - Page Scripts - --}}
    @stack('page-scripts')

    @livewireScripts
</body>

</html>
