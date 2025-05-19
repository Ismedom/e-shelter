<x-layouts.dashboard>
    <div class="min-h-screen">
        <!-- Sticky Header -->
        <div class="sticky top-0 z-10 bg-white pb-4 mb-8 flex items-center justify-between border-b border-gray-200 px-4">
            <h1 class="text-3xl font-bold text-gray-800">Website Content Management</h1>
            <div class="space-x-2">
                <button type="button" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancel</button>
                <button type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save Changes</button>
            </div>
        </div>
        <div x-data="{ activeTab: 'hero' }" class="px-4">
            <!-- Horizontal Navigation Bar -->
            <nav class="flex overflow-x-auto space-x-2 bg-white border rounded-lg shadow-sm mb-8 px-2 py-2">
                <button @click="activeTab = 'hero'" :class="activeTab === 'hero' ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-100'" class="flex items-center px-4 py-2 rounded transition font-medium">
                    <svg class="h-5 w-5 mr-2 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9-4 9 4-9 4-9-4zm0 0v6a9 9 0 009 9 9 9 0 009-9V7"></path></svg>
                    Hero
                </button>
                <button @click="activeTab = 'province'" :class="activeTab === 'province' ? 'bg-green-50 text-green-700' : 'text-gray-700 hover:bg-gray-100'" class="flex items-center px-4 py-2 rounded transition font-medium">
                    <svg class="h-5 w-5 mr-2 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8"></path></svg>
                    Province
                </button>
                <button @click="activeTab = 'host'" :class="activeTab === 'host' ? 'bg-yellow-50 text-yellow-700' : 'text-gray-700 hover:bg-gray-100'" class="flex items-center px-4 py-2 rounded transition font-medium">
                    <svg class="h-5 w-5 mr-2 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m4 0h-1V8h-1m-4 0h1v4h1m-4 0h1v4h1"></path></svg>
                    Host Services
                </button>
                <button @click="activeTab = 'benefits'" :class="activeTab === 'benefits' ? 'bg-purple-50 text-purple-700' : 'text-gray-700 hover:bg-gray-100'" class="flex items-center px-4 py-2 rounded transition font-medium">
                    <svg class="h-5 w-5 mr-2 text-purple-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                    Benefits
                </button>
                <button @click="activeTab = 'features'" :class="activeTab === 'features' ? 'bg-indigo-50 text-indigo-700' : 'text-gray-700 hover:bg-gray-100'" class="flex items-center px-4 py-2 rounded transition font-medium">
                    <svg class="h-5 w-5 mr-2 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 014-4h3m4 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7"></path></svg>
                    Features
                </button>
                <button @click="activeTab = 'faq'" :class="activeTab === 'faq' ? 'bg-pink-50 text-pink-700' : 'text-gray-700 hover:bg-gray-100'" class="flex items-center px-4 py-2 rounded transition font-medium">
                    <svg class="h-5 w-5 mr-2 text-pink-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 14h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z"></path></svg>
                    FAQ
                </button>
            </nav>

            <!-- Hero Section -->
            <div x-show="activeTab === 'hero'">
                <div class="bg-white rounded-xl shadow-lg p-8 mb-10 border-t-4 border-blue-500">
                    <h2 class="text-xl font-semibold mb-6 text-blue-700 flex items-center gap-2"><svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9-4 9 4-9 4-9-4zm0 0v6a9 9 0 009 9 9 9 0 009-9V7"></path></svg>Hero Section</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Hero Image</label>
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('images/beach-resort.jpg') }}" alt="Current Hero Image" class="h-24 w-auto rounded shadow">
                                <input type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Hotels Count</label>
                                <input type="text" value="1000+" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Bookings Count</label>
                                <input type="text" value="2K+" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Subtitle Text</label>
                                <input type="text" value="1000+ hotels already earning more" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Button Text</label>
                                <input type="text" value="Join as Partner" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Province Section -->
            <div x-show="activeTab === 'province'">
                <div class="bg-white rounded-xl shadow-lg p-8 mb-10 border-t-4 border-green-500">
                    <h2 class="text-xl font-semibold mb-6 text-green-700 flex items-center gap-2"><svg class="h-6 w-6 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8"></path></svg>Province Section</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Number</label>
                            <input type="text" value="25" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-green-500 focus:ring-green-500 sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                            <input type="text" value="Province" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-green-500 focus:ring-green-500 sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-green-500 focus:ring-green-500 sm:text-sm">Join Cambodia's Fastest Growing\nHotel Booking Network</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Host Services Section -->
            <div x-show="activeTab === 'host'">
                <div class="bg-white rounded-xl shadow-lg p-8 mb-10 border-t-4 border-yellow-500">
                    <h2 class="text-xl font-semibold mb-6 text-yellow-700 flex items-center gap-2"><svg class="h-6 w-6 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m4 0h-1V8h-1m-4 0h1v4h1m-4 0h1v4h1"></path></svg>Host Services Section</h2>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Section Title</label>
                        <input type="text" value="Host a Cambodia services" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-yellow-500 focus:ring-yellow-500 sm:text-sm">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @for ($i = 1; $i <= 3; $i++)
                        <div class="bg-yellow-50 p-4 rounded-lg shadow">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Service {{ $i }} Title</label>
                            <input type="text" value="2K + Booking" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-yellow-500 focus:ring-yellow-500 sm:text-sm mb-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Service {{ $i }} Description</label>
                            <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-yellow-500 focus:ring-yellow-500 sm:text-sm">{{ [
                                'Connect with over 2,000 monthly travelers seeking authentic Cambodian accommodations',
                                'Average 20+ bookings per month for listed properties on our platform',
                                'Global exposure to 20+ international booking channels through our single platform'
                            ][$i-1] }}</textarea>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Benefits Section -->
            <div x-show="activeTab === 'benefits'">
                <div class="bg-white rounded-xl shadow-lg p-8 mb-10 border-t-4 border-purple-500">
                    <h2 class="text-xl font-semibold mb-6 text-purple-700 flex items-center gap-2"><svg class="h-6 w-6 text-purple-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>Benefits Section</h2>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Section Title</label>
                        <input type="text" value="Benefits for Hosts" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @for ($i = 1; $i <= 4; $i++)
                        <div class="bg-purple-50 p-4 rounded-lg shadow">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Benefit {{ $i }} Title</label>
                            <input type="text" value="{{ ['Increased Visibility','Simplified Management','Local Support','Commission Structure'][$i-1] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-purple-500 focus:ring-purple-500 sm:text-sm mb-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Benefit {{ $i }} Description</label>
                            <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-purple-500 focus:ring-purple-500 sm:text-sm">{{ [
                                "List your property on Cambodia's fastest growing booking platform with exposure to local and international travelers",
                                "Manage all bookings, payments, and inquiries through one easy-to-use dashboard designed for property owners",
                                "Access to 24/7 customer service in Khmer and English to speak with any questions or issues",
                                "Competitive commission rates and transparent payment processing with fast payouts"
                            ][$i-1] }}</textarea>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Features List Section -->
            <div x-show="activeTab === 'features'">
                <div class="bg-white rounded-xl shadow-lg p-8 mb-10 border-t-4 border-indigo-500">
                    <h2 class="text-xl font-semibold mb-6 text-indigo-700 flex items-center gap-2"><svg class="h-6 w-6 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 014-4h3m4 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7"></path></svg>Features List Section</h2>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Background Image</label>
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('images/angkor-wat.jpg') }}" alt="Current Features Image" class="h-24 w-auto rounded shadow">
                            <input type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        </div>
                    </div>
                    <div class="space-y-4">
                        @foreach([
                            '25 Provinces available for serving hotel services',
                            '24/7 hours customer support',
                            'Fast & Secure Booking System',
                            'Multi-Language Assistance',
                            'Real Guest Reviews',
                            'Over 1,000 Trusted Hotel Partners',
                            'Daily Booking Analytics for Hosts'
                        ] as $index => $feature)
                        <div class="flex items-center gap-2">
                            <input type="text" value="{{ $feature }}" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <button type="button" class="ml-2 text-red-500 hover:text-red-700 p-2 rounded-full bg-red-50"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg></button>
                        </div>
                        @endforeach
                        <button type="button" class="mt-2 inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                            Add New Feature
                        </button>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div x-show="activeTab === 'faq'">
                <div class="bg-white rounded-xl shadow-lg p-8 mb-10 border-t-4 border-pink-500">
                    <h2 class="text-xl font-semibold mb-6 text-pink-700 flex items-center gap-2"><svg class="h-6 w-6 text-pink-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 14h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z"></path></svg>FAQ Section</h2>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Section Title</label>
                        <input type="text" value="FAQ" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Intro Text</label>
                        <input type="text" value="The Question we often get from our customer" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>
                    <div class="space-y-4">
                        @foreach([
                            ['question' => 'What commission rate do I pay when listing my property?', 'answer' => 'Our commission rates are competitive, ranging from 10-15% depending on your property type and location. The exact rate will be confirmed during the onboarding process.'],
                            ['question' => 'What documents are required to list a hotel or guesthouse?', 'answer' => 'You\'ll need to provide your business registration, hotel license, ID card/passport of the owner, property photos, and bank account details for receiving payments.'],
                            ['question' => 'How do I receive my payments?', 'answer' => 'Payments are processed bi-weekly directly to your registered bank account. You can track all transactions through your host dashboard.'],
                            ['question' => 'I already list my hotel on Facebook. Why should I use this platform?', 'answer' => 'While Facebook is good for some visibility, our platform provides dedicated booking tools, international exposure, secure payment processing, and analytics to help grow your business beyond local markets.'],
                            ['question' => 'I only have 3 rooms. Can I still register?', 'answer' => 'Yes! We welcome properties of all sizes. Small guesthouses and boutique accommodations are an important part of our platform.'],
                            ['question' => 'Can I list multiple properties under one account?', 'answer' => 'Yes, we offer property management tools that allow you to manage multiple properties from a single dashboard. This is ideal for owners with several locations.']
                        ] as $index => $faq)
                        <div class="border border-gray-200 rounded-md p-4 bg-pink-50">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Question {{ $index + 1 }}</label>
                                <input type="text" value="{{ $faq['question'] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Answer {{ $index + 1 }}</label>
                                <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ $faq['answer'] }}</textarea>
                            </div>
                            <div class="mt-2 flex justify-end">
                                <button type="button" class="text-red-500 hover:text-red-700 text-sm px-3 py-1 rounded bg-red-50">Remove FAQ</button>
                            </div>
                        </div>
                        @endforeach
                        <button type="button" class="mt-4 inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-pink-700 bg-pink-100 hover:bg-pink-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                            Add New FAQ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>