<meta name="twitter:card" content="summary" />
<meta name="twitter:creator" content="@dstrunk" />
@if ($description)
    <meta name="twitter:description" content="{{ $description }}" />
@endif
<meta name="twitter:title" content="{{ $title }}" />
@if (isset($image->url))
    <meta name="twitter:image" content="{{ $image->url }}" />
    <meta name="twitter:image:alt" content="{{ $image->alt }}" />
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
@if (isset($image->url))
    <meta property="og:image" content="{{ $image->url }}" />
    <meta property="og:image:alt" content="{{ $image->alt }}" />
@endif
