<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompetencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->competency_id,
            'value' => $this->competency_value,
            'description' => [
                'id' => $this->description_id,
                'value' => $this->description_value
            ]
        ];
    }
}
