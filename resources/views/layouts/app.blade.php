<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf-token" />
    <meta name="robots" content="noindex" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name') }} | @yield('title')</title>
    
    <!-- begin::Icon (used by all pages) -->
    <link rel="shortcut icon" href="{{ cdn('assets/media/favicon/app.png') }}" />
    <!-- end::Icon -->

    <!-- begin::Fonts (used by all pages) -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" />
    <!-- end::Fonts -->

    <!-- begin::Bootstrap CSS (used by all pages) -->
    <link rel="stylesheet" type="text/css" href="{{ cdn('bootstrap@5.2.3/dist/css/bootstrap.min.css', 'css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ cdn('bootstrap@5.2.3/dist/css/bootstrap.min.css.map', 'css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ cdn('bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css', 'css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ cdn('bootstrap-icons@1.10.2/font/bootstrap-icons.css', 'css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ cdn('bootstrap-table@1.21.1/dist/bootstrap-table.min.css', 'css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ cdn('bootstrap5-toggle@4.3.5/css/bootstrap5-toggle.min.css', 'css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ cdn('bootstrap5-toggle@4.3.5/css/bootstrap5-toggle.min.css.map', 'css') }}" />
    <!-- end::Bootstrap CSS -->

    <!-- begin::Select 2 CSS (used by all pages) -->
    <link rel="stylesheet" type="text/css" href="{{ cdn('select2@4.1.0-rc.0/dist/css/select2.min.css', 'css') }}" />
    <!-- end::Select 2 CSS -->
    
    <!-- begin::Fontawesome CSS (used by all pages) -->
    <link rel="stylesheet" type="text/css" href="{{ cdn('font-awesome-animation@1.1.1/css/font-awesome-animation.min.css', 'css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ cdn('@fortawesome/fontawesome-free@6.2.1/css/all.min.css', 'css') }}" />    
    <!-- end::Fontawesome CSS -->
    
    <!-- begin::Datetime CSS (used by all pages) -->
    <link rel="stylesheet" type="text/css" href="{{ cdn('@eonasdan/tempus-dominus@6.2.7/dist/css/tempus-dominus.min.css', 'css') }}" />
    <!-- end::Datetime CSS -->

    @php $title = $app->view->getSections()['title']; @endphp
    @if ($title != 'Login')
    <!-- begin::Custom Style (used by all pages) -->
    <link rel="stylesheet" type="text/css" href="{{ cdn('assets/css/app/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ cdn('assets/css/form.min.css?v1') }}" />
    <link rel="stylesheet" type="text/css" href="{{ cdn('assets/css/page.min.css?v1') }}" />
    <!-- end::Custom Style -->
    @endif

    <!-- begin::Page Style (used by own pages) -->
    @yield('page-css')
    <!-- end::Page Style -->

    <style type="text/css">
    </style>
</head>

<body>
    <div class="page-loader"></div>

    @if ($title != 'Login')
    <div class="d-flex">
        <aside class="sidebar-nav-wrapper">
            @include('admin.includes.aside')
        </aside>

        <div class="main-wrapper d-flex flex-column">
            @include('admin.includes.header')

            <main class="main-content container-fluid flex-fill">
                <!-- <div class="container-fluid px-2 px-md-3 px-lg-4"> -->
                <div class="container-fluid px-1 px-md-2">
                    @yield('content')
                </div>
            </main>

            @include('admin.includes.footer')
        </div>
    </div>
    @else
    @yield('content')
    @endif

    <!-- begin::Core JavaScript (used by all pages) -->
    <script type="text/javascript" src="{{ cdn('jquery@3.6.1/dist/jquery.min.js', 'js') }}"></script>
    <script type="text/javascript" src="{{ cdn('moment@2.29.4/moment.min.js', 'js') }}"></script>
    <script type="text/javascript" src="{{ cdn('@popperjs/core@2.11.6/dist/umd/popper.min.js', 'js') }}"></script>
    <!-- end::Core Javascripts -->

    <!-- begin::Bootstrap Javascripts (used by all pages) -->
    <!-- <script type="text/javascript" src="{{ cdn('bootstrap@5.2.3/dist/js/bootstrap.min.js', 'js') }}"></script> -->
    <script type="text/javascript" src="{{ cdn('bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', 'js') }}"></script>
    <script type="text/javascript" src="{{ cdn('bootstrap-table@1.21.1/dist/bootstrap-table.min.js', 'js') }}"></script>
    <script type="text/javascript" src="{{ cdn('bootstrap-table@1.21.1/dist/bootstrap-table-locale-all.min.js', 'js') }}"></script>
    <script type="text/javascript" src="{{ cdn('bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js', 'js') }}"></script>
    <script type="text/javascript" src="{{ cdn('bootstrap5-toggle@4.3.5/js/bootstrap5-toggle.min.js', 'js') }}"></script>
    <!-- end::Bootstrap Javascripts -->

    <!-- begin::Select 2 Javascripts (used by all pages) -->
    <script type="text/javascript" src="{{ cdn('select2@4.1.0-rc.0/dist/js/select2.min.js', 'js') }}"></script>
    <!-- end::Select 2 Javascripts -->

    <!-- begin::Tempus Dominus JavaScript (used by all pages) -->
    <script type="text/javascript" src="{{ cdn('@eonasdan/tempus-dominus@6.2.7/dist/js/tempus-dominus.min.js', 'js') }}"></script>
    <!-- end::Tempus Dominus JavaScript -->

    <!-- begin::Sweetalert2 (used by all pages) -->
    <script type="text/javascript" src="{{ cdn('sweetalert2@11.6.14/dist/sweetalert2.all.min.js', 'js') }}"></script>
    <!-- end::Sweetalert2 Javascripts -->
    
    <!-- begin::Custom Javascripts (used by all pages) -->
    <script type="text/javascript" src="{{ cdn('assets/js/app/app.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ cdn('assets/js/form.min.js') }}"></script> -->
    <!-- <script type="text/javascript" src="{{ cdn('assets/js/page.min.js') }}"></script> -->
    <!-- <script type="text/javascript" src="{{ cdn('assets/js/notify.min.js') }}"></script> -->
    <!-- <script type="text/javascript" src="{{ cdn('assets/lang/'. $locale .'.js?v1') }}"></script> -->
    <!-- end::Custom Javascripts (used by all pages) -->

    <!-- begin::Global Config(global config for global JS scripts) -->
    <script type="text/javascript">
        const api_token = '{{ api_token() }}';
        const lang = '{{ $locale }}';        
    </script>
    <!-- end::Global Config(global config for global JS scripts) -->

    <!-- begin::Page Javascripts (used by own page) -->
    <div class="page-script">
        @yield('page-script')
    </div>
    <!-- end::Page Javascripts (used by own page) -->
</body>
</html>