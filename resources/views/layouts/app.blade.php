<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/css/pagedone.css " rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
    /* Container */
.select2-container {
    width: 100% !important;
}

/* Input container */
.select2-selection--single {
    height: 42px !important;
    background-color: rgb(249 250 251) !important;
    border-color: rgb(209 213 219) !important;
    border-radius: 0.5rem !important;
}

/* Input text */
.select2-selection__rendered {
    line-height: 42px !important;
    padding-left: 0.75rem !important;
    color: rgb(17 24 39) !important;
}

/* Dropdown arrow */
.select2-selection__arrow {
    height: 40px !important;
}

/* Dropdown */
.select2-dropdown {
    border-color: rgb(209 213 219) !important;
    border-radius: 0.5rem !important;
    background-color: rgb(249 250 251) !important;
}

/* Options */
.select2-results__option {
    padding: 0.5rem 0.75rem !important;
    font-size: 0.875rem !important;
}

/* Selected option */
.select2-results__option--selected {
    background-color: rgb(59 130 246) !important;
    color: white !important;
}

/* Hovered option */
.select2-results__option--highlighted {
    background-color: rgb(96 165 250) !important;
    color: white !important;
}

/* Dark mode */
.dark .select2-selection--single {
    background-color: rgb(55 65 81) !important;
    border-color: rgb(75 85 99) !important;
}

.dark .select2-selection__rendered {
    color: rgb(255 255 255) !important;
}

.dark .select2-dropdown {
    background-color: rgb(55 65 81) !important;
    border-color: rgb(75 85 99) !important;
}

.dark .select2-results__option {
    color: rgb(255 255 255) !important;
}

/* Focus styles */
.select2-container--focus .select2-selection--single {
    border-color: rgb(59 130 246) !important;
    ring: rgb(59 130 246) !important;
    ring-width: 2px !important;
}

.select2-result-category {
    padding: 6px 12px;
}

/* Thêm dấu gạch ngang cho danh mục con */
.select2-results__option[data-level] {
    position: relative;
}

.select2-results__option[data-level]:before {
    content: "—";
    position: absolute;
    left: 8px;
    color: #666;
}

</style>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/js/pagedone.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
</body>

</html>
