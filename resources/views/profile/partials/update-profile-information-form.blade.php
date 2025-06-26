<section class="flex items-center justify-center min-h-screen px-4 py-8 bg-gradient-to-br from-indigo-50 to-white">
    <div
        class="grid w-full max-w-5xl grid-cols-1 gap-8 p-6 bg-white shadow-xl rounded-3xl md:grid-cols-3 md:p-8 animate-fadeInUp">
        <!-- Left Panel: Profile Picture & Info -->
        <div class="flex flex-col items-center pr-0 space-y-6 md:pr-8 md:border-r md:border-gray-100">
            <div x-data="profileImage()" class="flex flex-col items-center w-full">
                <label for="profile_photo" class="relative cursor-pointer group">
                    <template x-if="!imageUrl">
                        <div
                            class="flex items-center justify-center w-40 h-40 text-5xl font-bold text-white rounded-full shadow-lg bg-gradient-to-br from-indigo-500 to-purple-600">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    </template>

                    <template x-if="imageUrl">
                        <img :src="imageUrl" alt="Profile Preview"
                            class="object-cover w-40 h-40 transition-all duration-300 border-4 border-white rounded-full shadow-xl ring-4 ring-indigo-500/30 group-hover:opacity-90" />
                    </template>

                    <input type="file" id="profile_photo" name="profile_photo" accept="image/jpeg,image/png"
                        class="hidden" @change="fileChosen" />

                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center w-40 h-40 text-sm font-semibold text-center text-white transition-opacity duration-300 rounded-full opacity-0 bg-gradient-to-b from-black/70 to-black/40 group-hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Change Photo
                    </div>
                </label>

                <div class="mt-6 text-center">
                    <h3 class="text-xl font-bold text-gray-900">{{ $user->name }}</h3>
                    <p class="mt-1 text-gray-600">{{ $user->email }}</p>
                </div>

                <p class="mt-4 text-xs text-center text-gray-500 max-w-[200px]">
                    Click to select or update profile picture. Max 2MB (JPG/PNG)
                </p>

                <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('profile_photo')" />
            </div>
        </div>

        <!-- Right Panel: Form Inputs -->
        <div class="md:col-span-2">
            <header class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                            Profile Settings
                        </h2>
                        <p class="mt-2 text-gray-600">
                            Update your account information and preferences
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center justify-center w-12 h-12 bg-indigo-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-6 border-b border-gray-200"></div>
            </header>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('patch')

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" class="font-medium text-gray-700" />
                        <x-text-input id="name" name="name" type="text"
                            class="block w-full px-4 py-3 mt-1 transition border border-gray-200 shadow-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 hover:border-indigo-300"
                            :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="font-medium text-gray-700" />
                        <x-text-input id="email" name="email" type="email"
                            class="block w-full px-4 py-3 mt-1 transition border border-gray-200 shadow-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 hover:border-indigo-300"
                            :value="old('email', $user->email)" required autocomplete="email" />
                        <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('email')" />
                    </div>
                </div>

                <!-- Email Verification Status -->
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="p-4 bg-yellow-50 rounded-xl">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">Email Not Verified</h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <p>Your email address is unverified. Some features may be limited until you verify your
                                    email.</p>
                            </div>
                            <div class="mt-4">
                                <button form="send-verification"
                                    class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                    Click here to re-send the verification email
                                </button>
                                @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-sm font-medium text-green-600">
                                    A new verification link has been sent to your email address.
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="flex items-center justify-between pt-8">
                    <div>
                        <x-primary-button
                            class="px-8 py-3.5 font-semibold text-white transition duration-300 bg-gradient-to-r from-indigo-600 to-purple-600 shadow-lg hover:from-indigo-700 hover:to-purple-700 rounded-xl hover:shadow-xl focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 -ml-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Save Changes
                        </x-primary-button>
                    </div>

                    @if (session('status') === 'profile-updated')
                    <div x-data="{ show: true }" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 3500)"
                        class="flex items-center px-4 py-2 text-sm font-medium text-green-700 bg-green-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Profile updated successfully!
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script>
        function profileImage() {
            // Initialize with existing profile photo or null
            return {
                imageUrl: @json($user->profile_photo_path ? asset('storage/'.$user->profile_photo_path) : null),

                init() {
                    // Set existing profile image on page load
                    const existingPhoto = @json($user->profile_photo_path);
                    if (existingPhoto) {
                        this.imageUrl = '{{ asset("storage") }}/' + existingPhoto;
                    }
                },

                fileChosen(event) {
                    const file = event.target.files[0];
                    if (!file) return;

                    // Client-side validation
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                    const maxSize = 2 * 1024 * 1024; // 2MB

                    if (!validTypes.includes(file.type)) {
                        alert('Only JPG and PNG files are allowed!');
                        event.target.value = '';
                        return;
                    }

                    if (file.size > maxSize) {
                        alert('File size exceeds 2MB limit!');
                        event.target.value = '';
                        return;
                    }

                    // Show preview
                    this.imageUrl = URL.createObjectURL(file);
                }
            }
        }
    </script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s cubic-bezier(0.22, 0.61, 0.36, 1) forwards;
        }

        /* Smooth transitions for all interactive elements */
        label,
        button,
        input,
        .group-hover\:opacity-90 {
            transition: all 0.3s ease;
        }
    </style>
</section>