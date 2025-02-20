@extends('layouts.crmi-dashboard')

@section('content')
  <!-- Dashboard Landing Page Content -->
  <div class="row">
    <div class="col-xxxl-8 col-xl-9 col-12">
      <div class="row">
        <div class="col-xl-4 col-lg-6 col-12">
          <div class="box">
            <div class="box-body">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="bg-primary mb-20 w-50 h-50 rounded10 text-center l-h-50">
                    <i class="fs-18 fa fa-file"></i>
                  </div>
                  <h4 class="mb-5">Projects</h4>
                  <p class="text-mute mb-0">124 Total</p>
                </div>
                <div id="chart41"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Repeat for other dashboard widgets -->
      </div>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Revenue Analytics</h3>
        </div>
        <div class="box-body pb-0">
          <div id="chart44"></div>
        </div>
        <!-- Additional boxes as needed -->
      </div>
    </div>
    <div class="col-xxxl-4 col-xl-3 col-12">
      <!-- Other dashboard columns (Recent Activity, etc.) -->
    </div>
  </div>
@endsection
