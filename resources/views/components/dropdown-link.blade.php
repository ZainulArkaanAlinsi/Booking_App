<a {{ $attributes->merge([
    'class' => 'block w-full px-5 py-3 text-start text-sm font-medium text-gray-700 rounded-lg
    hover:bg-indigo-100 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500
    focus:ring-offset-1 transition duration-200 ease-in-out shadow-sm'
    ]) }}>
    {{ $slot }}
</a>