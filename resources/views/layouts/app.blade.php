<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jupiter</title>
    <link rel="shortcut icon" href="/jupiter-32.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="antialiased bg-white md:relative">
    <div class="flex flex-row h-screen" x-data="{menu1: false}">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End Sidebar -->
        <!-- Mobile Nav -->
        <div x-cloak x-show="menu1" x-transition x-on:click.outside="menu1 = false" class="p-4 w-72 fixed inset-0 z-10 bg-white h-screen overflow-y-auto shadow-md">
            <div class="flex flex-col">
                <div class="box-border h-12 w-12 rounded-sm bg-gray-400 mb-6"></div>
                <ul class="flex flex-col space-y-4 mb-6">
                    <li>
                        <div class="w-1/3 h-4 rounded-sm bg-gray-400"></div>
                    </li>
                    <li class="flex items-center gap-x-4">
                        <div class="box-border w-8 h-8 rounded-sm bg-gray-400"></div>
                        <div class="flex-grow">
                            <div class="w-full h-6 rounded-sm bg-gray-400"></div>
                        </div>
                    </li>
                    <li class="flex items-center gap-x-4">
                        <div class="box-border w-8 h-8 rounded-sm bg-gray-400"></div>
                        <div class="flex-grow">
                            <div class="w-full h-6 rounded-sm bg-gray-400"></div>
                        </div>
                    </li>
                    <li class="flex items-center gap-x-4">
                        <div class="box-border w-8 h-8 rounded-sm bg-gray-400"></div>
                        <div class="flex-grow">
                            <div class="w-full h-6 rounded-sm bg-gray-400"></div>
                        </div>
                    </li>
                </ul>
                <ul class="flex flex-col space-y-4">
                    <li>
                        <div class="w-1/3 h-4 rounded-sm bg-gray-400"></div>
                    </li>
                    <li class="flex items-center gap-x-4">
                        <div class="box-border w-8 h-8 rounded-sm bg-gray-400"></div>
                        <div class="flex-grow">
                            <div class="w-full h-6 rounded-sm bg-gray-400"></div>
                        </div>
                    </li>
                    <li class="flex items-center gap-x-4">
                        <div class="box-border w-8 h-8 rounded-sm bg-gray-400"></div>
                        <div class="flex-grow">
                            <div class="w-full h-6 rounded-sm bg-gray-400"></div>
                        </div>
                    </li>
                    <li class="flex items-center gap-x-4">
                        <div class="box-border w-8 h-8 rounded-sm bg-gray-400"></div>
                        <div class="flex-grow">
                            <div class="w-full h-6 rounded-sm bg-gray-400"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--End  Mobile Nav -->
        <div class="grow flex flex-col relative md:static">
            <!-- Page Header -->
            @include('layouts.header', ['sublinks' => ['home' => 'Home']])
            <!-- End Page Header -->
            {{ $content }}

            @include('layouts.footer')
        </div>
    </div>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>

</html>