<?php

namespace App\Providers;

use App\Models\Kategori;
use App\Models\Market;
use App\Models\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $kategories = Kategori::all();
        View::share('kategories', $kategories);

        $services = Service::all();
        View::share('services', $services);

        $market = Market::all();
        View::share('market', $market);
        Paginator::defaultView('pagination::custom');
    }
}
