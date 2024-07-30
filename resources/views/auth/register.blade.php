<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body class="bg-gray-800 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center text-red-500">Sign-Up</h2>
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="username" :value="__('Usernamme')" />
                <div class="relative">
                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" placeholder="Masukkan Username..." />
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                        <box-icon name='user' color="#DE4F4F" size="23px"></box-icon>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>
            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <div class="relative">
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Masukkan Email..." />
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                        <box-icon name='envelope' color="#DE4F4F" size="23px"></box-icon>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <div class="relative">
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Masukkan Password..." />
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                        <box-icon name='lock-alt' color="#DE4F4F" size="23px"></box-icon>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Confirm Password -->
            <div class="mb-6">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <div class="relative">
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Masukkan Password Lagi..." />
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 ml-1 text-sm text-gray-600">Remember me</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <button type="submit"
                        class="ms-3 w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Sign Up
                </button>
            </div>
            <div class="flex justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('login') }}">
                    Log in
                </a>
            </div>
        </form>
    </div>
</body>
</html>
