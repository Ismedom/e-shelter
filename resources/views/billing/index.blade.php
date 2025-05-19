<x-layouts.dashboard>  
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Billing Overview</h2>
        <p class="text-sm text-gray-600 dark:text-gray-300">Manage your payment information, view transaction history, and download invoices.</p>
    </div>

    <!-- Billing Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 shadow-sm">
            <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-2">Current Balance</h3>
            <p class="text-2xl font-bold text-green-600 dark:text-green-400">$3,450.75</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Next payout: May 25, 2025</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 shadow-sm">
            <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-2">Monthly Revenue</h3>
            <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">$12,875.50</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">+15.3% from last month</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 shadow-sm">
            <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-2">Platform Fees</h3>
            <p class="text-2xl font-bold text-gray-800 dark:text-gray-200">$1,287.55</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">10% of monthly revenue</p>
        </div>
    </div>

    <!-- Filter and Search -->
    <div class="mb-6">
        <form method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4">   
            @csrf
            <div class="relative flex h-10">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input 
                    type="search" 
                    id="transaction-search" 
                    class="block w-full px-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    placeholder="Search transactions by ID or guest name" 
                />
            </div>
            <div>
                <x-input.date-picker label="From Date"/>
            </div>
            <div>
                <x-input.date-picker label="To Date"/>
            </div>
            <div>
                <x-input.select :data="[
                    ['value' => 'all', 'name' => 'All Transactions'],
                    ['value' => 'completed', 'name' => 'Completed'],
                    ['value' => 'pending', 'name' => 'Pending'],
                    ['value' => 'refunded', 'name' => 'Refunded']
                ]"/>
            </div>
            <div class="md:col-span-4 flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-medium">Apply Filters</button>
            </div>
        </form>
    </div>

    <!-- Transaction History Table -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">Transaction History</h3>
        <x-table>
            <x-slot name="colgroup">
                <colgroup>
                    <col style="width: 5%">
                    <col style="width: 15%;">
                    <col style="width: 15%;">
                    <col style="width: 15%;">
                    <col style="width: 10%;">
                    <col style="width: 15%;">
                    <col style="width: 15%;">
                    <col style="width: 10%;">
                </colgroup>                      
            </x-slot>
            <x-slot name="header">
                <tr>
                    <th scope="col" class="px-5 py-3​">
                        No.
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Transaction ID
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Guest Name
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Room Type
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Amount
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-5 py-3">
                        Action
                    </th>
                </tr> 
            </x-slot>
            <x-slot name="body">
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">1</td>
                    <td scope="row" class="px-6 py-4 text-gray-500 whitespace-nowrap dark:text-white">TRX-245789</td>
                    <td class="px-6 py-4">John Smith</td>
                    <td class="px-6 py-4">Deluxe Suite</td>
                    <td class="px-6 py-4 font-medium text-green-600 dark:text-green-400">$425.00</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full dark:bg-green-900 dark:text-green-300">Completed</span></td>
                    <td class="px-6 py-4">May 16, 2025</td>
                    <td class="px-6 py-4">
                        <button class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block"><path d="M12 3v12"/><path d="m8 11 4 4 4-4"/><path d="M8 5H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-4"/></svg>
                        </button>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">2</td>
                    <td scope="row" class="px-6 py-4 text-gray-500 whitespace-nowrap dark:text-white">TRX-245676</td>
                    <td class="px-6 py-4">Emma Johnson</td>
                    <td class="px-6 py-4">Standard Room</td>
                    <td class="px-6 py-4 font-medium text-green-600 dark:text-green-400">$189.50</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full dark:bg-green-900 dark:text-green-300">Completed</span></td>
                    <td class="px-6 py-4">May 15, 2025</td>
                    <td class="px-6 py-4">
                        <button class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block"><path d="M12 3v12"/><path d="m8 11 4 4 4-4"/><path d="M8 5H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-4"/></svg>
                        </button>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">3</td>
                    <td scope="row" class="px-6 py-4 text-gray-500 whitespace-nowrap dark:text-white">TRX-245532</td>
                    <td class="px-6 py-4">Michael Davis</td>
                    <td class="px-6 py-4">Executive Suite</td>
                    <td class="px-6 py-4 font-medium text-yellow-600 dark:text-yellow-400">$650.00</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span></td>
                    <td class="px-6 py-4">May 14, 2025</td>
                    <td class="px-6 py-4">
                        <button class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block"><path d="M12 3v12"/><path d="m8 11 4 4 4-4"/><path d="M8 5H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-4"/></svg>
                        </button>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">4</td>
                    <td scope="row" class="px-6 py-4 text-gray-500 whitespace-nowrap dark:text-white">TRX-245490</td>
                    <td class="px-6 py-4">Sophie Wilson</td>
                    <td class="px-6 py-4">Family Room</td>
                    <td class="px-6 py-4 font-medium text-red-600 dark:text-red-400">$320.00</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full dark:bg-red-900 dark:text-red-300">Refunded</span></td>
                    <td class="px-6 py-4">May 12, 2025</td>
                    <td class="px-6 py-4">
                        <button class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block"><path d="M12 3v12"/><path d="m8 11 4 4 4-4"/><path d="M8 5H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-4"/></svg>
                        </button>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">5</td>
                    <td scope="row" class="px-6 py-4 text-gray-500 whitespace-nowrap dark:text-white">TRX-245341</td>
                    <td class="px-6 py-4">Robert Brown</td>
                    <td class="px-6 py-4">Deluxe Room</td>
                    <td class="px-6 py-4 font-medium text-green-600 dark:text-green-400">$275.50</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full dark:bg-green-900 dark:text-green-300">Completed</span></td>
                    <td class="px-6 py-4">May 10, 2025</td>
                    <td class="px-6 py-4">
                        <button class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block"><path d="M12 3v12"/><path d="m8 11 4 4 4-4"/><path d="M8 5H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-4"/></svg>
                        </button>
                    </td>
                </tr>
            </x-slot>
            <x-slot name="pagination">
                <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-gray-900 dark:text-white">1-5</span> of <span class="font-semibold text-gray-900 dark:text-white">145</span></span>
                    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
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

    <!-- Payment Method and Billing Settings -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-5 border border-gray-200 dark:border-gray-700 shadow-sm">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Payment Method</h3>
            <div class="flex items-center mb-4">
                <div class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                </div>
                <div>
                    <p class="font-medium text-gray-800 dark:text-white">Bank Account</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Account ending in 4832</p>
                </div>
                <div class="ml-auto">
                    <button class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Change</button>
                </div>
            </div>
            <button class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium">Add New Payment Method</button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-5 border border-gray-200 dark:border-gray-700 shadow-sm">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Billing Settings</h3>
            <div class="space-y-4">
                <div>
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" checked>
                        <span class="ml-2 text-gray-700 dark:text-gray-300">Receive payment notifications</span>
                    </label>
                </div>
                <div>
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" checked>
                        <span class="ml-2 text-gray-700 dark:text-gray-300">Receive monthly statement via email</span>
                    </label>
                </div>
                <div>
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2 text-gray-700 dark:text-gray-300">Auto-download invoice PDFs</span>
                    </label>
                </div>
                <div class="pt-2">
                    <button class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium">Save Settings</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Revenue Report -->
    <div class="mt-6 bg-white dark:bg-gray-800 rounded-lg p-5 border border-gray-200 dark:border-gray-700 shadow-sm">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Monthly Revenue Report</h3>
            <div>
                <button class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 mr-4">Export as PDF</button>
                <button class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Export as CSV</button>
            </div>
        </div>
        <div class="h-64 w-full">
            <!-- Revenue chart would go here -->
            <div class="flex items-center justify-center h-full border border-dashed border-gray-300 dark:border-gray-600 rounded-lg">
                <p class="text-gray-500 dark:text-gray-400">Revenue chart visualization</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
            <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <p class="text-sm text-gray-500 dark:text-gray-400">Total Revenue</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white">$45,872.50</p>
            </div>
            <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <p class="text-sm text-gray-500 dark:text-gray-400">Platform Fees</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white">$4,587.25</p>
            </div>
            <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <p class="text-sm text-gray-500 dark:text-gray-400">Net Income</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white">$41,285.25</p>
            </div>
        </div>
    </div>
</x-layouts.dashboard>