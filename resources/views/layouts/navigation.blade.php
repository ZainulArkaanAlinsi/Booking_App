<nav x-data="{ open: false }" class="bg-white shadow-md border-b border-gray-200 sticky top-0 z-50">
    <!-- Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo & Navigation -->
            <div class="flex items-center space-x-6">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}"
                    class="flex items-center space-x-3 group transition-transform duration-300 hover:scale-110">
                    <!-- Logo dengan efek animasi dan shadow -->
                    <div
                        class="relative w-12 h-12 rounded-full bg-gradient-to-tr from-orange-400 via-yellow-400 to-orange-500 shadow-lg flex items-center justify-center">
                        <x-application-logo
                            class="w-8 h-8 text-white transform group-hover:rotate-12 transition-transform duration-500" />
                        <!-- Glow effect -->
                        <span
                            class="absolute inset-0 rounded-full bg-orange-400 opacity-30 blur-xl animate-pulse"></span>
                    </div>
                    <!-- Nama aplikasi dengan gradien warna yang sama dengan logo -->
                    <span class="text-2xl font-extrabold select-none tracking-wide drop-shadow-sm transition-colors duration-300
               bg-gradient-to-tr from-orange-400 via-yellow-400 to-orange-500 bg-clip-text text-transparent
               group-hover:from-orange-500 group-hover:via-yellow-300 group-hover:to-orange-600">
                        BookingApp
                    </span>
                </a>



                <!-- Desktop Nav Links -->
                <div class="hidden sm:flex space-x-8">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link href="#" class="text-gray-600 hover:text-indigo-600 transition">Bookings</x-nav-link>
                    <x-nav-link href="#" class="text-gray-600 hover:text-indigo-600 transition">Reports</x-nav-link>
                    <x-nav-link href="#" class="text-gray-600 hover:text-indigo-600 transition">Settings</x-nav-link>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex items-center space-x-4">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center space-x-2 text-gray-700 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 rounded-md transition"
                            aria-haspopup="true" aria-expanded="false">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-5 h-5 text-gray-500 group-hover:text-indigo-600 transition"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="py-2 px-4 border-b border-gray-100 text-sm text-gray-500 select-none">
                            Signed in as<br>
                            <span class="font-semibold text-gray-900">{{ Auth::user()->email }}</span>
                        </div>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-indigo-600 hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" @click.away="open = false" class="sm:hidden bg-white border-t border-gray-200 shadow-md">
        <div class="pt-4 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#">
                Bookings
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#">
                Reports
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#">
                Settings
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500 truncate">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
