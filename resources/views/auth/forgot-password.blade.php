<x-crmi-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="input-label">{{ __('Email') }}</label>
            <input id="email" type="email"
                   class="form-control ps-15 bg-transparent @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group flex items-center justify-end mt-4">
            <button type="submit" class="btn btn-danger mt-10 ms-3">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>

    <!-- Link to Login if user remembers their password -->
    <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">
            {{ __('Remember your password?') }}
            <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                {{ __('Login') }}
            </a>
        </p>
    </div>
</x-crmi-guest-layout>
