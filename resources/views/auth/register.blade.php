<x-guest-layout>
    <div
        class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-tr from-indigo-100 via-blue-100 to-purple-100 px-4">
        <!-- Logo yang mudah diganti -->
        <div class="mb-8">
            <img src="{{ asset('images/logo-register.png') }}" alt="App Logo"
                class="h-20 w-auto mx-auto rounded-full shadow-lg transition-transform duration-300 hover:scale-110" />
        </div>

        <form method="POST" action="{{ route('register') }}"
            class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-10 space-y-8 animate-fadeInUp">
            @csrf

            <h2 class="text-3xl font-extrabold text-center text-indigo-700">Create Your Account</h2>

            <!-- Name -->
            <div class="relative">
                <x-input-label for="name" :value="__('Name')" class="block text-gray-700 font-semibold mb-1" />
                <x-text-input id="name" name="name" type="text" :value="old('name')" required autofocus
                    autocomplete="name"
                    class="peer w-full rounded-xl border border-gray-300 px-4 py-3 placeholder-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 transition"
                    placeholder="Your full name" />
                <label for="name"
                    class="absolute left-4 top-3 text-gray-400 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-0 peer-focus:text-indigo-600 peer-focus:text-sm pointer-events-none">Your
                    full name</label>
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-600" />
            </div>

            <!-- Email -->
            <div class="relative">
                <x-input-label for="email" :value="__('Email')" class="block text-gray-700 font-semibold mb-1" />
                <x-text-input id="email" name="email" type="email" :value="old('email')" required
                    autocomplete="username"
                    class="peer w-full rounded-xl border border-gray-300 px-4 py-3 placeholder-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 transition"
                    placeholder="you@example.com" />
                <label for="email"
                    class="absolute left-4 top-3 text-gray-400 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-0 peer-focus:text-indigo-600 peer-focus:text-sm pointer-events-none">you@example.com</label>
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
            </div>

            <!-- Password -->
            <div class="relative">
                <x-input-label for="password" :value="__('Password')" class="block text-gray-700 font-semibold mb-1" />
                <x-text-input id="password" name="password" type="password" required autocomplete="new-password"
                    class="peer w-full rounded-xl border border-gray-300 px-4 py-3 placeholder-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 transition"
                    placeholder="********" />
                <label for="password"
                    class="absolute left-4 top-3 text-gray-400 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-0 peer-focus:text-indigo-600 peer-focus:text-sm pointer-events-none">********</label>
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
            </div>

            <!-- Confirm Password -->
            <div class="relative">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                    class="block text-gray-700 font-semibold mb-1" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" required
                    autocomplete="new-password"
                    class="peer w-full rounded-xl border border-gray-300 px-4 py-3 placeholder-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 transition"
                    placeholder="********" />
                <label for="password_confirmation"
                    class="absolute left-4 top-3 text-gray-400 text-sm transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-0 peer-focus:text-indigo-600 peer-focus:text-sm pointer-events-none">********</label>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-600" />
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-900 font-medium transition">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button
                    class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-400 px-6 py-3 rounded-xl shadow-lg transform hover:scale-105 transition duration-300">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <style>
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease forwards;
        }
    </style>
</x-guest-layout>
