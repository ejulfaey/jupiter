<div class="p-4 md:p-6 lg:p-8 flex-grow overflow-y-auto bg-gradient-to-br from-gray-50 to-gray-200">
    <div class="space-y-6">
        <h3 class="text-xl font-semibold text-gray-700 tracking-wide">Manage User</h3>
        <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-2 md:gap-0">
            <div class="flex items-center gap-2 md:gap-x-4">
                <!-- Search Input -->
                <div class="grow">
                    <label for="search" class="text-xs text-gray-700 tracking-wide font-medium">Search</label>
                    <input id="search" wire:model.debounce.1000ms="search" type="text" placeholder="Search by name or email" class="mt-2 block text-sm w-full md:w-80 px-4 py-2 outline-none" />
                </div>
                <!-- No. of item Input -->
                <div>
                    <label for="perPage" class="text-xs text-gray-700 tracking-wide font-medium">No. of item</label>
                    <select id="perPage" wire:model="perPage" class="mt-2 block px-4 py-2 text-sm">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <!-- Create Button -->
            <button wire:click="openModal()" class="px-4 py-2 bg-white text-sm text-red-500 font-medium flex justify-center items-center gap-x-2 font-sans hover:bg-red-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
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
        <div wire:loading.flex wire:target="search, perPage, submit" class="bg-white w-full h-32 justify-center items-center gap-x-4 text-sm rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 animate-spin">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
            Loading...
        </div>
        @if(count($users) > 0)
        <div wire:loading.remove wire:target="search, perPage, submit" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-x-0 gap-y-4 md:gap-6">
            @foreach($users as $user)
            <div class="relative p-6 bg-white rounded cursor-pointer hover:bg-red-100 group">
                <div class="absolute top-2 right-2 z-30 flex items-center gap-x-2 lg:invisible lg:group-hover:visible">
                    <button wire:click="openModal('{{ json_encode($user) }}')" class="box-border w-6 h-6 bg-white p-1 rounded-sm text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </button>
                    <button wire:click="alertToDelete('{{ $user['id'] }}')" class="box-border w-6 h-6 bg-white p-1 rounded-sm text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center gap-x-4">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full font-semibold bg-red-100 text-red-500 flex items-center justify-center uppercase group-hover:bg-white">
                            {{ $user['gender'][0] }}
                        </div>
                        <div @class(['absolute bottom-0 right-0 z-10 w-3 h-3 rounded-full', 'bg-orange-500'=> $user['status'] == 'inactive', 'bg-green-500' => $user['status'] == 'active' ])"></div>
                    </div>
                    <div class="flex flex-col items-start max-w-full">
                        <h4 class="mt-1 text-gray-800 font-semibold">{{ $user['name'] }}</h4>
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
    <!-- Create and Edit Popup for user -->
    <div x-cloak x-data x-show="$wire.modal" x-transition tabindex="1" class="absolute inset-0 z-30 w-full h-screen bg-gray-800/80 p-4 flex items-center">
        <div x-on:click.outside="$wire.set('modal', false)" class="bg-white w-full max-w-xl mx-auto rounded overflow-hidden">
            <div class="px-6 py-4 border-b flex justify-between">
                <h4 class="grow text-center font-semibold">
                    {{ $isEdit ? 'Update User' : 'Create User' }}
                </h4>
                <button wire:click="closeModal" class="box-border w-5 h-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-6 max-h-96 overflow-y-auto">
                <form id="form" wire:submit.prevent="submit">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="col-span-2">
                            <label for="name" class="text-sm text-gray-700 tracking-wide font-medium">Name</label>
                            <input id="name" wire:model="name" type="text" placeholder="Enter name" class="mt-2 w-full block text-sm px-4 py-2 rounded border border-gray-400/50 outline-none @error('name') border-red-500 bg-red-50 @enderror" />
                            @error('name')<span class="mt-1 text-xs text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-span-2">
                            <label for="email" class="text-sm text-gray-700 tracking-wide font-medium">Email Address</label>
                            <input id="email" wire:model="email" type="text" placeholder="Enter email address" class="mt-2 w-full block text-sm px-4 py-2 rounded border border-gray-400/50 outline-none @error('email') border-red-500 bg-red-50 @enderror" />
                            @error('email')<span class="mt-1 text-xs text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="email" class="text-sm text-gray-700 tracking-wide font-medium">Gender</label>
                            <div class="flex gap-x-2">
                                <div class="mt-2 flex items-center mr-4">
                                    <input wire:model="gender" id="male-radio" type="radio" value="male" name="gender">
                                    <label for="male-radio" class="ml-2 text-sm dark:text-gray-300">Male</label>
                                </div>
                                <div class="mt-2 flex items-center mr-4">
                                    <input wire:model="gender" id="female-radio" type="radio" value="female" name="gender">
                                    <label for="female-radio" class="ml-2 text-sm dark:text-gray-300">Female</label>
                                </div>
                            </div>
                            @error('gender')<span class="mt-1 text-xs text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="email" class="text-sm text-gray-700 tracking-wide font-medium">Status</label>
                            <div class="flex gap-x-2">
                                <div class="mt-2 flex items-center mr-4">
                                    <input wire:model="status" id="active-radio" type="radio" value="active" name="status">
                                    <label for="active-radio" class="ml-2 text-sm dark:text-gray-300">Active</label>
                                </div>
                                <div class="mt-2 flex items-center mr-4">
                                    <input wire:model="status" id="inactive-radio" type="radio" value="inactive" name="status">
                                    <label for="inactive-radio" class="ml-2 text-sm dark:text-gray-300">Inactive</label>
                                </div>
                            </div>
                            @error('status')<span class="mt-1 text-xs text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t flex justify-center gap-x-2">
                <button wire:click="closeModal" type="button" class="px-4 py-2 bg-gray-100 text-sm text-gray-500 rounded hover:bg-gray-200">Cancel</button>
                <input type="submit" form="form" value="Confirm" class="px-4 py-2 bg-rose-500 text-sm text-white rounded hover:bg-rose-700 cursor-pointer" />
            </div>
        </div>
    </div>
    <!-- End Popup -->
</div>