<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Display;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlogController extends Controller
{
    public function blog(): View
    {
        $blogs = Blog::query()
            ->where('isActive', '=', 1)
            ->where('published_at', '!=', null)
            ->orderBy('published_at', 'desc')
            ->limit(25)
            ->paginate(5)
            ->withQueryString();

        $display = Display::query()
            ->where('konten', '=', 'Blog')
            ->where('isActive', '!=', null)
            ->limit(1)
            ->first();

        return view('home.blog.index', compact('blogs', 'display'));
    }

    public function detail(Blog $blog): View
    {
        if (!$blog->isActive || $blog->published_at > Carbon::now()) {
            throw new NotFoundHttpException();
        }

        $next = Blog::query()
            ->where('isActive', '=', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->whereDate('published_at', '<', $blog->published_at)
            ->orderBy('published_at', 'desc')
            ->limit(1)
            ->first();


        $prev = Blog::query()
            ->where('isActive', '=', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->whereDate('published_at', '>', $blog->published_at)
            ->orderBy('published_at', 'asc')
            ->limit(1)
            ->first();

        return view('home.blog.detail', compact('blog', 'next', 'prev'));
    }
}
