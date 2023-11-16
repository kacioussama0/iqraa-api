<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'title_fr' => $this->title_fr,
            'slug_fr' => $this->slug_fr,
            'content_fr' => $this->content_fr,
            'thumbnail' => asset('storage/' . $this->thumbnail),
            'created_at' => date_format($this->created_at,'Y/m/d')
        ];
    }
}
