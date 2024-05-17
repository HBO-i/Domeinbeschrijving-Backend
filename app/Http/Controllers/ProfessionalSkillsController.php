<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionalSkillsIndexRequest;
use App\Http\Resources\FocusResource;
use App\Http\Services\DescriptionService;

class ProfessionalSkillsController extends Controller
{
    private DescriptionService $descriptionService;

    public function __construct()
    {
        $this->descriptionService = new DescriptionService();
    }

    /**
     * Show the professional skills descriptions.
     */
    public function index(ProfessionalSkillsIndexRequest $request)
    {
        $validated = $request->validated();

        $foci = $this->descriptionService->getSkills($validated);

        return FocusResource::collection($foci);
    }
}
