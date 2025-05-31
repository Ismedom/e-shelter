<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-1 mb-8">
  <nav class="flex flex-wrap gap-2">
    <a href="{{ route('contents.hero') }}" 
       class="px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 flex items-center"
       :class="{{ request()->is('admin/contents/hero') ? "'bg-blue-100 text-blue-700 dark:bg-blue-900/80 dark:text-blue-100 shadow-inner'" : "'text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700'" }}">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
      </svg>
      Hero Section
    </a>
    
    <a href="{{ route('contents.province') }}" 
       class="px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 flex items-center"
       :class="{{ request()->is('admin/contents/province') ? "'bg-green-100 text-green-700 dark:bg-green-900/80 dark:text-green-100 shadow-inner'" : "'text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700'" }}">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
      </svg>
      Province
    </a>
    
    <a href="{{ route('contents.host') }}" 
       class="px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 flex items-center"
       :class="{{ request()->is('admin/contents/host') ? "'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/80 dark:text-yellow-100 shadow-inner'" : "'text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700'" }}">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
      </svg>
      Host Services
    </a>
    
    <a href="{{ route('contents.benefits') }}" 
       class="px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 flex items-center"
       :class="{{ request()->is('admin/contents/benefits') ? "'bg-purple-100 text-purple-700 dark:bg-purple-900/80 dark:text-purple-100 shadow-inner'" : "'text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700'" }}">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
      Benefits
    </a>
    
    <a href="{{ route('contents.features') }}" 
       class="px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 flex items-center"
       :class="{{ request()->is('admin/contents/features') ? "'bg-indigo-100 text-indigo-700 dark:bg-indigo-900/80 dark:text-indigo-100 shadow-inner'" : "'text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700'" }}">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
      </svg>
      Features
    </a>
    
    <a href="{{ route('contents.faq') }}" 
       class="px-4 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 flex items-center"
       :class="{{ request()->is('admin/contents/faq') ? "'bg-pink-100 text-pink-700 dark:bg-pink-900/80 dark:text-pink-100 shadow-inner'" : "'text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700'" }}">
      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
      FAQ
    </a>
  </nav>
</div>