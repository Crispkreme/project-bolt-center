<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Stylesheets -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/feather.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/summernote-bs4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/intlTelInput.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plyr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        <script src="{{ asset('js/feather.min.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/apexcharts.min.js') }}"></script>
        <script src="{{ asset('js/chart-data.js') }}"></script>
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('js/sweetalerts.min.js') }}"></script>
        <script src="{{ asset('js/swiper.min.js') }}"></script>
        <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('js/daterangepicker.js') }}"></script>
        <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('js/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('js/intlTelInput.js') }}"></script>
        <script src="{{ asset('js/plyr-js.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/ResizeSensor.js') }}"></script>
        <script src="{{ asset('js/theia-sticky-sidebar.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </head>
    <body>

        <div id="global-loader">
            <div class="whirly-loader"> </div>
        </div>
    
        <!-- Main Wrapper -->
        <div class="main-wrapper">

            <x-header />

            <x-sidebar />

            <x-collapsed-sidebar />

            <x-collapsed-sidebar />

            {{ $slot }}

        </div>

        <!-- /Main Wrapper -->
        <div class="customizer-links" id="setdata">
            <ul class="sticky-sidebar">
                <li class="sidebar-icons">
                    <a href="#" class="navigation-add" data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-original-title="Theme">
                        <i data-feather="settings" class="feather-five"></i>
                    </a>
                </li>
            </ul>
        </div>

        <x-modal.add-units />

        {{-- CATEGORY --}}
        <x-modal.add-category />
        <x-modal.edit-category />

        {{-- SUB CATEGORY --}}
        <x-modal.add-sub-category />
        <x-modal.edit-sub-category />
        
        {{-- COMPANY --}}
        <x-modal.add-company />
        <x-modal.edit-company />
    
        <x-modal.add-unit />
        <x-modal.add-variation />
        <x-modal.view-notes />

        @stack('scripts')
        
    </body>
</html>
