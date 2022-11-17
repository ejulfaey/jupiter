<div class="px-4 md:px-6 lg:px-8 py-6 border-b-2 border-gray-100">
    <ul class="flex items-center gap-x-4 text-gray-600 text-sm">
        @foreach($sublinks as $href => $link)
        <li>
            <a href="{{ route($href) }}" class="hover:text-orange-500">{{ $link }}</a>
        </li>
            @if(!$loop->last)
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
            @endif
        @endforeach
    </ul>
</div>