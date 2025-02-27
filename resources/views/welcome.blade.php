<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PayGate - Revenue Collection</title>
  <link rel="icon" href="{{ asset('images/favicon_img.png') }}" type="image/x-icon">

  <!-- CRMi Vendors Style -->
  <link rel="stylesheet" href="{{ asset('src/css/vendors_css.css') }}">
  <!-- CRMi Main Style -->
  <link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('src/css/skin_color.css') }}">
  <!-- Custom Landing Page Styles (optional) -->
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <!-- Header / Navbar -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('pay') }}">Pay Revenue</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('validate') }}">Validate Payment</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero-section" style="background: url('{{ asset('images/hero-bg.jpg') }}') no-repeat center center; background-size: cover; padding: 50px 0;">
    <div class="text-center">
        <!-- Agency Logo and Kaduna State Logo -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/kaduna_logo.png') }}" alt="Agency Logo" height="150">
            <img src="{{ asset('images/KMDC_logo.png') }}" alt="Kaduna State Logo" height="150">
        </a>
    </div>
    <div class="container text-center text-white">
      <h1 class="display-4" style="color: black;">Welcome to PayGate</h1>
      <p class="lead" style="color: black;">Your secure, efficient platform for revenue collection on behalf of the government.</p>
      <p class="lead" style="color: black;">Manages by: AH Zango Company Limited</p>

      <div class="row">
        <div class="col-md-3 mb-3">
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg col-12 me-2">Register</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('login') }}" class="btn btn-success btn-lg col-12 me-2">Login</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('pay') }}" class="btn btn-warning btn-lg col-12 me-2">Pay Revenue</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('validate') }}" class="btn btn-info btn-lg col-12 me-2">Validate Payment</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features-section py-5">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 mb-4">
          <i class="fas fa-user-plus fa-3x mb-3"></i>
          <h4>Register</h4>
          <p>Create your secure account and get started.</p>
        </div>
        <div class="col-md-4 mb-4">
          <i class="fas fa-money-check-alt fa-3x mb-3"></i>
          <h4>Pay Revenue</h4>
          <p>Make your payments quickly and securely online.</p>
        </div>
        <div class="col-md-4 mb-4">
          <i class="fas fa-check-circle fa-3x mb-3"></i>
          <h4>Validate Payment</h4>
          <p>Confirm your transactions in real time.</p>
        </div>
        <div class="col-md-4 mb-4">
          <i class="fas fa-envelope fa-3x mb-3"></i>
          <h4>Contact Us</h4>
          <p>Get support and answers to your inquiries.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-4 bg-dark text-white text-center">
    <div class="container">
      <p class="mb-0">&copy; {{ date('Y') }} PayGate. All rights reserved.</p>
    </div>
  </footer>

  <!-- Scripts: Bootstrap JS and any additional scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
