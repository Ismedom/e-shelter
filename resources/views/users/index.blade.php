<x-layouts.dashboard>  
    <div class="mb-4">
        <form method="GET" action="{{route('users.index')}}" class="grid grid-cols-2 gap-4">   
            @csrf
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative flex h-10">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input 
                    type="search" 
                    id="default-search" 
                    class="block w-full px-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    placeholder="Search Mockups, Logos..." 
                    name="search"
                    value="{{ request()->query('search', '') }}"
                    required 
                />
            </div>
            <div class="flex gap-3">
                <div class="flex gap-2 items-center">
                    <x-input.date-picker placeholder="Start date" class="w-[150px]" name='data_start' value="{{ request()->query('data_start', '') }}"/>
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor"
                        class="size-6 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>                      
                    <x-input.date-picker placeholder="End date" class="w-[150px]" name='data_end' value="{{ request()->query('data_end', '') }}"/>
                </div>
                <div >
                    <x-input.select  
                        name="status"
                        :value="request()->query('status', 'all')" 
                        :data="[
                            ['value' => 'all', 'name' => 'All'],
                            ['value' => 'active', 'name' => 'Active'],
                            ['value' => 'inactive', 'name' => 'Inactive']
                        ]"
                    />
                </div>
            </div>
            <x-buttons.button type="submit" variant="primary" hidden>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><path d="m21 21-4.35-4.35"/><circle cx="10" cy="10" r="7"/></svg>
                Search
            </x-buttons.button>
        </form>
    </div>
    <div class="mb-4">     
            <x-table>
                <x-slot name="colgroup">
                    <colgroup>
                        <col class="no" style="width: 5%;">
                        <col class="name" style="width: 14%;">
                        <col class="email" style="width: 18%;">
                        <col class="phone-number" style="width: 13%;">
                        <col class="status" style="width: 12%;">
                        <col class="province" style="width: 10%;">
                        <col class="join-at" style="width: 18%;">
                        <col class="action" style="width: 10%;">
                      </colgroup>                      
                </x-slot>
                <x-slot name="header">
                    <tr>
                        <th scope="col" class="px-5 py-3​">
                            No.
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Phone Number
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Province
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Join At
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Action
                        </th>
                    </tr> 
                </x-slot>
                <x-slot name="body">
                    @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                        </td>
                        @if ($user->first_name || $user->last_name)
                            <td scope="row" class="px-6 py-4 text-gray-500 whitespace-nowrap dark:text-white">
                                {{$user->first_name??''}} {{$user->last_name??''}}
                            </td>
                         @else
                            <td scope="row" class="px-6 py-4 text-gray-500 whitespace-nowrap dark:text-white">
                            Unknown
                            </td>
                        @endif
                        <td class="px-5 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $user->phone_number??'No Data' }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $user->status }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $user->province??'No Data' }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $user->created_at->format('Y-m-d h:i A') }}
                        </td>
                        <td class="px-5 py-4">
                            <a href="#" class="font-medium text-gray-700 dark:text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-icon lucide-ellipsis"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach           
                </x-slot>
                <x-slot name="pagination">
                    <div>
                        {{ $users->appends(request()->query())->links() }}
                    </div>
                </x-slot>
            </x-table>
    </div>
</x-layouts.dashboard>