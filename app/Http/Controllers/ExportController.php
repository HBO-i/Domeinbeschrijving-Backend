<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExportRequest;
use App\Http\Resources\ExportResource;
use App\Http\Services\DescriptionService;

class ExportController extends Controller
{
    /**
     * Show Retrieve the JSON for the professional duties and professional skills.
     */
    public function index(ExportRequest $request, DescriptionService $service)
    {
        return new ExportResource($service->getSkills($request->validated()), $service->getDescriptions($request->validated()));
    }
}
