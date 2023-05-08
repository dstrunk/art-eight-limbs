<meta name="twitter:card" content="summary" />
<meta name="twitter:creator" content="@dstrunk" />
@if ($description)
    <meta name="twitter:description" content="{{ $description }}" />
@endif
<meta name="twitter:title" content="{{ $title }}" />
@if ($image)
    @foreach (Statamic::tag('glide:generate')->src("/storage/{$image->path()}")->preset('twitter') as $i)
        <meta name="twitter:image" content="{{ asset($i['url']) }}" />
        <meta name="twitter:image:alt" content="{{ $image->meta('data')['alt'] ?? "Featured image for '$title'" }}" />
    @endforeach
@endif

<meta property="og:type" content="website" />
<meta property="og:locale" content="en_US" />
<meta property="og:site_name" content="{{ 'Muay Th-AI' }}" />
<meta property="og:title" content="{{ $title }}" />
@if ($description)
    <meta property="og:description" content="{{ $description }}" />
@endif
<meta property="og:type" content="{{ $type }}" />
<meta property="og:url" content="{{ $url }}" />
{{-- images should be 1200x630 --}}
@if ($image)
    @foreach (Statamic::tag('glide:generate')->src("storage/{$image->path()}")->preset('facebook') as $i)
        <meta name="og:image" content="{{ asset($i['url']) }}" />
        @if (isset($image?->meta('data')['alt']))
            <meta name="og:image:alt" content="{{ $image->meta('data')['alt'] ?? "Featured image for '$title'" }}" />
        @endif
    @endforeach
@endif
