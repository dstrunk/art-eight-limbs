<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Route;
use Statamic\Facades\Entry;

class PageController extends Controller
{
    public function index(): View
    {
        return view('pages.index', [
            'pages' => Entry::all()->where('collection', 'pages'),
            'posts' => Entry::all()->where('collection', 'posts'),
        ]);
    }

    public function show(string $slug): View
    {
        return view('pages.show', [
            'page' => Entry::query()
                ->where('collection', 'pages')
                ->where('slug', $slug)
                ->firstOrFail(),
        ]);
    }
}
