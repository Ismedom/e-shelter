<x-layouts.dashboard>
    <x-layouts.accommodation :accommodation="$accommodation">
        <div class="max-w-full mx-auto">
            <x-form.card 
                title="Create New Post" 
                description="Add a new accommodation listing."
            >
                <form method="POST" action="{{ route('posts.store', $accommodation) }}" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <x-form.section title="Basic Post Info">
                        <x-form.grid columns="2">
                            <x-form.input name="title" label="Title" required placeholder="Post title" />
                            <x-form.input name="slug" label="Slug" placeholder="Auto-generated if left blank" />
                        </x-form.grid>

                        <x-form.grid columns="2">
                            <x-form.input name="meta_title" label="Meta Title" />
                            <x-form.input name="star_rating" type="number" step="0.1" min="0" max="5" label="Star Rating" />
                        </x-form.grid>

                        <x-form.grid columns="2">
                            <x-form.select 
                                name="room_type_id"
                                label="Room Type"
                                :options="$roomTypes->map(fn($r) => ['value' => $r->id, 'label' => $r->name])->toArray()"
                                required
                            />
                        </x-form.grid>

                        <x-form.textarea name="description" label="Description" rows="4" />
                    </x-form.section>

                    <x-form.section title="Tags & Image">
                        <x-form.input name="tags" label="Tags (comma separated)" placeholder="e.g. beach, pool, luxury" />

                        <x-form.file-upload 
                            name="img" 
                            label="Thumbnail Image"
                            accept="image/*"
                            max-size="3MB"
                        />
                    </x-form.section>

                    <x-form.button type="submit" variant="primary" size="lg">
                        Create Post
                    </x-form.button>
                    <x-form.button 
                            type="button" 
                            variant="outline" 
                            size="lg"
                            onclick="window.location='{{ route('posts.index', $accommodation) }}'"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                        >
                            Cancel
                    </x-form.button>
                </form>
            </x-form.card>
        </div>
    </x-layouts.accommodation>
</x-layouts.dashboard>
