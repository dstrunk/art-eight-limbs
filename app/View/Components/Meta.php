<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Statamic\Assets\Asset;

class Meta extends Component
{
    public function __construct(
        public string $title,
        public string $url,
        public ?string $description,
        public ?Asset $image,
        public ?string $type = 'article',
    ) {
        $this->description ??= '';
        $this->image ??= '';
        $this->url ??= '';
    }

    public function render(): View
    {
        return view('components.meta');
    }
}
