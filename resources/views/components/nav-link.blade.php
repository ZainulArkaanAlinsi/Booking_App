@props(['active' => false]) {{-- Fix: Set default value for active --}}

@php
$baseClasses = 'inline-flex items-center px-1 pt-1 relative overflow-hidden group pb-2 transition-all duration-300
ease-[cubic-bezier(0.4,0,0.2,1)]';

$activeClasses = 'text-gray-900 font-semibold';
$inactiveClasses = 'text-gray-500 hover:text-gray-800 focus:text-gray-800';

$classes = $active
? "$baseClasses $activeClasses"
: "$baseClasses $inactiveClasses";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="relative z-10">
        {{ $slot }}
    </span>

    @if($active)
    <!-- Active state: gradient bar with glow effect -->
    <span
        class="absolute bottom-0 left-0 w-full h-1.5 bg-gradient-to-r from-orange-500 to-orange-700 rounded-t-full"></span>
    <span
        class="absolute bottom-0 w-4/5 h-3 transform -translate-x-1/2 bg-orange-400 rounded-t-full left-1/2 blur-md opacity-70"></span>
    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-black/30"></span>
    @else
    <!-- Hover state: animated underline -->
    <span
        class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-orange-400 to-orange-700 transition-all duration-500 group-hover:w-full"></span>
    <span class="absolute bottom-0 left-0 w-full h-px bg-black/10"></span>
    @endif

    <!-- Floating dots effect -->
    <span
        class="absolute w-1 h-1 transition-all duration-700 bg-orange-400 rounded-full opacity-0 -bottom-1 left-1/4 group-hover:opacity-100 group-hover:translate-y-2"></span>
    <span
        class="absolute w-1 h-1 transition-all duration-700 delay-100 bg-black rounded-full opacity-0 -bottom-1 left-1/2 group-hover:opacity-100 group-hover:translate-y-2"></span>
    <span
        class="absolute w-1 h-1 transition-all duration-700 delay-200 bg-orange-400 rounded-full opacity-0 -bottom-1 left-3/4 group-hover:opacity-100 group-hover:translate-y-2"></span>

    <style>
        .ease-\[cubic-bezier\(0\.4\,0\,0\.2\,1\)\] {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>