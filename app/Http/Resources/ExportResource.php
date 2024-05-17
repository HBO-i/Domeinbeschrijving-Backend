<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class ExportResource extends JsonResource
{
    private $professionalSkills;
    private $professionalTasks;

    public function __construct(Collection $professionalSkills, array $professionalTasks)
    {
        $this->professionalSkills = $professionalSkills;
        $this->professionalTasks = $professionalTasks;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'professional_skills' => FocusResource::collection($this->professionalSkills),
            'professional_tasks' => $this->professionalTasks
        ];
    }
}
