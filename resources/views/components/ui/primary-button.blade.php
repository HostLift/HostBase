<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-2 px-4 text-center bg-indigo-600 rounded-md text-white text-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
