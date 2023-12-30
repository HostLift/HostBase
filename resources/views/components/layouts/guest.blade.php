<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- used to get dark mode immediately --}}
    <script>
        if (typeof(Storage) !== "undefined") {
            if(localStorage.getItem('dark_mode') && localStorage.getItem('dark_mode') == 'true'){
                document.documentElement.classList.add('dark');
            }
        }
    </script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MagicKit') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
<div class="flex justify-center items-center h-screen bg-white dark:bg-gradient-to-b dark:from-gray-950 dark:to-gray-900 px-6">
    <div class="p-6 max-w-sm w-full sm:shadow-sm sm:bg-white dark:sm:bg-gray-950/50 dark:border-gray-200/10 sm:border sm:rounded-lg border-gray-200/60 shadow-md rounded-md">
            <x-flash />
        <br>
        {{ $slot }}
    </div>
</div>
@livewireScripts
</body>
</html>
