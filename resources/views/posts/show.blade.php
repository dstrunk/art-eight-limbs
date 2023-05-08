<x-layout>
    <x-slot:meta>
        <x-meta :title="$post->title"
                :description="$post->excerpt"
                :image="$post->featured_image"
                :url="route('posts.show', ['slug' => $post->slug])"
        />
    </x-slot:meta>

    <x-slot:title>
        {{ $post->title }} | Art of Eight Limbs
    </x-slot:title>

    <div class="sm:px-8 mt-16 lg:mt-32">
        <div class="mx-auto max-w-7xl lg:px-8">
            <div class="relative px-4 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-2xl lg:max-w-5xl">
                    <div class="xl:relative">
                        <div class="mx-auto max-w-2xl">
                            <article>
                                <header class="flex flex-col">
                                    <h1 class="mt-6 text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl">{{ $post->title }}</h1>
                                    <time datetime="{{ $post->created_at }}" class="order-first flex items-center text-base text-zinc-400 dark:text-zinc-500">{{ $post->created_at->diffForHumans() }}</time>
                                </header>

                                @if ($post->content)
                                    <div class="prose mt-8">
                                        {!! \Statamic\Facades\Markdown::parse($post->content) !!}
                                    </div>
                                @endif
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
