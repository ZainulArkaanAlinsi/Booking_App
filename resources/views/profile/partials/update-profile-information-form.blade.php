<section
    class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-indigo-100 via-white to-indigo-100 px-6 py-16">
    <div
        class="bg-white rounded-3xl shadow-2xl max-w-4xl w-full p-12 grid grid-cols-1 md:grid-cols-3 gap-12 animate-fadeInUp">
        <!-- Left Panel: Profile Picture & Info -->
        <div class="flex flex-col items-center space-y-6 border-r border-gray-200 pr-8">
            <label for="profile_photo" class="cursor-pointer relative group">
                <template x-if="imageUrl">
                    <img :src="imageUrl" alt="Profile Preview"
                        class="h-40 w-40 rounded-full object-cover shadow-xl border-4 border-indigo-500 transition-transform duration-300 group-hover:scale-110" />
                </template>
                <template x-if="!imageUrl">
                    <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) . '?v=' . filemtime(storage_path('app/public/' . $user->profile_photo_path)) : asset('images/default-profile.png') }}"
                        alt="Profile Photo"
                        class="h-40 w-40 rounded-full object-cover shadow-xl border-4 border-indigo-500" />
                </template>
                <input type="file" id="profile_photo" name="profile_photo" accept="image/*" class="hidden"
                    @change="fileChosen" />
                <div
                    class="absolute inset-0 rounded-full bg-indigo-600 bg-opacity-30 opacity-0 group-hover:opacity-70 transition-opacity duration-300 flex items-center justify-center text-white font-semibold text-lg">
                    Change Photo
                </div>
            </label>
            <p class="text-center text-gray-600 max-w-xs">
                Click the circle to select or update your profile picture. Supported formats: JPG, PNG.
            </p>
            <x-input-error class="text-red-600 text-sm" :messages="$errors->get('profile_photo')" />
        </div>

        <!-- Right Panel: Form Inputs -->
        <div class="md:col-span-2">
            <header class="mb-10 text-center md:text-left">
                <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                    {{ __('Profile Information') }}
                </h2>
                <p class="mt-3 text-gray-600 text-base max-w-md mx-auto md:mx-0">
                    {{ __("Update your account's profile information, email address, and profile picture.") }}
                </p>
            </header>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('patch')

                <div>
                    <x-input-label for="name" :value="__('Name')" class="font-semibold text-gray-700" />
                    <x-text-input id="name" name="name" type="text"
                        class="mt-1 block w-full rounded-xl border border-gray-300 px-5 py-3
                               focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-500 transition shadow-sm"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2 text-red-600 text-sm" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')" class="font-semibold text-gray-700" />
                    <x-text-input id="email" name="email" type="email"
                        class="mt-1 block w-full rounded-xl border border-gray-300 px-5 py-3
                               focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-500 transition shadow-sm" :value="old('email', $user->email)"
                        required autocomplete="username" />
                    <x-input-error class="mt-2 text-red-600 text-sm" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-4 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-lg text-yellow-700 text-sm">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification"
                            class="underline ml-1 font-semibold hover:text-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 rounded">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                        @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-semibold text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                        @endif
                    </div>
                    @endif
                </div>

                <div class="flex items-center justify-between">
                    <x-primary-button
                        class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 px-8 py-3 rounded-2xl shadow-lg transition transform hover:scale-105 font-semibold text-lg">
                        {{ __('Save') }}
                    </x-primary-button>

                    @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)"
                        class="text-green-600 font-semibold select-none text-sm">
                        {{ __('Saved.') }}
                    </p>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script>
        function profileImage() {
            return {
                imageUrl: null,
                fileChosen(event) {
                    const file = event.target.files[0];
                    if (!file) {
                        this.imageUrl = null;
                        return;
                    }
                    this.imageUrl = URL.createObjectURL(file);
                }
            }
        }
    </script>

    <style>
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.7s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
    </style>
</section>
