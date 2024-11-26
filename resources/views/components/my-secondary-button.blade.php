<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-3 py-2 font-medium text-center text-white bg-gray-400 rounded-lg hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-500 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800']) }}>
    {{ $slot }}
</button>
