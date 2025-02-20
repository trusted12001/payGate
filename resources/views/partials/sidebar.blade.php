<aside class="main-sidebar">
    <section class="sidebar position-relative">
      <div class="d-flex align-items-center logo-box justify-content-start d-md-block d-none">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="logo">
          <div class="logo-mini">
            <span class="light-logo">
              <img src="{{ asset('images/logo-letter.png') }}" alt="logo">
            </span>
          </div>
          <div class="logo-lg">
            <span class="light-logo fs-36 fw-700">CRM<span class="text-primary">i</span></span>
          </div>
        </a>
      </div>
      <!-- User profile widget -->
      <div class="user-profile my-15 px-20 py-10 b-1 rounded10 mx-15">
        <div class="d-flex align-items-center justify-content-between">
          <div class="image d-flex align-items-center">
            <img src="{{ asset('images/avatar/avatar-13.png') }}" class="rounded-0 me-10" alt="User Image">
            <div>
              <h4 class="mb-0 fw-600">Nil Yeager</h4>
              <p class="mb-0">Super Admin</p>
            </div>
          </div>
          <div class="info">
            <a class="dropdown-toggle p-15 d-grid" data-bs-toggle="dropdown" href="#"></a>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="#"><i class="ti-user"></i> Profile</a>
              <a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
              <a class="dropdown-item" href="#"><i class="ti-link"></i> Conversation</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><i class="ti-lock"></i> Logout</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Sidebar menu -->
      <div class="multinav">
        <div class="multinav-scroll" style="height: 97%;">
          <!-- Copy the sidebar menu HTML here and update asset paths -->
        </div>
      </div>
    </section>
  </aside>
