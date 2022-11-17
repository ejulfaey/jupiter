@component('layouts.app')
@slot('content')
<div class="p-4 md:p-6 lg:p-8 flex-grow overflow-y-auto bg-gradient-to-br from-gray-50 to-gray-200">
    <div class="space-y-6">
        <div class="px-8 py-6 rounded flex items-center gap-x-4 bg-red-100">
            <img class="w-auto h-20" src="/jupiter-512.png" alt="jupiter">
            <div>
                <h2 class="text-xl font-semibold text-red-500">Jupiter</h2>
                <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, reprehenderit. Neque, impedit.</p>
            </div>
        </div>
        <div class="flex justify-between">
            <h3 class="text-lg font-semibold text-gray-600">List of Users</h3>
            <button class="px-4 py-2 bg-white text-sm text-red-500 flex items-center gap-x-2 font-sans hover:bg-red-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                </svg>
                Create User
            </button>
        </div>
        <ul class="flex gap-x-4">
            <li class="flex items-center text-gray-600 text-sm tracking-wider">
                <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>&#8211; Active
            </li>
            <li class="flex items-center text-gray-600 text-sm tracking-wider">
                <div class="w-3 h-3 rounded-full bg-orange-500 mr-2"></div>&#8211; Inactive
            </li>
        </ul>
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
                    <div class="flex flex-col items-start">
                        <h4 class="mt-1 text-gray-800">{{ $user['name'] }}</h4>
                        <p class="text-sm text-gray-600">{{ $user['email'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endslot
@endcomponent