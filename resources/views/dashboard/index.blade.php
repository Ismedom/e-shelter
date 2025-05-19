<x-layouts.dashboard>
    <div class="min-h-screen bg-gray-50 py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
                <p class="text-gray-500 mt-1">Key metrics and analytics at a glance</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow p-6 flex flex-col">
                <x-virtual.chart1/>
            </div>
            <div class="bg-white rounded-xl shadow p-6 flex flex-col">
                <x-virtual.chart4/>
            </div>
            <div class="bg-white rounded-xl shadow p-6 flex flex-col">
                <x-virtual.chart3/>
            </div>
        </div>
    </div>
</x-layouts.dashboard>