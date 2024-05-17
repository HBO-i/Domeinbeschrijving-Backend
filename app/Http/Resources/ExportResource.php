<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ExportResource extends JsonResource
{
    private $professionalSkills;
    private $professionalDuties;

    public function __construct(Collection $professionalSkills, array $professionalDuties)
    {
        $this->professionalSkills = $professionalSkills;
        $this->professionalDuties = $professionalDuties;
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
            'professional_duties' => $this->professionalDuties
        ];
    }
}
