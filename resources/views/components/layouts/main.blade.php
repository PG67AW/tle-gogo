<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Used to add dark mode right away, adding here prevents any flicker -->
    <script>
        if (typeof(Storage) !== "undefined") {
            if (localStorage.getItem('dark_mode') && localStorage.getItem('dark_mode') == 'true') {
                document.documentElement.classList.add('dark');
            }
        }
    </script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title ?? 'Title Saksri' }}</title>
</head>

<body class="min-h-[100dvh] antialiased bg-gray-100 duration-500 transition-colors dark:bg-gray-900">

    {{ $slot }}

    <livewire:toast />
</body>

</html>
