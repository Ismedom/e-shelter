<x-layouts.dashboard>
    <x-layouts.accommodation :accommodation="$accommodation">
    <div class="max-w-full mx-auto">
        <x-form.card 
            title="{{ __('edit_post') }}" 
            description="{{ __('update_post_details') }}"
        >
            <form method="POST" action="{{ route('posts.update', [$accommodation, $post]) }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <x-form.section title="{{ __('basic_post_info') }}">
                    <x-form.grid columns="2">
                        <x-form.input name="title" label="{{ __('title') }}" :value="$post->title" required />
                        <x-form.input name="slug" label="{{ __('slug') }}" :value="$post->slug" />
                    </x-form.grid>

                    <x-form.grid columns="2">
                        <x-form.input name="meta_title" label="{{ __('meta_title') }}" :value="$post->meta_title" />
                        <x-form.input name="star_rating" label="{{ __('star_rating') }}" type="number" step="0.1" min="0" max="5" :value="$post->star_rating" />
                    </x-form.grid>
                    <x-form.grid columns="2">
                        <x-form.select 
                            name="room_type_id"
                            label="{{ __('room_type') }}"
                            :options="$roomTypes->map(fn($r) => ['value' => $r->id, 'label' => $r->name])->toArray()"
                            :selected="$post->room_type_id"
                            required
                        />
                    </x-form.grid>

                    <x-form.textarea name="description" label="{{ __('description') }}" rows="4">{{ $post->description }}</x-form.textarea>
                </x-form.section>

                <x-form.section title="{{ __('tags_and_image') }}">
                    <x-form.input name="tags" label="{{ __('tags') }}" :value="implode(',', $post->tags ?? [])" />

                    <x-form.file-upload 
                        name="img" 
                        label="{{ __('thumbnail_image') }}"
                        accept="image/*"
                        max-size="3MB"
                    />

                    @if($post->img)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $post->img) }}" alt="{{ __('current_image') }}" class="h-32 rounded shadow">
                        </div>
                    @endif
                </x-form.section>

                <x-form.button type="submit" variant="primary" size="lg">
                    {{ __('update_post') }}
                </x-form.button>
                <x-form.button 
                    type="button" 
                    variant="outline" 
                    size="lg"
                    onclick="window.location='{{ route('posts.index', $accommodation) }}'"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                >
                    {{ __('cancel') }}
                </x-form.button>
            </form>
        </x-form.card>
    </div>
    </x-layouts.accommodation>
</x-layouts.dashboard>
