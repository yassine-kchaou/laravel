<style>
    .form-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
    }

    .form-label {
        font-weight: bold;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .form-checkbox-label {
        display: inline-flex;
        align-items: center;
    }

    .form-checkbox {
        margin-right: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #fff;
        vertical-align: middle;
    }

    .form-checkbox-indicator {
        width: 14px;
        height: 14px;
        background-color: #007bff;
        border-radius: 2px;
        display: inline-block;
        visibility: hidden;
    }

    .form-checkbox:checked + .form-checkbox-indicator {
        visibility: visible;
    }

    .form-button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-button:hover {
        background-color: #0056b3;
    }
</style>

<x-guest-layout>
    <div class="form-container">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="form-label" />
                <x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="form-error" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="form-label" />

                <x-text-input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="form-error" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="form-checkbox-label">
                    <input id="remember_me" type="checkbox" class="form-checkbox rounded" name="remember">
                    <span class="form-checkbox-indicator"></span>
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3 form-button">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
