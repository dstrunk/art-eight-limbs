<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Statamic\Facades\Entry;

class PageController extends Controller
{
    public function index(): View
    {
        return view('pages.index', [
            'posts' => Entry::query()
                ->where('collection', 'posts')
                ->where('published', true)
                ->where('date', '<=', Carbon::now())
                ->orderBy('date', 'desc')
                ->paginate(8)
        ]);
    }

    public function show(string $slug): View
    {
        return view('pages.show', [
            'page' => Entry::query()
                ->where('collection', 'pages')
                ->where('published', true)
                ->where('date', '<=', Carbon::now())
                ->where('slug', $slug)
                ->firstOrFail(),
        ]);
    }
}
