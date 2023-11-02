@props([
    'categories',
    'page_title',
    'header_title',
    ])

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->
getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'blog') }}</title>
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"/>

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
        .glass {
            background: rgba(57,56,56,.52);
            backdrop-filter: blur(13px) saturate(150%);
            -webkit-backdrop-filter: blur(13px) saturate(150%);
            z-index: -1
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/flowbite@1.8.1/dist/flowbite.js"></script>
</head>

<body class="bg-white text-stone-950 dark:bg-[#0a0910] dark:text-white w-full h-full">
    <main class="px-5 sm:mx-auto sm:max-w-2xl sm:px-8 lg:px-0 antialiased md:max-w-6xl grid gap-12 mt-4 overflow-hidden md:overflow-visible">
        <x-blog.header :title="$header_title"/>
        <x-blog.title-page :title="$page_title"/>
        <x-blog.list-categories :categories="$categories"/>
        <div>
                {{ $slot }}
        </div>
        <x-blog.footer/>
    </main>
</body>

</html>

