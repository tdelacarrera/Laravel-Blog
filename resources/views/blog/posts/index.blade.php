<x-layouts::public>
    <div class="max-w-[1500px] mx-auto px-[4%] py-10">

        <!-- Header -->
        <div class="mb-12 border-b pb-6">
            <h1 class="text-3xl font-bold tracking-tight mb-2">
                Latest Posts
            </h1>
            <p class="text-sm opacity-70">
                Discover our most recent articles and updates.
            </p>
        </div>

        <!-- Posts Grid -->
        <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

            @foreach($posts as $post)

                <article class="post flex flex-col">

                    <!-- Image -->
                    <div class="post-image-wrapper">
                        <img src="{{ $post->image_path ? Storage::url($post->image_path) : asset('no-image.jpg') }}" alt="{{ $post->title }}" loading="lazy">
                    </div>

                    <!-- Category -->
                    <div class="mb-2 text-xs uppercase tracking-wide opacity-60">
                        {{ $post->category->name ?? 'Uncategorized' }}
                    </div>

                    <!-- Title -->
                    <h2 class="text-lg font-semibold mb-2">
                        <a href="{{ route('blog.posts.show', $post) }}" 
                           class="hover:underline">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <!-- Meta -->
                    <div class="post-meta mb-3">
                        {{ optional($post->published_at)->format('M d, Y') ?? 'Draft' }}
                        • {{ $post->user->name ?? 'Unknown' }}
                    </div>

                    <!-- Excerpt -->
                    @if($post->excerpt)
                        <p class="text-sm mb-4">
                            {{ $post->excerpt }}
                        </p>
                    @endif

                    <!-- Read more -->
                    <div class="mt-auto">
                        <a href="{{ route('blog.posts.show', $post) }}" 
                           class="readmore">
                            Read more →
                        </a>
                    </div>

                </article>

            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-14 pt-8 border-t">
            {{ $posts->links() }}
        </div>

    </div>
</x-layouts::public>