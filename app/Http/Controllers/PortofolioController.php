<?php

namespace App\Http\Controllers;

use App\Models\Display;
use App\Models\Kategori;
use App\Models\Portofolio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortofolioController extends Controller
{
    public function porto(Kategori $kategori): View
    {
        $portofolio = Portofolio::query()
            ->where('kategori_id', '=', $kategori->id)
            ->where('isActive', '=', 1)
            ->where('published_at', '!=', null)
            ->get();

        $display = Display::query()
            ->where('konten', '=', 'Portofolio')
            ->where('isActive', '!=', null)
            ->limit(1)
            ->first();

        $listKategori = Kategori::count();

        $next_id = $kategori->id;
        if ($kategori->id === $listKategori) {
            $next_id = 1;
        } else {
            $next_id += +1;
        }

        $next = Kategori::query()
            ->where('id', '=', $next_id)
            ->limit(1)
            ->first();

        return view('home.porto.index', compact('display', 'kategori', 'portofolio', 'next'));
    }
}
