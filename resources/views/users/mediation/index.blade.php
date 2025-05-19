<x-layouts.dashboard>
    <div class="min-h-screen bg-gray-50 py-8 px-4">
        <!-- Sticky Header -->
        <div class="sticky top-0 z-10 bg-white pb-4 mb-8 flex flex-col md:flex-row md:items-center md:justify-between border-b border-gray-200">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Feedback & Mediation Center</h1>
                <p class="text-gray-500 mt-1">Manage feedback and resolve issues between hotel owners and guests.</p>
            </div>
            <button class="mt-4 md:mt-0 px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">New Mediation Request</button>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-4 flex items-center gap-4">
                <div class="bg-yellow-100 text-yellow-700 rounded-full p-2">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"></path><circle cx="12" cy="12" r="10" /></svg>
                </div>
                <div>
                    <div class="text-lg font-bold">8</div>
                    <div class="text-xs text-gray-500">Open Cases</div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 flex items-center gap-4">
                <div class="bg-green-100 text-green-700 rounded-full p-2">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <div class="text-lg font-bold">15</div>
                    <div class="text-xs text-gray-500">Resolved</div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 flex items-center gap-4">
                <div class="bg-gray-100 text-gray-700 rounded-full p-2">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4h4"></path></svg>
                </div>
                <div>
                    <div class="text-lg font-bold">3</div>
                    <div class="text-xs text-gray-500">Pending</div>
                </div>
            </div>
        </div>

        <!-- Filter/Search Bar -->
        <div class="bg-white rounded-lg shadow p-4 flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-2">
            <div class="flex gap-2 flex-1">
                <input type="text" placeholder="Search by guest, hotel, or case ID" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-3 py-2 w-full">
                <select class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm px-3 py-2">
                    <option>Status: All</option>
                    <option>Open</option>
                    <option>Resolved</option>
                    <option>Pending</option>
                </select>
            </div>
        </div>

        <!-- Mediation/Feedback Table -->
        <div class="bg-white rounded-xl shadow p-0 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Case ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Guest</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Hotel</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Last Message</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <!-- Example row -->
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-4 py-3 font-mono text-sm text-gray-700">#12345</td>
                        <td class="px-4 py-3 text-gray-600">2024-06-01</td>
                        <td class="px-4 py-3 text-gray-700">John Doe</td>
                        <td class="px-4 py-3 text-gray-700">Sunrise Hotel</td>
                        <td class="px-4 py-3">
                            <span class="inline-block px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 text-xs font-semibold">Open</span>
                        </td>
                        <td class="px-4 py-3 text-gray-500">“Waiting for guest reply...”</td>
                        <td class="px-4 py-3 text-right">
                            <a href="#" class="inline-block px-3 py-1 text-sm text-blue-700 bg-blue-100 rounded hover:bg-blue-200 font-medium transition">View</a>
                        </td>
                    </tr>
                    <!-- More rows here -->
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>
