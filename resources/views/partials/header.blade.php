<header class="main-header">
    <div class="d-flex align-items-center logo-box justify-content-start d-md-none d-block">
      <!-- Logo -->
      <a href="{{ route('dashboard') }}" class="logo">
        <div class="logo-mini w-30">
          <span class="light-logo">
            <img src="{{ asset('images/logo-letter.png') }}" alt="logo">
          </span>
          <span class="dark-logo">
            <img src="{{ asset('images/logo-letter-white.png') }}" alt="logo">
          </span>
        </div>
        <div class="logo-lg">
          <span class="light-logo">
            <img src="{{ asset('images/logo-dark-text.png') }}" alt="logo">
          </span>
          <span class="dark-logo">
            <img src="{{ asset('images/logo-light-text.png') }}" alt="logo">
          </span>
        </div>
      </a>
    </div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button -->
      <div class="app-menu">
        <ul class="header-megamenu nav">
          <li class="btn-group nav-item">
            <a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
              <i class="icon-Menu"><span class="path1"></span><span class="path2"></span></i>
            </a>
          </li>
          <!-- ... include other navbar items, updating paths as needed ... -->
        </ul>
      </div>
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
          <!-- Example notification item -->
          <li class="dropdown notifications-menu btn-group nav-item">
            <a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" data-bs-toggle="dropdown" title="Notifications">
              <i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>
              <div class="pulse-wave"></div>
            </a>
            <!-- Dropdown content goes here -->
          </li>
          <!-- Continue with other header items -->
        </ul>
      </div>
    </nav>
  </header>
