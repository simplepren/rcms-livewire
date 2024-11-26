<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-3 py-2 font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800']) }}>
    {{ $slot }}
</button>
