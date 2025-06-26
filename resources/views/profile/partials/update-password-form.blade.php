<section
    class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-indigo-50 via-white to-indigo-50 px-4 py-12">
    <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-10
               animate-fadeInUp
               transition-transform duration-500 hover:scale-[1.02]" style="will-change: transform;">
        <header class="mb-8 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">
                {{ __('Update Password') }}
            </h2>
            <p class="mt-2 text-gray-600 text-sm">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('put')

            <div>
                <x-input-label for="update_password_current_password" :value="__('Current Password')"
                    class="font-semibold text-gray-700" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 transition"
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')"
                    class="mt-2 text-red-600 text-sm" />
            </div>

            <div>
                <x-input-label for="update_password_password" :value="__('New Password')"
                    class="font-semibold text-gray-700" />
                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 transition"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-600 text-sm" />
            </div>

            <div>
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')"
                    class="font-semibold text-gray-700" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-3
                           focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 transition"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                    class="mt-2 text-red-600 text-sm" />
            </div>

            <div class="flex items-center justify-between">
                <x-primary-button
                    class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-400 px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
                    {{ __('Save') }}
                </x-primary-button>

                @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-semibold select-none">
                    {{ __('Saved.') }}
                </p>
                @endif
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
</section>
