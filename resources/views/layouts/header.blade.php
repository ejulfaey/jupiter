<div class="p-4 md:px-6 lg:px-8 border-b-2 border-gray-100">
    <ul class="hidden lg:flex items-center gap-x-4 text-gray-600 text-sm">
        @foreach($sublinks as $href => $link)
        <li>
            <a href="{{ route($href) }}" class="hover:text-orange-500 font-medium">{{ $link }}</a>
        </li>
        @if(!$loop->last)
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
        @endif
        @endforeach
    </ul>
    <div class="lg:hidden flex justify-center items-center gap-x-4">
        <img class="w-auto h-10" src="/jupiter-512.png" alt="logo">
        <div>
            <h2 class="text-lg font-semibold font-serif">Jupiter</h2>
            <p class="text-xs">Lorem ipsum dolor sit amet consec adipisicing.</p>
        </div>
    </div>
</div>