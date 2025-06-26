<section class="max-w-lg p-8 mx-auto mt-10 space-y-8 bg-white shadow-lg rounded-xl">
    <header class="flex items-center gap-4">
        <div class="p-3 text-red-600 bg-red-100 rounded-full">
            <!-- Heroicon: Trash -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V4a1 1 0 011-1h6a1 1 0 011 1v3" />
            </svg>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                {{ __('Delete Account') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before
                deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </div>
    </header>

    <div class="flex justify-end">
        <x-danger-button class="px-6 py-3 text-lg transition duration-150 ease-in-out hover:scale-105 hover:shadow-lg"
            x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
            <span class="flex items-center gap-2">
                <!-- Heroicon: Exclamation -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                </svg>
                {{ __('Delete Account') }}
            </span>
        </x-danger-button>
    </div>

    <!-- Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}"
            class="p-8 bg-white shadow-xl rounded-xl animate-fade-in">
            @csrf
            @method('delete')

            <div class="flex items-center gap-3 mb-4">
                <div class="p-2 text-red-600 bg-red-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>
            </div>

            <p class="mb-6 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please
                enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mb-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input id="password" name="password" type="password"
                    class="block w-full border-red-300 rounded-lg focus:border-red-500 focus:ring-red-500"
                    placeholder="{{ __('Password') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500" />
            </div>

            <div class="flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')" class="px-5 py-2 rounded-lg">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button
                    class="px-5 py-2 font-semibold text-white bg-red-600 rounded-lg shadow hover:bg-red-700">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

<!-- Tambahkan animasi fade-in jika belum ada -->
<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.4s ease;
    }
</style>