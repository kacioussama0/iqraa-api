<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PostResource;
class CategoryResource extends JsonResource
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
            'name_fr' => $this->name_fr,
            'slug' => $this->slug,
            'slug_fr' => $this->slug_fr,
            'type' => $this->type,
            'thumbnail' => ($this->type != 'images') ? '' : ((!empty($this->images->first())) ? asset('storage/' . $this->images->first()->path) : ''),
            'posts' => ($this->type == 'posts') ? PostResource::collection($this->posts) : ''
        ];
    }
}
