<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'translations' => BookTranslationResource::collection($this->whenLoaded('translations')),
            'author' => new UserResource($this->whenLoaded('author')),
            'images' => AttachmentResource::collection($this->whenLoaded('images'))
        ];
    }
}
