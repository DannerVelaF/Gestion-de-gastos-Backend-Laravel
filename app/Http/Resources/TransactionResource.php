<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'description' => $this->description,
            'amount' => $this->amount,
            'type' => $this->type,
            'category' => new CategoryResource($this->category),
            'created_at' => $this->created_at,
        ];
    }
}
