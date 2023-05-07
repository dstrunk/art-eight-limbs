<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Meta extends Component
{
    public function __construct(
        public string $title,
        public string $url,
        public ?string $description,
        public ?object $image,
        public ?string $type = 'article',
    ) {
        $this->description ??= '';
        $this->image ??= new \stdClass();
        $this->url ??= '';
    }

    public function render(): View
    {
        return view('components.meta');
    }
}
