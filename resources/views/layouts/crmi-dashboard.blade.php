<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{ asset('images/favicon.ico') }}">
  <title>CRMi - Dashboard</title>

  <!-- Vendors Style -->
  <link rel="stylesheet" href="{{ asset('src/css/vendors_css.css') }}">
  <!-- Template Style -->
  <link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('src/css/skin_color.css') }}">
</head>
<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
  <div class="wrapper">
    <div id="loader"></div>
    @include('partials.header')
    @include('partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="container-full">
        <!-- Main content -->
        <section class="content">
          @yield('content')
        </section>
        <!-- /.content -->
      </div>
    </div>
    <!-- /.content-wrapper -->

    @include('partials.footer')
  </div>

  @include('partials.scripts')
</body>
</html>
