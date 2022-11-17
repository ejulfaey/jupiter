<div class="p-4 md:p-6 lg:p-8 flex-grow overflow-y-auto bg-gradient-to-br from-gray-50 to-gray-200">
    <div class="space-y-6">
        <h3 class="text-xl font-semibold text-gray-700 tracking-wide">Manage User</h3>
        <div class="flex justify-between items-end">
            <div class="flex items-center gap-x-4">
                <div>
                    <label for="search" class="text-xs text-gray-700 tracking-wide">Search</label>
                    <input id="search" wire:model="search" type="text" placeholder="Search by name or email" class="mt-2 block text-sm w-80 px-4 py-2 border outline-none" />
                </div>
                <div>
                    <label for="perPage" class="text-xs text-gray-700 tracking-wide">No. of item</label>
                    <select id="perPage" wire:model="perPage" class="mt-2 block px-4 py-2 text-sm">
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <button class="px-4 py-1.5 bg-white text-sm text-red-500 flex items-center gap-x-2 font-sans hover:bg-red-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                </svg>
                Create User
            </button>
        </div>
        <div class="flex justify-between">
            <ul class="flex gap-x-4">
                <li class="flex items-center text-gray-600 text-sm tracking-wider">
                    <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>&#8211; Active
                </li>
                <li class="flex items-center text-gray-600 text-sm tracking-wider">
                    <div class="w-3 h-3 rounded-full bg-orange-500 mr-2"></div>&#8211; Inactive
                </li>
            </ul>
        </div>
        <!-- <div wire:loading wire:target="loading" class="px-6 py-4 flex items-center gap-x-4 bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 animate-spin text-red-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
            Loading...
        </div> -->
        @if(count($users) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-0 gap-y-4 md:gap-6">
            @foreach($users as $user)
            <div class="p-6 bg-white rounded">
                <div class="flex items-center gap-x-4">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full font-semibold bg-red-100 text-red-500 flex items-center justify-center uppercase">
                            {{ $user['gender'][0] }}
                        </div>
                        <div @class(['absolute bottom-0 right-0 z-10 w-3 h-3 rounded-full', 'bg-orange-500'=> $user['status'] == 'inactive', 'bg-green-500' => $user['status'] == 'active' ])"></div>
                    </div>
                    <div class="flex flex-col items-start max-w-full">
                        <h4 class="mt-1 text-gray-800">{{ $user['name'] }}</h4>
                        <p class="text-xs text-gray-600">{{ $user['email'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="p-6 bg-white rounded text-gray-600">
            No data matched with {{ $search }}...
        </div>
        @endif
    </div>
</div>