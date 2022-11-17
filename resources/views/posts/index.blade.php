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
</head>

<body class="antialiased">
    <main>
        <div class="p-0 lg:container lg:mx-auto">
            <div class="relative flex flex-col md:flex-row h-screen" x-data="{ menu:false }">
                @include('layouts.sidebar')
                @include('layouts.header')
                <main class="w-full max-w-3xl">
                    <div class="p-4 flex flex-col h-full overflow-y-auto">
                        <!-- <div class="space-y-2 mb-4 md:mb-6">
                            <div class="rounded bg-gradient-to-r from-orange-400 to-orange-600 p-4 border-2 border-orange-100/50 font-serif">
                                <p>
                                    <span class="text-white font-bold">Get unlimited access to all of Jupiter for less than $1/week.</span>
                                    <a href="#" class="mt-4 block text-sm hover:underline animate-bounce">Become a member</a>
                                </p>
                            </div>
                        </div> -->
                        <div class="divide-y divide-slate-200">
                            @foreach($posts as $post)
                            <div @class(['cursor-pointer group' , 'pt-0 xl:pt-4 pb-6 xl:pb-10'=> $loop->first, 'py-6 xl:py-10' => !$loop->first])>
                                <h3 class="text-lg lg:text-xl text-gray-800 font-semibold font-serif leading-tight group-hover:text-orange-500">{{ $post["title"] }}</h3>
                                <p class="mt-3 text-sm text-gray-600">{{ Str::limit($post["body"], 250) }}</p>
                                <div class="mt-2 flex justify-end gap-x-4 lg:invisible lg:group-hover:visible">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 hover:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="hover:text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 hover:text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>
</body>

</html>