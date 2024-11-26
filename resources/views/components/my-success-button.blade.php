<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-3 py-2 font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800']) }}>
    {{ $slot }}
</button>
