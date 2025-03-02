@extends('layouts.crmi-dashboard')

@section('content')
  <!-- Dashboard Landing Page Content -->
  <div class="row">
    <div class="col-xxxl-8 col-xl-9 col-12">
      <div class="row">
        <!-- Number of Agents -->
        <div class="col-xl-4 col-lg-6 col-12">
          <div class="box">
            <div class="box-body">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="bg-primary mb-20 w-50 h-50 rounded10 text-center l-h-50">
                    <i class="fs-18 fa fa-users"></i>
                  </div>
                  <h4 class="mb-5">Agents</h4>
                  <p class="text-mute mb-0">{{ $numAgents }} Total</p>
                </div>
                <div id="chartAgents"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Number of Mining Sites -->
        <div class="col-xl-4 col-lg-6 col-12">
          <div class="box">
            <div class="box-body">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="bg-success mb-20 w-50 h-50 rounded10 text-center l-h-50">
                    <i class="fs-18 fa fa-map-marker"></i>
                  </div>
                  <h4 class="mb-5">Mining Sites</h4>
                  <p class="text-mute mb-0">{{ $numMiningSites }} Total</p>
                </div>
                <div id="chartMiningSites"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Number of Tax Profiles -->
        <div class="col-xl-4 col-lg-6 col-12">
          <div class="box">
            <div class="box-body">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="bg-warning mb-20 w-50 h-50 rounded10 text-center l-h-50">
                    <i class="fs-18 fa fa-file-text"></i>
                  </div>
                  <h4 class="mb-5">Tax Profiles</h4>
                  <p class="text-mute mb-0">{{ $numTaxProfiles }} Total</p>
                </div>
                <div id="chartTaxProfiles"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Revenue Analytics (if needed) -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Revenue Analytics</h3>
        </div>
        <div class="box-body pb-0">
          <div id="chart44"></div>
        </div>
      </div>
    </div>

    <div class="col-xxxl-4 col-xl-3 col-12">
      <!-- Other dashboard columns (Recent Activity, etc.) -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    Channelytics
                </h3>
            </div>
            <div class="box-body">
                <div style="min-height: 207.7px;">
                    <div id="sales-chart"></div>
                </div>
            </div>
        </div>

    </div>
  </div>

@endsection
