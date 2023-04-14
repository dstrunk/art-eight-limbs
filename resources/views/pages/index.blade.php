<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>

    <main>
        <h2>Most recent articles</h2>
        @forelse ($posts as $post)
            <x-home-post-list-item :post="$post" />
        @empty
            <p>No posts!</p>
        @endforelse
    </main>
</x-layout>
