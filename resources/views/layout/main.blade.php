@extends('../layout/base')

@section('body')
    <body class="py-5">
        @yield('content')
        @include('../layout/components/dark-mode-switcher')

        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        @vite('resources/js/app.js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- END: JS Assets-->

        @yield('script')
        @livewireScripts
    </body>
@endsection
