<?php

use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortofolioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/sitemap', function () {
    SitemapGenerator::create('http://127.0.0.1:8000/')->writeToFile('public/sitemap.xml');
    return 'Success';
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/about-us', 'about');
    Route::get('/contact', 'contact');
    Route::post('/submit', 'submit')->name('submit.form');
    Route::get('/landing-page', 'landing');
    Route::get('/links', 'links');
});

Route::controller(PortofolioController::class)->group(function () {
    Route::get('/portofolio/{kategori:slug}', 'porto');
});

Route::controller(ServiceController::class)->group(function () {
    Route::get('/service/{service:slug}', 'index');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'blog');
    Route::get('/blog/{blog:slug}', 'detail');
});
