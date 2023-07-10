<style>
    .form-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .form-label {
        font-weight: bold;
        color: #555;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-top: 5px;
        font-size: 14px;
        color: #555;
    }

    .form-input:focus {
        outline: none;
        border-color: #007bff;
    }

    .form-error {
        color: red;
        margin-top: 5px;
        font-size: 12px;
    }

    .form-button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        font-size: 16px;
    }

    .form-button:hover {
        background-color: #0056b3;
    }

    .form-link {
        text-decoration: none;
        color: #007bff;
        cursor: pointer;
        margin-top: 10px;
        display: inline-block;
        font-size: 14px;
    }

    .form-link:hover {
        color: #0056b3;
    }
</style>


    <div class="form-container">
        <h2 class="form-title">Create an Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="form-label">Name</label>
                <input id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="form-error" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="form-error" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="form-error" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="form-error" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <button type="submit" class="form-button">
                    Register
                </button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="form-link">Already have an account? Log in</a>
        </div>
    </div>

