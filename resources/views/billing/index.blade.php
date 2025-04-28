<x-layouts.dashboard>  
    <div class="mb-4">
        <form method="POST" class="grid grid-cols-2 gap-4">   
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
                    required 
                />
            </div>
            <div class="flex gap-3">
                <x-input.data-picker/>
                <div >
                    <x-input.select  :data="[
                            ['value' => 'all', 'name' => 'All'],
                            ['value' => 'active', 'name' => 'Active'],
                            ['value' => 'inactive', 'name' => 'Inactive']
                        ]"/>
                </div>
            </div>
        </form>
    </div>
    <div class="mb-4">
            <x-table>
                <x-slot name="colgroup">
                    <colgroup>
                        <col class="no" style="width: 5%">
                        <col class="name" style="width: 20%;">
                        <col class="email" style="width: 15%;">
                        <col class="phone-number" style="width: 15%;">
                        <col class="status" style="width: 15%;">
                        <col class="province" style="width: 15%;">
                        <col class="join-at" style="width: 15%;">
                        <col class="Action" style="width: 15%;">
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
                   @foreach ( [1,2,3,4,5,7,8,9,10] as $item )
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item }}
                            </td>
                            <td scope="row" class="px-6 py-4 text-gray-500 whitespace-nowrap dark:text-white">
                                Apple MacBook Pro 17"
                            </td>
                            <td class="px-5 py-4">
                                Silver
                            </td>
                            <td class="px-5 py-4">
                                Laptop
                            </td>
                            <td class="px-5 py-4">
                                $2999
                            </td>
                            <td class="px-5 py-4">
                                $2999
                            </td>
                            <td class="px-5 py-4">
                                $2999
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
                    <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                            </li>
                            <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            </li>
                        </ul>
                    </nav>
                </x-slot>
            </x-table>
    </div>
</x-layouts.dashboard>