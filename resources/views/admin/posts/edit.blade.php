<x-layouts::app>

    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{ route('dashboard') }}">
            Dashboard
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{ route('admin.posts.index') }}">
            Posts
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Edit
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>


    <div class="bg-white dark:bg-zinc-900 
            px-6 py-8 
            shadow-lg dark:shadow-zinc-950/40 
            rounded-lg 
            border border-zinc-200 dark:border-zinc-700">

        <form action="{{ route('admin.posts.update', $post) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')

            {{-- Image Section --}}
            <div class="space-y-3">
                <label class="block font-medium text-sm text-gray-700">
                    Post Image
                </label>
                
            {{-- Image preview --}}
                <img id="imgPreview"
                    src="{{ $post->image_path 
                                ? Storage::url($post->image_path) 
                                : asset('no-image.jpg') }}"
                    alt="Post Image"
                    class="w-40 rounded shadow">

                    <input type="file" name="image" accept="image/*" id="imageInput" class="block w-full text-sm text-gray-500">
                       
            </div>

            {{-- Title --}}
            <flux:input
                label="Title"
                name="title"
                placeholder="Post title"
                value="{{ old('title', $post->title) }}"
            />

            {{-- Slug --}}
            <flux:input
                label="Slug"
                name="slug"
                placeholder="post-slug"
                value="{{ old('slug', $post->slug) }}"
            />

            {{-- Category --}}
            <flux:select
                name="category_id"
                label="Category"
                placeholder="Choose category...">

                @foreach($categories as $category)
                    <flux:select.option
                        value="{{ $category->id }}"
                        :selected="$category->id == old('category_id', $post->category_id)">
                        {{ $category->name }}
                    </flux:select.option>
                @endforeach

            </flux:select>

            {{-- Tags --}}
            <div class="space-y-2">
                <label class="block font-medium text-sm text-gray-700">
                    Tags
                </label>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                    @foreach($tags as $tag)
                        <label class="flex items-center space-x-2 text-sm">
                            <input type="checkbox"
                                   name="tags[]"
                                   value="{{ $tag->id }}"
                                   class="rounded border-gray-300"
                                   @checked(
                                       collect(old('tags', $post->tags->pluck('id')->toArray()))
                                           ->contains($tag->id)
                                   )
                            >
                            <span>{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Resume --}}
            <flux:textarea
                label="Resume"
                name="excerpt">
                {{ old('excerpt', $post->excerpt) }}
            </flux:textarea>

            {{-- Content --}}
            <flux:textarea
                label="Content"
                name="content"
                rows="16">
                {{ old('content', $post->content) }}
            </flux:textarea>

            {{-- Status --}}
            <flux:radio.group
                label="Status"
                name="is_published">

                <flux:radio
                    value="1"
                    label="Published"
                    :checked="old('is_published', $post->is_published) == 1"
                />

                <flux:radio
                    value="0"
                    label="Not Published"
                    :checked="old('is_published', $post->is_published) == 0"
                />

            </flux:radio.group>

            {{-- Submit --}}
            <div class="flex justify-end pt-4 border-t">
                <flux:button variant="primary" type="submit">
                    Update Post
                </flux:button>
            </div>

        </form>
    </div>
    
    @push('js')
    <script src="{{ asset('js/image-preview.js') }}"></script>
    @endpush

</x-layouts::app>