<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Used to add dark mode right away, adding here prevents any flicker -->
    <script>
        if (typeof (Storage) !== "undefined") {
            if (localStorage.getItem('dark_mode') && localStorage.getItem('dark_mode') == 'true') {
                document.documentElement.classList.add('dark');
            }
        }
    </script>


@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles

<body class="min-h-screen antialiased bg-white dark:bg-gray-900">
@auth
    <x-ui.master.navbar/>
@endauth
{{ $slot }}

<x-ui.master.footer/>
{{-- livewire components here--}}
@livewireScripts
</body>
</html>
