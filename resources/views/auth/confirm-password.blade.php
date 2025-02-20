<x-crmi-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="input-label">{{ __('Password') }}</label>
            <input id="password" type="password"
                   class="form-control ps-15 bg-transparent @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group flex justify-end mt-4">
            <button type="submit" class="btn btn-danger">
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
</x-crmi-guest-layout>
