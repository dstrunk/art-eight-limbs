<x-blank-layout>
    <div class="m-0 w-full bg-cover p-0" style='background: url("https://images.unsplash.com/photo-1528181304800-259b08848526?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2000&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply");'>
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl pt-24 pb-36">
            <div class="flex flex-col items-center justify-center text-white">
                <img src="{{ asset('images/muay-thai-cursive.png') }}"
                     alt="Muay Thai"
                     class="mx-auto w-[32rem]"
                />
                <p class='text-center text-2xl font-bold text-gray-200'>
                    {!! __('The art, the history and the culture of Muay Thai as told by Artificial Intelligence') !!}
                </p>
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>

    <div class='container mx-auto px-4 sm:px-6 lg:px-8'>
        <div class='grid grid-cols-12 gap-y-12 md:gap-12'>
            @forelse ($posts as $post)
                @if ($loop->index === 0)
                    <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class='z-20 col-span-12 flex flex-col overflow-hidden rounded shadow-lg lg:-mt-24 lg:flex-row'>
                        @if ($post->featured_image)
                            @foreach (Statamic::tag('glide:generate')->src("/storage/{$post->featured_image->path()}")->width(800)->height(450)->fit('crop_focal') as $i)
                                <img
                                    src='{{ asset($i['url']) }}'
                                    width='{{ $i['width'] }}'
                                    height='{{ $i['height'] }}'
                                    alt=''
                                    class='max-w-full lg:w-1/2'
                                />
                            @endforeach
                        @endif
                        <div class='flex w-full flex-col bg-white p-6 lg:w-1/2'>
                            <h2 class='text-2xl font-bold text-gray-900'>
                                {{ $post->title }}
                            </h2>
                            <p class='mt-2 text-gray-600'>
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </a>
                @elseif ($loop->index === 1 || $loop->index === 2 || $loop->index === 3)
                    <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class='col-span-12 flex flex-col overflow-hidden rounded shadow-lg lg:col-span-4'>
                        @if ($post->featured_image)
                            @foreach (Statamic::tag('glide:generate')->src("/storage/{$post->featured_image->path()}")->width(800)->height(350)->fit('crop_focal') as $i)
                                <img
                                    src='{{ asset($i['url']) }}'
                                    width='{{ $i['width'] }}'
                                    height='{{ $i['height'] }}'
                                    alt=''
                                    class='max-w-full'
                                />
                            @endforeach
                        @endif
                        <div class='flex flex-col p-6'>
                            <h2 class='text-2xl font-bold text-gray-900'>
                                {{ $post->title }}
                            </h2>
                            <p class='mt-2 text-gray-600'>
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </a>
                @elseif ($loop->index === 4 || $loop->index === 5)
                    <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class='col-span-12 flex flex-col overflow-hidden rounded shadow-lg lg:col-span-6'>
                        @if ($post->featured_image)
                            @foreach (Statamic::tag('glide:generate')->src("/storage/{$post->featured_image->path()}")->width(800)->height(350)->fit('crop_focal') as $i)
                                <img
                                    src='{{ asset($i['url']) }}'
                                    width='{{ $i['width'] }}'
                                    height='{{ $i['height'] }}'
                                    alt=''
                                    class='max-w-full'
                                />
                            @endforeach
                        @endif
                        <div class='flex flex-col p-6'>
                            <h2 class='text-2xl font-bold text-gray-900'>
                                {{ $post->title }}
                            </h2>
                            <p class='mt-2 text-gray-600'>
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </a>
                @elseif ($loop->index === 6)
                    <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class='col-span-12 flex flex-col overflow-hidden rounded shadow-lg lg:col-span-8'>
                        @if ($post->featured_image)
                            @foreach (Statamic::tag('glide:generate')->src("/storage/{$post->featured_image->path()}")->width(800)->height(350)->fit('crop_focal') as $i)
                                <img
                                    src='{{ asset($i['url']) }}'
                                    width='{{ $i['width'] }}'
                                    height='{{ $i['height'] }}'
                                    alt=''
                                    class='max-w-full'
                                />
                            @endforeach
                        @endif
                        <div class='flex flex-col p-6'>
                            <h2 class='text-2xl font-bold text-gray-900'>
                                {{ $post->title }}
                            </h2>
                            <p class='mt-2 text-gray-600'>
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </a>
                @else
                    <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class='col-span-12 flex flex-col overflow-hidden rounded shadow-lg lg:col-span-4'>
                        @if ($post->featured_image)
                            @foreach (Statamic::tag('glide:generate')->src("/storage/{$post->featured_image->path()}")->width(800)->height(350)->fit('crop_focal') as $i)
                                <img
                                    src='{{ asset($i['url']) }}'
                                    width='{{ $i['width'] }}'
                                    height='{{ $i['height'] }}'
                                    alt=''
                                    class='max-w-full'
                                />
                            @endforeach
                        @endif
                        <div class='flex flex-col p-6'>
                            <h2 class='text-2xl font-bold text-gray-900'>
                                {{ $post->title }}
                            </h2>
                            <p class='mt-2 text-gray-600'>
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </a>
                @endif
            @empty
                <p>No posts!</p>
            @endforelse
        </div>

        <div class='mt-6'>
            {{ $posts->links() }}
        </div>
    </div>
</x-blank-layout>
