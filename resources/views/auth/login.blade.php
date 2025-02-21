<x-crmi-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="input-label">{{ __('Email') }}</label>
            <input id="email" type="email"
                   class="form-control ps-15 bg-transparent @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autofocus
                   autocomplete="username" placeholder="Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group mt-4">
            <label for="password" class="input-label">{{ __('Password') }}</label>
            <input id="password" type="password"
                   class="form-control ps-15 bg-transparent @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password"
                   placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-group block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                       name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="form-group flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="btn btn-danger mt-10 ms-3">
                {{ __('Log in') }}
            </button>
        </div>
    </form>

    <!-- Register Link -->
    <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">
            {{ __('Don\'t have an account?') }}
            <a href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                {{ __('Register') }}
            </a>
        </p>
    </div>
</x-crmi-guest-layout>
