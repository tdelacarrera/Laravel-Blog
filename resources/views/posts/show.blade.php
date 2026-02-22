<x-layouts::public>
    <div class="max-w-4xl mx-auto px-6 py-12">

        <!-- Header / Post Title -->
        <header class="mb-8">
            <h1 class="text-5xl font-bold text-zinc-900 dark:text-white mb-2">
                {{ $post->title }}
            </h1>
            <div class="flex items-center text-sm text-zinc-500 dark:text-zinc-400 space-x-4">
                <span>
                    {{ optional($post->published_at)->format('M d, Y') ?? 'Draft' }}
                </span>
                <span>
                    By {{ $post->user->name ?? 'Unknown' }}
                </span>
                <span>
                    Category: {{ $post->category->name ?? 'Uncategorized' }}
                </span>
            </div>
        </header>

        <!-- Post Image -->
        @if($post->image_path)
            <div class="mb-8 overflow-hidden rounded-xl">
                <img src="{{ asset($post->image_path) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full object-cover max-h-96">
            </div>
        @endif

        <!-- Excerpt -->
        @if($post->excerpt)
            <p class="mb-6 text-lg text-zinc-600 dark:text-zinc-400">
                {{ $post->excerpt }}
            </p>
        @endif

        <!-- Post Content -->
        <div class="prose dark:prose-invert max-w-none">
            {!! $post->content !!}
        </div>

        <!-- Back Button -->
        <div class="mt-12">
            <a href="{{ route('posts.index') }}" 
               class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:underline">
                ← Back to all posts
            </a>
        </div>

    </div>
</x-layouts::public>