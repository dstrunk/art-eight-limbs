<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Spatie\RouteAttributes\Attributes\Route;
use Statamic\Facades\Entry;

class PostController extends Controller
{
    public function index(): View
    {
        return view('posts.index', [
            'posts' => Entry::all()
                ->where('collection', '=', 'posts')
                ->where('published', '=', true)
                ->where('date', '<=', Carbon::now()),
        ]);
    }

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
