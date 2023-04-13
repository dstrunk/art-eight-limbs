<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Spatie\RouteAttributes\Attributes\Route;
use Statamic\Facades\Entry;

class PostController extends Controller
{
    #[Route('get', 'posts', 'posts.index')]
    public function index(): View
    {
        return view('posts.index', [
            'posts' => Entry::all()
                ->where('collection', '=', 'posts'),
        ]);
    }

    #[Route('get', 'posts/{slug}', 'posts.show')]
    public function show(string $slug): View
    {
        return view('posts.show', [
            'post' => Entry::query()
                ->where('collection', 'posts')
                ->where('slug', $slug)
                ->firstOrFail(),
        ]);
    }
}
