<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donasi Dulu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        :root {
            --dark-1: #08090D;
            --dark-2: #101010;
            --champ-yellow: #FECF00;
        }

        .bg-custom {
            background-color: #291586;
        }

        .bg-dark-1 {
            background-color: var(--dark-1);
        }

        .bg-champ-yellow {
            background-color: var(--champ-yellow);
        }

        .bg-tile-grey {
            background-color: var(--tile-grey);
        }

        .text-dark-1 {
            color: var(--dark-1);
        }

        .text-dark-2 {
            color: var(--dark-2);
        }

        .text-tile-grey {
            color: var(--tile-grey);
        }

        .text-soft-grey {
            color: var(--soft-grey);
        }

        body {
            overflow-y: hidden;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --white-1: #ffffff;
            --white-2: #eeeeee;
            --white-3: #ecf1f4;
            --black: #000909;
            --dark: #0A0F16;
            --subtleGreen: #90BCB7;
            --darkGreen: #082D28;
            --darkTosca: #569B9B;
            --tosca-1: #00FFD1;
            --tosca-2: #27D7D7;
            --tosca-3: #3FE8FF;
            --deepTosca-1: #016A6A;
            --deepTosca-2: #02A6A6;
            --grey-1: #888888;
            --grey-2: #666666;
        }

        .text-28 {
            font-size: 28px;
        }

        .text-24 {
            font-size: 24px;
        }

        .text-20 {
            font-size: 20px;
        }

        .text-white-1 {
            color: var(--white-1);
        }

        .text-white-2 {
            color: var(--white-2);
        }

        .text-white-3 {
            color: var(--white-3);
        }

        .text-grey-1 {
            color: var(--grey-1);
        }

        .text-grey-2 {
            color: var(--grey-2);
        }
    </style>
</head>

<body>
    <section class="font-montserrat bg-custom ">
        <main class="flex flex-col px-4 mx-auto min-h-screen justify-center items-center lg:px-24 relative">
            <div class="absolute top-0">
                <nav class="px-4 mx-auto lg:px-24 lg:pt-7 pt-5">
                    <div class="flex justify-start">
                        <div class="text-2xl text-white font-bold"> <span>DonasiDulu</span>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="flex flex-col  text-center">
                <div class="headline font-bold text-5xl text-white leading-normal lg:leading-snug"> Nikmati
                    beragam cara
                    <br class="hidden lg:block"> membantu sesama di aplikasi DonasiDulu
                </div>
                <div class="mt-5 mb-12">
                    <p class="font-medium text-sm lg:text-base text-white leading-7">
                        Lebih dari 2 juta orang telah terbantu. Ingin menggalang dana?
                    </p>
                </div>

                @if (Route::has('login'))
                    <div class="flex items-center gap-5 justify-center">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="py-3 px-5 rounded-lg bg-champ-yellow transition ease-out duration-300 hover:bg-yellow-400">
                                <span class="text-base text-center font-semibold text-dark-2">Login</span>
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-5 py-3 text-center rounded-lg bg-white transition ease-out duration-200 hover:bg-white hover:bg-opacity-90">
                                    <span class="text-base text-center font-semibold text-dark-2">Register</span>
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            <section class="footer bottom-0 absolute">
                <main class="footer w-full">
                    <footer class="px-4 mx-auto lg:px-24">
                        <div class="py-9 w-full">
                            <p class="text-base font-normal text-center text-white-3">
                                2023 DonasiDulu | All rights reserved </p>
                        </div>
                    </footer>
                </main>
            </section>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </section>
</body>

</html>
