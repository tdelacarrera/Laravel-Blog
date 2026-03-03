<x-layouts::public>
    <div class="max-w-7xl mx-auto px-6 py-12">
        
        <!-- Header -->
        <div class="flex items-center justify-between mb-10">
            <div>
                <h1 class="text-4xl font-bold tracking-tight text-zinc-900 dark:text-white">
                    Latest Posts
                </h1>
                <p class="mt-2 text-zinc-600 dark:text-zinc-400">
                    Discover our most recent articles and updates.
                </p>
            </div>
        </div>

        <!-- Posts Grid -->
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
                <article 
                    class="group flex flex-col overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-800 
                           bg-white dark:bg-zinc-900 shadow-sm hover:shadow-xl 
                           transition-all duration-300 hover:-translate-y-1"
                >
                    
                    <!-- Image -->
                    
                        <div class="relative overflow-hidden">
                            <img 
                                src="{{ $post->image_path ? Storage::url($post->image_path) : asset('no-image.jpg') }}" 
                                alt="{{ $post->title }}" 
                                class="h-52 w-full object-cover transition-transform duration-500 group-hover:scale-105"
>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        </div>
                    

                    <!-- Content -->
                    <div class="flex flex-col flex-1 p-6">
                        
                        <!-- Category Badge -->
                        <div class="mb-3">
                            <span class="inline-flex items-center rounded-full 
                                         bg-indigo-50 text-indigo-600 
                                         dark:bg-indigo-500/10 dark:text-indigo-400 
                                         px-3 py-1 text-xs font-medium">
                                {{ $post->category->name ?? 'Uncategorized' }}
                            </span>
                        </div>

                        <!-- Title -->
                        <h2 class="text-xl font-semibold text-zinc-900 dark:text-white mb-3 leading-snug">
                            <a href="" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <!-- Excerpt -->
                        @if($post->excerpt)
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 mb-6 line-clamp-3">
                                {{ $post->excerpt }}
                            </p>
                        @endif

                        <!-- Spacer -->
                        <div class="mt-auto">
                            
                            <!-- Meta -->
                            <div class="flex items-center justify-between text-xs text-zinc-500 dark:text-zinc-400 mb-4">
                                <span>
                                    {{ optional($post->published_at)->format('M d, Y') ?? 'Draft' }}
                                </span>
                                <span>
                                    {{ $post->user->name ?? 'Unknown' }}
                                </span>
                            </div>

                            <!-- CTA -->
                            <a href="{{ route('blog.posts.show', $post) }}" 
                               class="inline-flex items-center text-sm font-medium text-indigo-600 
                                      dark:text-indigo-400 hover:underline">
                                Read more →
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $posts->links() }}
        </div>

    </div>
</x-layouts::public>