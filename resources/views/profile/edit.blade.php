<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4 py-4">
            <!-- Avatar Profile (bisa diganti dengan avatar user) -->
            <div
                class="flex items-center justify-center rounded-full shadow-lg w-14 h-14 bg-gradient-to-tr from-indigo-500 via-purple-500 to-pink-500">
                <span class="text-2xl font-bold text-white">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
            </div>
            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800">
                    {{ __('Profile') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    {{ __('Manage your account information, password, and account security.') }}
                </p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen py-12 bg-gradient-to-br from-gray-50 via-white to-gray-100">
        <div class="max-w-4xl mx-auto space-y-8">
            <!-- Update Profile Information -->
            <div class="p-6 transition bg-white border-l-4 border-indigo-500 shadow-lg rounded-xl hover:shadow-2xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 text-indigo-600 bg-indigo-100 rounded-full">
                        <!-- Heroicon: User -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-indigo-700">Profile Information</h3>
                </div>
                <div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 transition bg-white border-l-4 shadow-lg rounded-xl border-emerald-500 hover:shadow-2xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 rounded-full bg-emerald-100 text-emerald-600">
                        <!-- Heroicon: Key -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 7a4 4 0 11-8 0 4 4 0 018 0zm6 14a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h4l2-3 2 3h4a2 2 0 012 2v14z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-emerald-700">Change Password</h3>
                </div>
                <div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-6 transition bg-white border-l-4 border-red-500 shadow-lg rounded-xl hover:shadow-2xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 text-red-600 bg-red-100 rounded-full">
                        <!-- Heroicon: Trash -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V4a1 1 0 011-1h6a1 1 0 011 1v3" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-red-700">Delete Account</h3>
                </div>
                <div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>