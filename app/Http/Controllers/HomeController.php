<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Client;
use App\Models\Display;
use App\Models\Kategori;
use App\Models\Kontak;
use App\Models\LandingPage;
use App\Models\Link;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $title = '';

        $clients = Client::all();

        $blogs = Blog::query()
            ->where('isActive', '=', 1)
            ->where('published_at', '!=', null)
            ->limit(7)
            ->orderBy('published_at', 'desc')
            ->get();

        $sliders = Slider::query()
            ->where('sort', '!=', null)
            ->orderBy('sort', 'asc')
            ->get();

        return view('home.index', compact('title', 'clients', 'blogs', 'sliders'));
    }

    public function about(): View
    {
        $display = Display::query()
            ->where('konten', '=', 'Tentang')
            ->where('isActive', '!=', null)
            ->limit(1)
            ->first();

        return view('home.about', compact('display'));
    }

    public function contact(): View
    {

        $display = Display::query()
            ->where('konten', '=', 'Kontak')
            ->where('isActive', '!=', null)
            ->limit(1)
            ->first();

        return view('home.contact', compact('display'));
    }

    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email:dns'
        ]);

        Kontak::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Form submitted successfully']);
    }

    public function landing(): View
    {

        $sliders = Slider::query()
            ->where('sort', '!=', null)
            ->orderBy('sort', 'asc')
            ->limit(1)
            ->first();

        $dataLanding = LandingPage::query()
            ->where('isActive', '=', 1)
            ->limit(1)
            ->first();

        return view('home.landing', compact('dataLanding', 'sliders'));
    }

    public function links(): View
    {
        $links = Link::all();

        return view('home.links', compact('links'));
    }
}
