<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SoalQuizResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'temaquiz_id' => $this->temaquiz_id,
            'pertanyaan' => strip_tags($this->pertanyaan),
            'jawaban_benar' => $this->jawaban_benar,

        ];
    }
}
