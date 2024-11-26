<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-3 py-2 font-medium text-center text-white bg-slate-400 rounded-lg dark:bg-gray-300  dark:text-gray-800']) }}>
    {{ $slot }}
</button>
