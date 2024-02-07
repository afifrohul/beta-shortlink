<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            #actionButton {
                cursor: not-allowed;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
    <script>
        let timer;
        let countdownTime = 30; // Waktu countdown dalam detik

        function startTimer() {
            let display = document.getElementById('timer');
            let actionButton = document.getElementById('actionButton');

            timer = setInterval(function () {
                let minutes = Math.floor(countdownTime / 60);
                let seconds = countdownTime % 60;

                display.innerHTML = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                if (countdownTime <= 0) {
                    clearInterval(timer);
                    actionButton.disabled = false;
                    actionButton.style.cursor = 'pointer'
                    actionButton.classList.add('hover:bg-gray-700')
                    actionButton.classList.add('dark:hover:bg-white')
                } else {
                    countdownTime--;
                }
                }, 1000);
            }

        function performAction() {
            alert("Tombol ditekan setelah hitungan mundur selesai!");
        }

        // Otomatis memulai timer saat halaman dimuat
        window.onload = startTimer;
    </script>
</html>
