<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->imageUrl(),
        ];
    }

    protected function imageUrl(): ?string
    {
        if (!$this->image) {
            return null;
        }
        

        if (str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        return asset("storage/{$this->image}");
    }
}
