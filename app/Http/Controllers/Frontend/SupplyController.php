<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class SupplyController extends Controller
{
    public function __invoke(): Response
    {
        $this->authorize('Access supply');

        return Inertia::render('Supply/Index');
    }
}
