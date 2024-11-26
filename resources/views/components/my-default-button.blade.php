<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-3 py-2 font-medium text-center text-white bg-sky-800 rounded-lg hover:bg-sky-900 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) }}>
    {{ $slot }}
</button>
