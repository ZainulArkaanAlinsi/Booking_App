<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Hotel Booking App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }

        .btn-primary {
            transition: all 0.3s ease;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            25% {
                transform: translate(-5px, -5px) rotate(-5deg);
            }

            50% {
                transform: translate(5px, 5px) rotate(5deg);
            }

            75% {
                transform: translate(5px, -5px) rotate(3deg);
            }
        }

        .transform-style-3d {
            transform-style: preserve-3d;
        }

        .perspective-1000 {
            perspective: 1000px;
        }

        .rotate-y-180 {
            transform: rotateY(180deg);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .backdrop-blur-sm {
            backdrop-filter: blur(4px);
        }
    </style>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen hero-bg flex flex-col justify-center items-center text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Logo/App Name -->
            <div class="flex justify-center mb-12 select-none">
                <!-- 3D Parallax Container -->
                <div class="relative group perspective-1200 w-56 h-56 flex items-center justify-center"
                    onmousemove="parallaxEffect(event, this)" onmouseleave="resetParallax(this)"
                    style="perspective: 1200px;">
                    <!-- Dynamic Glow Layer -->
                    <div class="absolute inset-0 rounded-full z-0 pointer-events-none"
                        style="background: radial-gradient(circle at 60% 40%, rgba(156,163,175,0.9) 0%, rgba(107,114,128,0.5) 60%, transparent 100%); filter: blur(40px); opacity: 1; animation: glowPulse 5s ease-in-out infinite;">
                    </div>

                    <!-- Glass Sphere with Reflection -->
                    <div class="relative w-48 h-48 rounded-full bg-white shadow-[0_30px_60px_rgba(67,97,238,0.45)] overflow-hidden transition-transform duration-700 group-hover:scale-105"
                        style="transform-style: preserve-3d;">
                        <!-- Glass Reflection -->
                        <div
                            class="absolute top-3 left-8 w-28 h-10 rounded-full bg-white/30 blur-md opacity-70 rotate-12 pointer-events-none">
                        </div>
                        <!-- Inner Glass Border -->
                        <div class="absolute inset-0 rounded-full border-4 border-white/20"></div>
                        <!-- Main Logo Floating -->
                        <div class="absolute inset-0 flex items-center justify-center animate-float">
                            <img src="{{ asset('images/logopan.png') }}" alt="Hotel logo"
                                class="h-28 w-28 object-cover rounded-full border-4 border-white/40 shadow-[inset_0_0_30px_rgba(255,255,255,0.7),_0_0_40px_rgba(67,97,238,0.5)] z-10" />
                        </div>
                    </div>

                    <!-- Floating Animated Particles -->
                    <div class="absolute bottom-4 -right-8 w-5 h-5 bg-black rounded-full shadow-[0_0_18px_6px_#f472b6] animate-float"
                        style="animation-delay: 2.5s"></div>
                    <div class="absolute top-14 right-2 w-4 h-4 bg-green-400 rounded-full shadow-[0_0_10px_3px_#4ade80] animate-float"
                        style="animation-delay: 3.1s"></div>
                    <div class="absolute bottom-10 left-0 w-3 h-3 bg-red-400 rounded-full shadow-[0_0_10px_2px_#f87171] animate-float"
                        style="animation-delay: 2.9s"></div>
                </div>
            </div>
            <h2 class="text-2xl md:text-3xl font-extrabold mb-2 tracking-wide drop-shadow-lg">
                Hotel Booking App
            </h2>

            <!-- Headings -->
            <h1 class="text-4xl md:text-6xl font-bold mb-4 tracking-tight">
                Discover Your Perfect Stay
            </h1>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">
                Luxury accommodations at competitive prices. Book now and experience unforgettable hospitality.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-6 mt-8">
                <a href="{{ route('login') }}"
                    class="flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-full shadow-xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    <!-- Icon Sign In -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12H3m0 0l4-4m-4 4l4 4m13-8v8a2 2 0 01-2 2h-4"></path>
                    </svg>
                    <span>Sign In to Your Account</span>
                </a>
                <a href="{{ route('register') }}"
                    class="flex items-center gap-3 px-8 py-4 bg-white hover:bg-gray-100 text-blue-600 font-semibold rounded-full shadow-xl border border-blue-600 transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-200">
                    <!-- Icon Register -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Create New Account</span>
                </a>
            </div>


            <!-- Features Grid -->
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white bg-opacity-10 p-6 rounded-xl backdrop-blur-sm">
                    <div class="text-blue-300 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Best Price Guarantee</h3>
                    <p class="text-blue-100">We promise you'll get the lowest prices online</p>
                </div>

                <div class="bg-white bg-opacity-10 p-6 rounded-xl backdrop-blur-sm">
                    <div class="text-blue-300 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Secure Booking</h3>
                    <p class="text-blue-100">Your information is protected with bank-grade security</p>
                </div>

                <div class="bg-white bg-opacity-10 p-6 rounded-xl backdrop-blur-sm">
                    <div class="text-blue-300 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                    <p class="text-blue-100">Our customer service team is always ready to help</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-16 w-full py-6 bg-black bg-opacity-30 text-center">
            <p class="text-blue-200">&copy; {{ date('Y') }} Hotel Booking App. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
