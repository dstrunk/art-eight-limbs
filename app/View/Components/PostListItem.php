<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class PostListItem extends Component
{
    public function __construct(
        public object $post,
    ) {}

    public function render(): View
    {
        return view('components.post-list-item');
    }
}
