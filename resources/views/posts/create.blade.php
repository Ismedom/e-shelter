<x-layouts.dashboard>
    <x-layouts.accommodation :accommodation="$accommodation">
        <div class="max-w-full mx-auto">
            <x-form.card 
                title="{{ __('create_new_post') }}" 
                description="{{ __('add_new_listing') }}"
            >
                <form method="POST" action="{{ route('posts.store', $accommodation) }}" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <x-form.section title="{{ __('basic_post_info') }}">
                        <x-form.grid columns="2">
                            <x-form.input name="title" label="{{ __('title') }}" required placeholder="{{ __('post_title') }}" />
                            <x-form.input name="slug" label="{{ __('slug') }}" placeholder="{{ __('auto_generated') }}" />
                        </x-form.grid>

                        <x-form.grid columns="2">
                            <x-form.input name="meta_title" label="{{ __('meta_title') }}" />
                            <x-form.input name="star_rating" type="number" step="0.1" min="0" max="5" label="{{ __('star_rating') }}" />
                        </x-form.grid>

                        <x-form.grid columns="2">
                            <x-form.select 
                                name="room_type_id"
                                label="{{ __('room_type') }}"
                                :options="$roomTypes->map(fn($r) => ['value' => $r->id, 'label' => $r->name])->toArray()"
                                required
                            />
                        </x-form.grid>

                        <x-form.textarea name="description" label="{{ __('description') }}" rows="4" />
                    </x-form.section>

                    <x-form.section title="{{ __('tags_and_image') }}">
                        <x-form.input name="tags" label="{{ __('tags') }}" placeholder="{{ __('tags_placeholder') }}" />

                        <x-form.file-upload 
                            name="img" 
                            label="{{ __('thumbnail_image') }}"
                            accept="image/*"
                            max-size="3MB"
                        />
                    </x-form.section>

                    <x-form.button type="submit" variant="primary" size="lg">
                        {{ __('create_post') }}
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
