<x-crmi-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name" class="input-label">{{ __('Name') }}</label>
            <input id="name" type="text"
                   class="form-control ps-15 bg-transparent @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="form-group mt-4">
            <label for="email" class="input-label">{{ __('Email') }}</label>
            <input id="email" type="email"
                   class="form-control ps-15 bg-transparent @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Email">
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
                   name="password" required autocomplete="new-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group mt-4">
            <label for="password_confirmation" class="input-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password"
                   class="form-control ps-15 bg-transparent @error('password_confirmation') is-invalid @enderror"
                   name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn btn-danger ms-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-crmi-guest-layout>
