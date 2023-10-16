<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ServiceController extends Controller
{
    public function index(Service $service): View
    {
        $title = '';
        if (!$service->isActive) {
            throw new NotFoundHttpException();
        }

        $listService = Service::count();

        $next_id = $service->id;
        if ($service->id === $listService) {
            $next_id = 1;
        } else {
            $next_id += +1;
        }

        $next = Service::query()
            ->where('id', '=', $next_id)
            ->limit(1)
            ->first();

        return view('home.service.index', compact('service', 'next'));
    }
}
