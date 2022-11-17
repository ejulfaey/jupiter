<div class="hidden lg:block w-72 xl:w-96 shadow bg-gradient-to-br from-[#8A2387] via-[#E94057] to-[#F27121]">
    <div class="h-full flex flex-col justify-center space-y-6 p-4">
        @if(Route::currentRouteName() != 'home' || Route::current()->uri != '/')
        <div class="grow flex flex-col justify-center">
            <ul class="flex flex-col gap-y-4">
                <li class="flex items-center gap-x-2">
                    <div class="box-border w-8 h-8 rounded-sm bg-white"></div>
                    <div class="flex-grow">
                        <div class="w-full h-8 rounded-sm bg-white"></div>
                    </div>
                </li>
                <li class="flex items-center gap-x-2">
                    <div class="box-border w-8 h-8 rounded-sm bg-white"></div>
                    <div class="flex-grow">
                        <div class="w-full h-8 rounded-sm bg-white"></div>
                    </div>
                </li>
                <li class="flex items-center gap-x-2">
                    <div class="box-border w-8 h-8 rounded-sm bg-white"></div>
                    <div class="flex-grow">
                        <div class="w-full h-8 rounded-sm bg-white"></div>
                    </div>
                </li>
                <li class="flex items-center gap-x-2">
                    <div class="box-border w-8 h-8 rounded-sm bg-white"></div>
                    <div class="flex-grow">
                        <div class="w-full h-8 rounded-sm bg-white"></div>
                    </div>
                </li>
            </ul>
        </div>
        @endif
        <div class="box-border w-full h-32 flex justify-center items-center gap-x-4">
            <img class="w-auto h-16" src="/jupiter-alt-512.png" alt="logo">
            <h2 class="text-xl font-semibold font-serif text-white">Jupiter</h2>
        </div>
    </div>
</div>