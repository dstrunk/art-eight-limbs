<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Statamic\Facades\Entry;

class PostController extends Controller
{
    public function show(string $slug): View
    {
        return view('posts.show', [
            'post' => Entry::query()
                ->where('collection', 'posts')
                ->where('published', true)
                ->where('date', '<=', Carbon::now())
                ->where('slug', $slug)
                ->firstOrFail(),
        ]);
    }
}
