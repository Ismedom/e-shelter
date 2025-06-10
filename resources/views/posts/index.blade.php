<x-layouts.dashboard>
    <x-layouts.accommodation :accommodation="$accommodation">
        <div class="max-w-full mx-auto">
            <x-form.card 
                title="{{ __('all_posts') }}" 
                description="{{ __('manage_posts') }}"
            >
                <div class="flex justify-end mb-4">
                    <x-form.button 
                        variant="primary" 
                        onclick="window.location='{{ route('posts.create', $accommodation) }}'"
                    >
                        + {{ __('new_post') }}
                    </x-form.button>
                </div>

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700">
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                <button class="flex items-center space-x-1 hover:text-gray-700 dark:hover:text-gray-100 transition-colors">
                                    <span>{{ __('title') }}</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                    </svg>
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('accommodation') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('room_type') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('rating') }}</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($posts as $post)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center text-white font-semibold shadow-md">
                                        {{ strtoupper(substr($post->title, 0, 1)) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $post->title }}
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            ID: #{{ $post->id }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-white">
                                    {{ $post->accommodation->name ?? '-' }}
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $post->accommodation->city ?? '' }}
                                </div>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-white">
                                    {{ $post->roomType->type ?? '-' }}
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    @if($post->roomType)
                                        {{ $post->roomType->currency }} {{ number_format($post->roomType->pricing, 2) }}
                                    @else
                                        -
                                    @endif
                                </div>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($post->star_rating)
                                    <div class="flex items-center">
                                        <div class="flex items-center mr-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= floor($post->star_rating))
                                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @elseif($i == ceil($post->star_rating) && $post->star_rating - floor($post->star_rating) >= 0.5)
                                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ number_format($post->star_rating, 1) }}
                                        </span>
                                    </div>
                                @else
                                    <span class="text-sm text-gray-500 dark:text-gray-400 italic">{{ __('no_rating') }}</span>
                                @endif
                            </td>
                            
                             <td class="px-6 py-4">
                                 <div class="flex space-x-2">
                                     <a href="{{ route('posts.edit', [$accommodation, $post]) }}" class="flex items-center text-blue-600 dark:text-blue-500 hover:underline">
                                         <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                         </svg>
                                         {{ __('edit') }}
                                     </a>
                                     <form action="{{ route('posts.destroy', [$accommodation, $post]) }}" method="POST" class="inline-block">
                                         @csrf
                                         @method('DELETE')
                                         <button
                                             type="button"
                                             class="flex items-center text-red-600 dark:text-red-500 hover:underline"
                                             onclick="const el = document.getElementById('deleteUserModal'); el.classList.remove('hidden'); el.classList.add('flex')"
                                         >
                                             <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                     d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                 </path>
                                             </svg>
                                             {{ __('delete') }}
                                         </button>
                                         <x-modal 
                                             id="deleteUserModal"
                                             type="danger"
                                             title="{{ __('delete_post') }}"
                                             description="{{ __('delete_post_confirmation') }}"
                                             confirmText="{{ __('yes_delete') }}"
                                             cancelText="{{ __('cancel') }}"
                                             confirmAction=""
                                             showCancel="true"
                                             isOpen={{true}}
                                         >
                                             <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                                 {{ __('delete_post_confirmation') }}
                                             </p>
                                         </x-modal>
                                     </form>
                                 </div>
                                </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">{{ __('no_posts_found') }}</h3>
                                    <p class="text-gray-500 dark:text-gray-400">{{ __('create_first_post') }}</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </x-form.card>
        </div>
    </x-layouts.accommodation>
</x-layouts.dashboard>