<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfessionalSkillsDescriptionResource extends JsonResource
{
    private $descriptionId;
    private $descriptionValue;

    public function __construct($descriptionId, $descriptionValue)
    {
        $this->descriptionId = $descriptionId;
        $this->descriptionValue = $descriptionValue;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->descriptionId,
            'value' => $this->descriptionValue
        ];
    }
}
