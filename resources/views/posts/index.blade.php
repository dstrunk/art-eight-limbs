<x-layout>
    <x-slot:title>
        Post index
    </x-slot:title>

    <main>
        <div class="sm:px-8 mt-16 sm:mt-32">
            <div class="mx-auto max-w-7xl lg:px-8">
                <div class="relative px-4 sm:px-8 lg:px-12">
                    <div class="mx-auto max-w-2xl lg:max-w-5xl">
                        <header class="max-w-2xl">
                            <h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl">Writing on Muay Thai, including history, culture, and art.</h1>
                            <p class="mt-6 text-base text-zinc-600">Articles published every weekday, written by AI and lovingly curated by Daniel Strunk.</p>
                        </header>

                        <div class="mt-16 sm:mt-20">
                            @forelse ($posts as $post)
                                <x-post-list-item :post="$post" />
                            @empty
                                <p>No posts!</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
