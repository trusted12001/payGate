<x-crmi-guest-layout>
    <div class="box">
      <div class="box-header with-border">
        <h2 class="box-title">Profile</h2>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-12">
            @include('profile.partials.update-profile-information-form')
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            @include('profile.partials.update-password-form')
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            @include('profile.partials.delete-user-form')
          </div>
        </div>
      </div>
    </div>
  </x-crmi-guest-layout>
