<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'PayGate') }}</title>
    <link rel="icon" href="{{ asset('images/favicon_img.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('src/css/vendors_css.css') }}">
    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('src/css/skin_color.css') }}">
</head>
<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        <!-- Header and Sidebar -->
        @include('layouts.header')
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="content-wrapper">
            <div class="container-full">
                <section class="content">
                    {{ $slot }}
                </section>
            </div>
        </div>

        <!-- Footer -->
        @include('layouts.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('src/js/vendors.min.js') }}"></script>
    <script src="{{ asset('src/js/template.js') }}"></script>
</body>
</html>
