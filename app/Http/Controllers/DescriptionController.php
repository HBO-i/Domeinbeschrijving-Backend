<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexDescriptionRequest;
use App\Http\Services\DescriptionService;

class DescriptionController extends Controller
{

    /**
     * Display the descriptions.
     */
    public function index(IndexDescriptionRequest $request, DescriptionService $service)
    {
        return $service->getDescriptions($request->validated());
    }
}