<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? ''}}</title>
    <!-- font google Montserrat normal medium bold -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>

    <main class="d-flex flex-column min-vh-100">
        <div class="sticky-top">
            <x-navbar />
        </div>

        <div>
            {{ $slot }}
        </div>

        <div class="mt-auto">
            <x-footer />
        </div>
    </main>


    <script src="https://kit.fontawesome.com/747222a0ae.js" crossorigin="anonymous"></script>
    @livewireScripts
</body>

</html>