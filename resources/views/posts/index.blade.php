<x-layouts::public>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Latest Posts</h1>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
                <article class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-200">
                    @if($post->image_path)
                        <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded-t-lg">
                    @endif
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-2">
                            <a href="" class="hover:text-blue-600">
                                {{ $post->title }}
                            </a>
                        </h2>
                        @if($post->excerpt)
                            <p class="text-gray-700 mb-4">{{ $post->excerpt }}</p>
                        @endif
                        <div class="text-sm text-gray-500 flex justify-between items-center">
                            <span>Published on {{ $post->published_at ? $post->published_at : 'No date' }}</span>
                            <span>By {{ $post->user->name ?? 'Unknown' }}</span>
                        </div>
                        <div class="mt-2">
                            <span class="inline-block bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">
                                {{ $post->category->name ?? 'Uncategorized' }}
                            </span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</x-layouts::public>